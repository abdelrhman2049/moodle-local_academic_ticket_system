<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * View ticket page.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->libdir . '/editorlib.php');
require_once(__DIR__ . '/lib.php');

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $OUTPUT, $DB, $USER;

require_login();

$id = required_param('id', PARAM_INT);
$action = optional_param('action', '', PARAM_ALPHANUMEXT);

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/local/academic_ticket_system/view.php', ['id' => $id]);
$PAGE->set_title(get_string('viewticket', 'local_academic_ticket_system'));
$PAGE->set_heading(get_string('pluginname', 'local_academic_ticket_system'));
$PAGE->requires->css(new moodle_url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'));
$PAGE->requires->css(new moodle_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'));
$PAGE->requires->css(new moodle_url('/local/academic_ticket_system/styles/style.css'));
$PAGE->requires->js_call_amd('local_academic_ticket_system/presence', 'initHeartbeat', [$id]);

$primary = get_config('local_academic_ticket_system', 'primary_color') ?: '#2563eb';
$secondary = get_config('local_academic_ticket_system', 'secondary_color') ?: '#4f46e5';

$customcss = "
    :root {
        --ats-primary: {$primary};
        --ats-secondary: {$secondary};
        --ats-primary-light: {$primary}33; /* 20% opacity */
    }
";

$sql = "SELECT t.*, c.title as category_name
        FROM {local_academic_ticket_system_tickets} t
        LEFT JOIN {local_academic_ticket_system_categories} c ON t.category_id = c.id
        WHERE t.id = ?";
$ticketrecord = $DB->get_record_sql($sql, [$id]);

if (!$ticketrecord) {
    echo $OUTPUT->header();
    echo $OUTPUT->render_from_template(
        'local_academic_ticket_system/error_notfound',
        [
            'ticketid' => $id,
            'home_url' => new moodle_url('/local/academic_ticket_system/index.php'),
        ]
    );
    echo $OUTPUT->footer();
    die();
}

$canmanage = has_capability('local/academic_ticket_system:manageticket', $context);

if (!$canmanage && $ticketrecord->userid != $USER->id) {
    echo $OUTPUT->header();
    echo $OUTPUT->render_from_template(
        'local_academic_ticket_system/error_denied',
        [
            'home_url' => new moodle_url('/local/academic_ticket_system/index.php'),
        ]
    );
    echo $OUTPUT->footer();
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && confirm_sesskey()) {
    if (isset($_POST['reply_message'])) {
        $message = required_param('reply_message', PARAM_CLEANHTML);
        $reply = (object)[
            'ticket_id' => $id,
            'userid' => $USER->id,
            'message' => $message,
            'created_at' => time(),
        ];
        $replyid = $DB->insert_record('local_academic_ticket_system_replies', $reply);
        if ($replyid && !empty($_FILES['reply_files']['name'][0])) {
            $fs = get_file_storage();
            foreach ($_FILES['reply_files']['name'] as $key => $name) {
                if ($_FILES['reply_files']['error'][$key] === UPLOAD_ERR_OK) {
                    $filerecord = [
                        'contextid' => $context->id,
                        'component' => 'local_academic_ticket_system',
                        'filearea' => 'reply_attachment',
                        'itemid' => $replyid,
                        'filepath' => '/',
                        'filename' => clean_param($name, PARAM_FILE),
                        'userid' => $USER->id,
                    ];
                    $fs->create_file_from_pathname($filerecord, $_FILES['reply_files']['tmp_name'][$key]);
                }
            }
        }

        $oldstatus = $ticketrecord->status;
        $newstatus = $canmanage ? 'admin reply' : 'student reply';
        $DB->set_field('local_academic_ticket_system_tickets', 'status', $newstatus, ['id' => $id]);

        $a = new stdClass();
        $a->user = fullname($USER);
        $a->old = get_string('status_' . str_replace(' ', '', $oldstatus), 'local_academic_ticket_system');
        $a->new = get_string('status_' . str_replace(' ', '', $newstatus), 'local_academic_ticket_system');

        $logmessage = get_string('log_status_changed_from_to', 'local_academic_ticket_system', $a);
        local_academic_ticket_system_log_action($id, $USER->id, $logmessage, $oldstatus, $newstatus);

        redirect($PAGE->url);
    }

    if ($action === 'update_status' && $canmanage) {
        $status = required_param('status', PARAM_TEXT);
        $oldstatus = $ticketrecord->status;
        $DB->set_field('local_academic_ticket_system_tickets', 'status', $status, ['id' => $id]);

        $a = new stdClass();
        $a->user = fullname($USER);
        $a->old = get_string('status_' . str_replace(' ', '', $oldstatus), 'local_academic_ticket_system');
        $a->new = get_string('status_' . str_replace(' ', '', $status), 'local_academic_ticket_system');

        $logmessage = get_string('log_status_changed_from_to', 'local_academic_ticket_system', $a);
        local_academic_ticket_system_log_action($id, $USER->id, $logmessage, $oldstatus, $status);

        redirect($PAGE->url);
    }

    if ($action === 'assign_user' && $canmanage) {
        $assignedto = required_param('assigned_to', PARAM_INT);
        $assigneduser = $DB->get_record('user', ['id' => $assignedto], '*', MUST_EXIST);
        $DB->set_field('local_academic_ticket_system_tickets', 'assigned_to', $assignedto, ['id' => $id]);

        $logmessage = get_string('log_assigned', 'local_academic_ticket_system', fullname($assigneduser));
        local_academic_ticket_system_log_action($id, $USER->id, $logmessage, '', $assignedto);

        redirect($PAGE->url);
    }

    if ($action === 'update_category' && $canmanage) {
        $catid = required_param('categoryid', PARAM_INT);
        $category = $DB->get_record('local_academic_ticket_system_categories', ['id' => $catid], 'id, title', MUST_EXIST);
        $DB->set_field('local_academic_ticket_system_tickets', 'category_id', $catid, ['id' => $id]);

        $logmessage = get_string('log_category_changed', 'local_academic_ticket_system', $category->title);
        local_academic_ticket_system_log_action($id, $USER->id, $logmessage, $ticketrecord->category_id, $catid);

        redirect($PAGE->url);
    }

    if ($action === 'add_internal_comment' && $canmanage) {
        $commenttext = required_param('internal_note', PARAM_TEXT);
        $note = (object)[
            'ticketid' => $id,
            'userid' => $USER->id,
            'content' => $commenttext,
            'created_at' => time(),
        ];
        $DB->insert_record('local_academic_ticket_system_comments', $note);

        $logmessage = get_string('log_internal_note_added', 'local_academic_ticket_system');
        local_academic_ticket_system_log_action($id, $USER->id, $logmessage, '', '');

        redirect($PAGE->url);
    }

    if ($action === 'submit_feedback' && !$canmanage && $ticketrecord->userid == $USER->id) {
        $rating = required_param('rating', PARAM_INT);
        $comment = optional_param('feedback_comment', '', PARAM_TEXT);
        if (!$DB->record_exists('local_academic_ticket_system_feedback', ['ticketid' => $id])) {
            $feedback = (object)[
                'ticketid' => $id,
                'userid' => $USER->id,
                'rating' => $rating,
                'comment' => $comment,
                'created_at' => time(),
            ];
            $DB->insert_record('local_academic_ticket_system_feedback', $feedback);

            $logmessage = get_string('log_feedback_submitted', 'local_academic_ticket_system', $rating);
            local_academic_ticket_system_log_action($id, $USER->id, $logmessage, '', $rating . ' Stars');
        }
        redirect($PAGE->url);
    }
}
$fs = get_file_storage();
$ticketfiles = $fs->get_area_files($context->id, 'local_academic_ticket_system', 'attachment', $id, "filename", false);
$ticketattachments = [];
foreach ($ticketfiles as $f) {
    $pluginurl = moodle_url::make_pluginfile_url(
        $f->get_contextid(),
        $f->get_component(),
        $f->get_filearea(),
        $f->get_itemid(),
        $f->get_filepath(),
        $f->get_filename()
    );
    $ticketattachments[] = [
        'name' => $f->get_filename(),
        'download_url' => $pluginurl->out(false),
        'icon' => $OUTPUT->pix_icon(file_file_icon($f), '', 'core', ['class' => 'w-10 h-10 inline']),
    ];
}

$repliesrecords = $DB->get_records('local_academic_ticket_system_replies', ['ticket_id' => $id], 'created_at ASC');

$userids = [];
foreach ($repliesrecords as $r) {
    $userids[$r->userid] = $r->userid;
}

$users = [];
if (!empty($userids)) {
    list($inorsql, $inparams) = $DB->get_in_or_equal($userids);
    $users = $DB->get_records_select('user', "id $inorsql", $inparams);
}

$replies = [];
foreach ($repliesrecords as $r) {
    $ruser = isset($users[$r->userid]) ? clone $users[$r->userid] : null;
    $ismanager = false;

    if ($ruser) {
        $ruser->firstnamephonetic = '';
        $ruser->lastnamephonetic = '';
        $ruser->middlename = '';
        $ruser->alternatename = '';
        $ismanager = has_capability('local/academic_ticket_system:manageticket', $context, $r->userid);
    }

    $rfiles = $fs->get_area_files($context->id, 'local_academic_ticket_system', 'reply_attachment', $r->id, "filename", false);
    $rattachments = [];
    foreach ($rfiles as $rf) {
        $replyurl = moodle_url::make_pluginfile_url(
            $rf->get_contextid(),
            $rf->get_component(),
            $rf->get_filearea(),
            $rf->get_itemid(),
            $rf->get_filepath(),
            $rf->get_filename()
        );
        $rattachments[] = [
            'name' => $rf->get_filename(),
            'url'  => $replyurl->out(false),
        ];
    }
    $replies[] = [
        'id' => $r->id,
        'user' => $ruser ? fullname($ruser) : 'Unknown User',
        'message' => format_text($r->message, FORMAT_HTML),
        'time' => userdate($r->created_at),
        'is_manager_reply' => $ismanager,
        'has_reply_attachments' => !empty($rattachments),
        'reply_attachments' => $rattachments,
    ];
}

$ticketlog = [];
$assignableusers = [];
$latesttickets = [];
$internalnotes = [];

if ($canmanage) {
    if ($DB->get_manager()->table_exists('local_academic_ticket_system_logs')) {
        $logs = $DB->get_records('local_academic_ticket_system_logs', ['ticketid' => $id], 'timemodified DESC');

        $loguserids = [];
        foreach ($logs as $l) {
            $loguserids[$l->userid] = $l->userid;
        }

        $logusers = [];
        if (!empty($loguserids)) {
            list($inorsql, $inparams) = $DB->get_in_or_equal($loguserids);
            $logusers = $DB->get_records_select('user', "id $inorsql", $inparams, '', 'id, firstname, lastname');
        }

        foreach ($logs as $l) {
            $luser = isset($logusers[$l->userid]) ? clone $logusers[$l->userid] : null;
            if ($luser) {
                $luser->firstnamephonetic = '';
                $luser->lastnamephonetic = '';
                $luser->middlename = '';
                $luser->alternatename = '';
            }
            $ticketlog[] = [
                'message' => ($luser ? fullname($luser) : 'System') . ": " . $l->actionname,
                'time' => userdate($l->timemodified, '%d %b, %H:%M'),
            ];
        }
    }
    $managers = get_users_by_capability($context, 'local/academic_ticket_system:manageticket');
    foreach ($managers as $mgr) {
        $assignableusers[] = [
            'id' => $mgr->id,
            'fullname' => fullname($mgr),
            'is_selected' => ($mgr->id == $ticketrecord->assigned_to),
        ];
    }
    $latestselsql = "SELECT * FROM {local_academic_ticket_system_tickets}
                     WHERE userid = ? AND id != ?
                     ORDER BY created_at DESC LIMIT 5";
    $recs = $DB->get_records_sql($latestselsql, [$ticketrecord->userid, $id]);
    foreach ($recs as $rec) {
        $latesttickets[] = [
            'id' => $rec->id,
            'title' => format_string($rec->title),
            'status' => $rec->status,
            'status_class' => local_academic_ticket_system_get_class($rec->status),
        ];
    }
    if ($DB->get_manager()->table_exists('local_academic_ticket_system_comments')) {
        $notesrecords = $DB->get_records('local_academic_ticket_system_comments', ['ticketid' => $id], 'created_at DESC');

        $noteuserids = [];
        foreach ($notesrecords as $note) {
            $noteuserids[$note->userid] = $note->userid;
        }

        $noteusers = [];
        if (!empty($noteuserids)) {
            list($inorsql, $inparams) = $DB->get_in_or_equal($noteuserids);
            $noteusers = $DB->get_records_select('user', "id $inorsql", $inparams, '', 'id, firstname, lastname');
        }

        foreach ($notesrecords as $note) {
            $noteuser = isset($noteusers[$note->userid]) ? clone $noteusers[$note->userid] : null;
            if ($noteuser) {
                $noteuser->firstnamephonetic = '';
                $noteuser->lastnamephonetic = '';
                $noteuser->middlename = '';
                $noteuser->alternatename = '';
            }
            $internalnotes[] = [
                'user_name' => $noteuser ? fullname($noteuser) : 'Unknown',
                'content' => format_text($note->content, FORMAT_HTML),
                'time' => userdate($note->created_at, '%d %b, %H:%M'),
                'is_me' => ($note->userid == $USER->id),
            ];
        }
    }
}

$categories = $DB->get_records('local_academic_ticket_system_categories');
$catlist = [];
foreach ($categories as $cat) {
    $catlist[] = [
        'id' => $cat->id,
        'title' => $cat->title,
        'is_selected' => ($cat->id == $ticketrecord->category_id),
    ];
}

$feedbackrecord = $DB->get_record('local_academic_ticket_system_feedback', ['ticketid' => $id]);
$canrate = ($ticketrecord->status === 'closed' && !$canmanage && !$feedbackrecord);
$ticketowner = $DB->get_record('user', ['id' => $ticketrecord->userid], '*', MUST_EXIST);
$assigneduser = $ticketrecord->assigned_to ? $DB->get_record('user', ['id' => $ticketrecord->assigned_to]) : null;

$priority = $ticketrecord->priority;

$feedbackdata = null;
if ($feedbackrecord) {
    $feedbackdata = [
        'rating' => $feedbackrecord->rating,
        'comment' => $feedbackrecord->comment,
        'stars' => array_fill(0, $feedbackrecord->rating, true),
    ];
}

$writereplystr = get_string('write_your_reply', 'local_academic_ticket_system');
$editorhtml = '<textarea id="reply_message" name="reply_message" rows="5" ' .
    'class="w-full p-4 border rounded-xl" placeholder="' . $writereplystr . '"></textarea>';

$templatedata = [
    'ticketid' => $id,
    'currentuserid' => $USER->id,
    'run_heartbeat_script' => true,
    'show_presence_list' => $canmanage,
    'ticket' => [
        'id' => $id,
        'title' => format_string($ticketrecord->title),
        'description' => format_text($ticketrecord->description, FORMAT_HTML),
        'status' => $ticketrecord->status,
        'translated_status' => get_string('status_' . str_replace(' ', '_', $ticketrecord->status), 'local_academic_ticket_system'),
        'status_class' => local_academic_ticket_system_get_class($ticketrecord->status),
        'category' => $ticketrecord->category_name ?: 'General',
        'category_id' => $ticketrecord->category_id,
        'priority' => $priority,
        'creator_profile_url' => (new moodle_url('/user/profile.php', ['id' => $ticketowner->id]))->out(false),
        'priority_label' => ucfirst($priority),
        'created_by' => fullname($ticketowner),
        'created_at' => userdate($ticketrecord->created_at),
        'status_closed' => ($ticketrecord->status === 'closed'),
        'has_attachments' => !empty($ticketattachments),
        'attachments' => $ticketattachments,
        'priority_urgent' => ($priority === 'urgent'),
        'priority_high'   => ($priority === 'high'),
        'priority_medium' => ($priority === 'medium'),
        'priority_low'    => ($priority === 'low'),
    ],
    'can_rate' => $canrate,
    'has_feedback' => (bool)$feedbackrecord,
    'feedback_data' => $feedbackdata,
    'rating_options' => [['val' => 5], ['val' => 4], ['val' => 3], ['val' => 2], ['val' => 1]],
    'replies' => $replies,
    'has_manage_capability' => $canmanage,
    'categories' => $catlist,
    'assignable_users' => $assignableusers,
    'assigned_user_name' => $assigneduser ? fullname($assigneduser) : get_string('unassigned', 'local_academic_ticket_system'),
    'is_assigned' => (bool)$ticketrecord->assigned_to,
    'latest_tickets' => $latesttickets,
    'ticket_log' => $ticketlog,
    'has_ticket_log' => !empty($ticketlog),
    'sesskey' => sesskey(),
    'internal_notes' => $internalnotes,
    'has_internal_notes' => !empty($internalnotes),
    'home_url' => new moodle_url('/local/academic_ticket_system/index.php'),
    'editor_html' => $editorhtml,
];

echo $OUTPUT->header();
echo html_writer::tag('style', $customcss);
echo $OUTPUT->render_from_template('local_academic_ticket_system/view', $templatedata);
echo $OUTPUT->footer();
