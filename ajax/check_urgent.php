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
 * Ajax script to check for urgent tickets.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('AJAX_SCRIPT', true);
require_once('../../../config.php');

require_login();

$context = context_system::instance();
if (!has_capability('moodle/site:config', $context)) {
    echo json_encode(['status' => 'forbidden']);
    die();
}

$lastcheck = optional_param('lastcheck', time() - (24 * 60 * 60), PARAM_INT);

$sql = "SELECT t.id, t.title, u.firstname, u.lastname
        FROM {ticket_system_tickets} t
        JOIN {user} u ON u.id = t.userid
        WHERE (LOWER(t.priority) = 'urgent' OR t.priority = 'high')
        AND t.status = 'open'
        AND t.created_at > ?
        ORDER BY t.created_at DESC";

$tickets = $DB->get_records_sql($sql, [$lastcheck], 0, 1);

header('Content-Type: application/json');

if ($tickets) {
    $ticket = reset($tickets);
    echo json_encode([
        'status' => 'found',
        'id' => $ticket->id,
        'title' => $ticket->title,
        'user' => fullname($ticket),
        'url' => (new moodle_url('/local/academic_ticket_system/view.php', ['id' => $ticket->id]))->out(false),
    ]);
} else {
    echo json_encode(['status' => 'none']);
}
