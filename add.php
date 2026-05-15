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
 * Add ticket page (Custom UI).
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

defined('MOODLE_INTERNAL') || die();

global $DB, $USER, $PAGE, $OUTPUT, $CFG, $SITE;

require_login();

$context = context_system::instance();
require_capability('local/academic_ticket_system:addticket', $context);

$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/academic_ticket_system/add.php'));
$PAGE->set_title(get_string('add_ticket', 'local_academic_ticket_system'));
$PAGE->set_heading(get_string('add_ticket', 'local_academic_ticket_system'));
$primary = get_config('local_academic_ticket_system', 'primary_color') ?: '#2563eb';
$secondary = get_config('local_academic_ticket_system', 'secondary_color') ?: '#4f46e5';

$customcss = "
    :root {
        --ats-primary: {$primary};
        --ats-secondary: {$secondary};
        --ats-primary-light: {$primary}33;
    }
";
$PAGE->requires->css(new moodle_url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'));
$PAGE->requires->css(new moodle_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'));
$PAGE->requires->css(new moodle_url('/local/academic_ticket_system/styles/style.css'));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey()) {

    $title = required_param('title', PARAM_TEXT);
    $categoryid = required_param('category_id', PARAM_INT);
    $description = required_param('description', PARAM_CLEANHTML);
    $priority = required_param('priority', PARAM_ALPHA);

    $newticket = new stdClass();
    $newticket->title = $title;
    $newticket->description = $description;
    $newticket->category_id = $categoryid;
    $newticket->userid = $USER->id;
    $newticket->status = 'open';
    $newticket->priority = $priority;
    $newticket->created_at = time();
    $newticket->updated_at = time();
    $newticket->created_by = $USER->id;
    $newticket->ip_address = getremoteaddr();

    $ticketid = $DB->insert_record('local_academic_ticket_system_tickets', $newticket);

    if ($ticketid) {
        if (!empty($_FILES['attachments'])) {
            $fs = get_file_storage();
            $files = $_FILES['attachments'];

            foreach ($files['name'] as $key => $name) {
                if ($files['error'][$key] === UPLOAD_ERR_OK && !empty($name)) {
                    $filerecord = [
                        'contextid' => $context->id,
                        'component' => 'local_academic_ticket_system',
                        'filearea'  => 'attachment',
                        'itemid'    => $ticketid,
                        'filepath'  => '/',
                        'filename'  => clean_param($name, PARAM_FILE),
                        'userid'    => $USER->id,
                        'timecreated' => time(),
                        'timemodified' => time(),
                    ];

                    try {
                        $fs->create_file_from_pathname($filerecord, $files['tmp_name'][$key]);
                    } catch (Exception $e) {
                        debugging($e->getMessage());
                    }
                }
            }
        }

        $ticketurl = new moodle_url('/local/academic_ticket_system/view.php', ['id' => $ticketid]);
        $categorytitle = $DB->get_field('local_academic_ticket_system_categories', 'title', ['id' => $categoryid]);

        $a = new stdClass();
        $a->firstname = $USER->firstname;
        $a->id        = $ticketid;
        $a->title     = format_string($title);
        $a->category  = $categorytitle;
        $a->status    = get_string('status_open', 'local_academic_ticket_system');
        $a->date      = userdate(time(), get_string('strftimedate', 'langconfig'));
        $a->url       = $ticketurl->out(false);
        $a->site      = $SITE->fullname;

        $eventdata = new \core\message\message();
        $eventdata->component         = 'local_academic_ticket_system';
        $eventdata->name              = 'ticket_confirmation';
        $eventdata->userfrom          = \core_user::get_noreply_user();
        $eventdata->userto            = $USER;
        $eventdata->subject           = get_string('email_confirm_subject', 'local_academic_ticket_system', $a);
        $eventdata->fullmessage       = get_string('email_confirm_body_plain', 'local_academic_ticket_system', $a);
        $eventdata->fullmessageformat = FORMAT_HTML;
        $eventdata->fullmessagehtml   = get_string('email_confirm_body', 'local_academic_ticket_system', $a);
        $eventdata->notification      = 1;

        try {
            message_send($eventdata);
        } catch (Exception $e) {
            debugging($e->getMessage());
        }

        if ($priority === 'urgent') {
            $admins = get_admins();

            foreach ($admins as $admin) {
                $msgadmin = new \core\message\message();
                $msgadmin->component = 'local_academic_ticket_system';
                $msgadmin->name      = 'admin_urgent_alert';
                $msgadmin->userfrom  = $USER;
                $msgadmin->userto    = $admin;
                $msgadmin->subject   = get_string('admin_alert_subject', 'local_academic_ticket_system', $a);
                $msgadmin->fullmessagehtml = get_string('admin_alert_body', 'local_academic_ticket_system', $a);
                $msgadmin->fullmessageformat = FORMAT_HTML;
                $msgadmin->fullmessage = format_string($title);
                $msgadmin->notification = 1;
                $msgadmin->contexturl = $ticketurl->out(false);
                $msgadmin->contexturlname = get_string('view_ticket', 'local_academic_ticket_system');

                try {
                    message_send($msgadmin);
                } catch (Exception $e) {
                    unset($e);
                }
            }
        }

        redirect(
            new moodle_url('/local/academic_ticket_system/index.php'),
            get_string('success', 'local_academic_ticket_system'),
            null,
            \core\output\notification::NOTIFY_SUCCESS
        );
    }
}

$categories = $DB->get_records('local_academic_ticket_system_categories');
$categorieslist = [];
if ($categories) {
    foreach ($categories as $cat) {
        $categorieslist[] = ['id' => $cat->id, 'title' => $cat->title];
    }
}
echo html_writer::tag('style', $customcss);

$templatedata = [
    'title' => get_string('add_ticket', 'local_academic_ticket_system'),
    'sesskey' => sesskey(),
    'categories' => $categorieslist,
    'action_url' => $PAGE->url->out(false),
    'return_url' => (new moodle_url('/local/academic_ticket_system/index.php'))->out(false),
];
echo $OUTPUT->header();
echo html_writer::tag('style', $customcss);
echo $OUTPUT->render_from_template('local_academic_ticket_system/add_page', $templatedata);
echo $OUTPUT->footer();
