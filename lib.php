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
 * Extends the navigation to include the ticket system.
 * Uses custommenuitems injection for Moodle 4.0+ to force display in Primary Nav.
 *
 * @param global_navigation $navigation The navigation object
 * @return void
 */
function local_academic_ticket_system_extend_navigation(global_navigation $navigation) {
    global $CFG, $DB, $USER, $PAGE;

    if (
        !get_config('local_academic_ticket_system', 'enabled') ||
        !get_config('local_academic_ticket_system', 'add_to_navbar')
    ) {
        return;
    }

    if (!isloggedin() || isguestuser()) {
        return;
    }

    $url = new moodle_url('/local/academic_ticket_system/index.php');
    $rawurl = '/local/academic_ticket_system/index.php';
    $title = get_string('pluginname', 'local_academic_ticket_system');

    $pendingcount = 0;
    $context = \context_system::instance();
    $canmanage = has_capability('local/academic_ticket_system:manageticket', $context);

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

    if ($pendingcount > 0) {
        $title .= " (" . $pendingcount . ")";
    }

    if ($CFG->branch >= 400) {
        if (stripos($CFG->custommenuitems, $rawurl) !== false) {
            $nodes = explode("\n", $CFG->custommenuitems);
            foreach ($nodes as $key => $node) {
                if (stripos($node, $rawurl) !== false) {
                    unset($nodes[$key]);
                }
            }
            $CFG->custommenuitems = implode("\n", $nodes);
        }

        $nodes = explode("\n", $CFG->custommenuitems);
        $newnode = $title . "|" . $rawurl;
        array_unshift($nodes, $newnode);
        $CFG->custommenuitems = implode("\n", $nodes);
    } else {
        $node = $navigation->add(
            $title,
            $url,
            navigation_node::TYPE_CUSTOM,
            null,
            'academic_ticket_system_nav',
            new pix_icon('i/message', '')
        );
        $node->showinflatnavigation = true;
    }
}

/**
 * Serves ticket attachments and reply attachments.
 *
 * @param \stdClass $course The course object
 * @param \stdClass $cm The course module object
 * @param \context $context The context object
 * @param string $filearea The file area
 * @param array $args Extra arguments
 * @param bool $forcedownload Whether or not to force download
 * @param array $options Additional options
 * @return void
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
 *
 * @param string $status The ticket status
 * @return string The CSS classes for the status badge
 */
function local_academic_ticket_system_get_class($status) {
    switch ($status) {
        case 'urgent':
            return 'bg-red-600 text-white font-bold px-3 py-1 rounded-full shadow-md animate-pulse';
        case 'open':
            return 'bg-primary-solid text-white font-bold px-3 py-1 rounded-full shadow-sm';
        case 'admin reply':
            return 'bg-secondary-solid text-white font-bold px-3 py-1 rounded-full shadow-sm';
        case 'student reply':
            return 'bg-brand-light text-primary-solid font-bold px-3 py-1 rounded-full border border-brand-light';
        case 'in progress':
            return 'bg-grad-primary text-white font-bold px-3 py-1 rounded-full shadow-md';
        case 'closed':
            return 'bg-gray-200 text-gray-500 font-bold px-3 py-1 rounded-full border border-gray-300';
        default:
            return 'bg-gray-100 text-gray-600 font-bold px-3 py-1 rounded-full border border-gray-200';
    }
}

/**
 * Logs a ticket action to the database.
 *
 * @param int $tid The ticket ID
 * @param int $uid The user ID performing the action
 * @param string $act The action name
 * @param mixed $old The old value (optional)
 * @param mixed $new The new value (optional)
 * @return int|bool The new record ID or false on failure
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
