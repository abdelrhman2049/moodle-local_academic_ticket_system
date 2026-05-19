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
 * Privacy Subsystem implementation for Academic Ticket System.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_academic_ticket_system\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\writer;

class provider implements \core_privacy\local\metadata\provider, \core_privacy\local\request\plugin\provider {

    public static function get_metadata(collection $collection): collection {
        $collection->add_database_table(
            'ticket_system_tickets',
            [
                'userid' => 'privacy:metadata:tickets:userid',
                'title' => 'privacy:metadata:tickets:title',
                'content' => 'privacy:metadata:tickets:content',
                'created_at' => 'privacy:metadata:tickets:created_at'
            ],
            'privacy:metadata:tickets'
        );

        $collection->add_database_table(
            'ticket_system_presence',
            [
                'userid' => 'privacy:metadata:presence:userid',
                'ticketid' => 'privacy:metadata:presence:ticketid',
                'timemodified' => 'privacy:metadata:presence:timemodified'
            ],
            'privacy:metadata:presence'
        );

        return $collection;
    }

    public static function get_contexts_for_userid(int $userid): contextlist {
        $contextlist = new contextlist();
        $contextlist->add_from_sql(
            "SELECT c.id
               FROM {context} c
               JOIN {ticket_system_tickets} t ON t.userid = :userid
              WHERE c.contextlevel = :contextlevel",
            [
                'userid' => $userid,
                'contextlevel' => CONTEXT_SYSTEM,
            ]
        );
        return $contextlist;
    }

    public static function export_user_data(approved_contextlist $contextlist) {
        global $DB;

        $userid = $contextlist->get_user()->id;
        $tickets = $DB->get_records('ticket_system_tickets', ['userid' => $userid]);

        if (!empty($tickets)) {
            writer::with_context($contextlist->current())
                ->export_data([get_string('pluginname', 'local_academic_ticket_system')], (object) $tickets);
        }
    }

    public static function delete_data_for_all_users_in_context(\context $context) {
        global $DB;
        if ($context->contextlevel == CONTEXT_SYSTEM) {
            $DB->delete_records('ticket_system_presence');
        }
    }

    public static function delete_data_for_user(approved_contextlist $contextlist) {
        global $DB;
        $userid = $contextlist->get_user()->id;
        $DB->delete_records('ticket_system_presence', ['userid' => $userid]);
    }
}