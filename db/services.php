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
 * External web service functions declaration.
 *
 * @package     local_academic_ticket_system
 * @copyright   2025 learn-ix support@learn-ix.com
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = [
    'local_academic_ticket_system_update_presence' => [
        'classname'     => 'local_academic_ticket_system\external\update_presence',
        'methodname'    => 'execute',
        'description'   => 'Updates ticket presence',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => true,
    ],
    'local_academic_ticket_system_check_urgent' => [
        'classname'     => 'local_academic_ticket_system\external\check_urgent',
        'methodname'    => 'execute',
        'description'   => 'Checks for urgent tickets',
        'type'          => 'read',
        'ajax'          => true,
        'loginrequired' => true,
    ],
];

$services = [
    'Academic Ticket System API' => [
        'functions' => array_keys($functions),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'acadtkt_api',
    ],
];