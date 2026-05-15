<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * External API for checking urgent tickets.
 *
 * @package     local_academic_ticket_system
 * @copyright   2025 learn-ix support@learn-ix.com
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_academic_ticket_system\external;

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use core_external\external_single_structure;
use moodle_url;

class check_urgent extends external_api {

    public static function execute_parameters() {
        return new external_function_parameters([
            'lastcheck' => new external_value(PARAM_INT, '', VALUE_DEFAULT, 0)
        ]);
    }

    public static function execute($lastcheck) {
        global $DB;

        $params = self::validate_parameters(self::execute_parameters(), ['lastcheck' => $lastcheck]);
        $lastcheck = $params['lastcheck'];

        $context = \context_system::instance();
        self::validate_context($context);
        require_capability('local/academic_ticket_system:manageticket', $context);

        if ($lastcheck <= 0) {
            $lastcheck = time() - 86400;
        }

        $sql = "SELECT t.id, t.title, u.firstname, u.lastname
                FROM {local_academic_ticket_system_tickets} t
                JOIN {user} u ON u.id = t.userid
                WHERE (t.priority = 'urgent' OR t.priority = 'high')
                AND t.status = 'open'
                AND t.created_at > ?
                ORDER BY t.created_at DESC";

        $tickets = $DB->get_records_sql($sql, [$lastcheck], 0, 1);

        if ($tickets) {
            $ticket = reset($tickets);
            $url = new moodle_url('/local/academic_ticket_system/view.php', ['id' => $ticket->id]);
            return [
                'status' => 'found',
                'id' => (int)$ticket->id,
                'title' => (string)$ticket->title,
                'user' => $ticket->firstname . ' ' . $ticket->lastname,
                'url' => $url->out(false)
            ];
        }

        return [
            'status' => 'none',
            'id' => 0,
            'title' => '',
            'user' => '',
            'url' => ''
        ];
    }

    public static function execute_returns() {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, ''),
            'id'     => new external_value(PARAM_INT, ''),
            'title'  => new external_value(PARAM_TEXT, ''),
            'user'   => new external_value(PARAM_TEXT, ''),
            'url'    => new external_value(PARAM_URL, '')
        ]);
    }
}
