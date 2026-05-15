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
 * External API to update user presence in a ticket.
 *
 * @package     local_academic_ticket_system
 * @copyright   2025 learn-ix support@learn-ix.com
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_academic_ticket_system\external;

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use core_external\external_multiple_structure;
use core_external\external_single_structure;
use Exception;
use stdClass;

class update_presence extends external_api {
    public static function execute_parameters() {
        return new external_function_parameters([
            'ticketid' => new external_value(PARAM_INT, '')
        ]);
    }

    public static function execute($ticketid) {
        global $DB, $USER, $OUTPUT;

        $params = self::validate_parameters(self::execute_parameters(), ['ticketid' => $ticketid]);
        $ticketid = $params['ticketid'];

        $context = \context_system::instance();
        self::validate_context($context);

        $ticketownerid = $DB->get_field('local_academic_ticket_system_tickets', 'userid', ['id' => $ticketid], MUST_EXIST);
        $canmanage = has_capability('local/academic_ticket_system:manageticket', $context);

        if (!$canmanage && $USER->id != $ticketownerid) {
            throw new \moodle_exception('nopermissions');
        }

        $presence = new stdClass();
        $presence->ticketid = $ticketid;
        $presence->userid = $USER->id;
        $presence->timemodified = time();

        if ($existing = $DB->get_record('local_academic_ticket_system_presence', ['ticketid' => $ticketid, 'userid' => $USER->id])) {
            $presence->id = $existing->id;
            $DB->update_record('local_academic_ticket_system_presence', $presence);
        } else {
            $DB->insert_record('local_academic_ticket_system_presence', $presence);
        }

        $DB->delete_records_select('local_academic_ticket_system_presence', 'timemodified < ?', [time() - 60]);

        $sql = "SELECT u.*
                FROM {local_academic_ticket_system_presence} p
                JOIN {user} u ON p.userid = u.id
                WHERE p.ticketid = ? AND p.timemodified > ?";

        $viewers = $DB->get_records_sql($sql, [$ticketid, time() - 30]);

        $activeusers = [];
        foreach ($viewers as $viewer) {
            $activeusers[] = [
                'id' => $viewer->id,
                'fullname' => fullname($viewer),
                'avatar' => $OUTPUT->user_picture($viewer, ['size' => 35, 'link' => false, 'class' => 'rounded-full']),
                'is_owner' => ($viewer->id == $ticketownerid)
            ];
        }

        return [
            'status' => 'success',
            'viewers' => $activeusers
        ];
    }

    public static function execute_returns() {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, ''),
            'viewers' => new external_multiple_structure(
                new external_single_structure([
                    'id' => new external_value(PARAM_INT, ''),
                    'fullname' => new external_value(PARAM_TEXT, ''),
                    'avatar' => new external_value(PARAM_RAW, ''),
                    'is_owner' => new external_value(PARAM_BOOL, '')
                ])
            )
        ]);
    }
}
