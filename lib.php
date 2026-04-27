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
 * Library functions for local_academic_ticket_system.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Extends the primary navigation to include the ticket system for everyone.
 *
 * @param \core\navigation\views\primary $navigation
 * @return void
 */
function local_academic_ticket_system_extend_navigation_primary(\core\navigation\views\primary $navigation) {
    global $DB, $USER, $PAGE;

    $url = new moodle_url('/local/academic_ticket_system/index.php');
    $title = get_string('pluginname', 'local_academic_ticket_system');

    $pendingcount = 0;
    if (isloggedin() && !isguestuser()) {
        $context = \context_system::instance();
        $canmanage = has_capability('local_academic_ticket_system:manageticket', $context);

        try {
            if ($canmanage) {
                $pendingcount = $DB->count_records('local_academic_ticket_system_tickets', ['status' => 'student reply']);
            } else {
                $pendingcount = $DB->count_records('local_academic_ticket_system_tickets', [
                    'userid' => $USER->id,
                    'status' => 'admin reply',
                ]);
            }
        } catch (\Exception $e) {
            $pendingcount = 0;
        }
    }

    if ($pendingcount > 0) {
        $title .= " (" . $pendingcount . ")";
    }

    $node = \core\navigation\views\primary::create_node(
        $title,
        $url,
        'academic_ticket_system_primary',
        null,
        'fas fa-ticket-alt'
    );

    if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
        $node->set_active_internal(true);
    }

    $navigation->add_node($node);
}

/**
 * Serves ticket attachments and reply attachments.
 */
function local_academic_ticket_system_pluginfile($course, $cm, $context, $filearea, $args,
                                                 $forcedownload, array $options = []) {
    global $DB;

    if ($context->contextlevel != CONTEXT_SYSTEM) {
        send_file_not_found();
    }

    require_login();

    $validareas = ['attachment', 'reply_attachment'];
    if (!in_array($filearea, $validareas)) {
        send_file_not_found();
    }

    $itemid = (int)array_shift($args);
    $filename = array_pop($args);
    $filepath = $args ? '/' . implode('/', $args) . '/' : '/';

    $fs = get_file_storage();
    $file = $fs->get_file($context->id, 'local_academic_ticket_system', $filearea, $itemid, $filepath, $filename);

    if (!$file) {
        send_file_not_found();
    }

    send_stored_file($file, 86400, 0, $forcedownload, $options);
}

/**
 * Returns CSS classes based on ticket status.
 */
function local_academic_ticket_system_get_class($status) {
    switch ($status) {
        case 'urgent':
            return 'bg-red-600 text-white font-bold px-3 py-1 rounded-full shadow-md';
        case 'open':
            return 'bg-blue-500 text-white px-3 py-1 rounded-full';
        case 'admin reply':
            return 'bg-purple-500 text-white px-3 py-1 rounded-full';
        case 'student reply':
            return 'bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full';
        case 'in progress':
            return 'bg-indigo-500 text-white px-3 py-1 rounded-full';
        case 'closed':
            return 'bg-gray-400 text-white px-3 py-1 rounded-full';
        default:
            return 'bg-gray-100 text-gray-800 px-3 py-1 rounded-full';
    }
}

/**
 * Logs a ticket action to the database.
 */
function local_academic_ticket_system_log_action($tid, $uid, $act, $old = null, $new = null) {
    global $DB;
    $log = (object)[
        'ticketid' => $tid,
        'userid' => $uid,
        'actionname' => $act,
        'oldvalue' => $old,
        'newvalue' => $new,
        'timemodified' => time(),
    ];
    return $DB->insert_record('local_academic_ticket_system_logs', $log);
}
