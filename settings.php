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
 * Settings for the Academic Ticket System.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

    $settings = new admin_settingpage(
        'local_academic_ticket_system',
        get_string('pluginname', 'local_academic_ticket_system')
    );

    // Enabled.
    $settings->add(new admin_setting_configcheckbox(
        'local_academic_ticket_system/enabled',
        get_string('enable', 'local_academic_ticket_system'),
        get_string('enable_desc', 'local_academic_ticket_system'),
        1
    ));

    // Navbar integration.
    $settings->add(new admin_setting_configcheckbox(
        'local_academic_ticket_system/add_to_navbar',
        get_string('add_to_navbar', 'local_academic_ticket_system'),
        get_string('add_to_navbar_desc', 'local_academic_ticket_system'),
        1
    ));

    // Support Email.
    $settings->add(new admin_setting_configtext(
        'local_academic_ticket_system/support_email',
        get_string('support_email', 'local_academic_ticket_system'),
        get_string('support_email_desc', 'local_academic_ticket_system'),
        'noreply@example.com',
        PARAM_EMAIL
    ));

    // Primary Color.
    $settings->add(new admin_setting_configcolourpicker(
        'local_academic_ticket_system/primary_color',
        get_string('primary_color', 'local_academic_ticket_system'),
        get_string('primary_color_desc', 'local_academic_ticket_system'),
        '#2563eb'
    ));

    // Secondary Color.
    $settings->add(new admin_setting_configcolourpicker(
        'local_academic_ticket_system/secondary_color',
        get_string('secondary_color', 'local_academic_ticket_system'),
        get_string('secondary_color_desc', 'local_academic_ticket_system'),
        '#4f46e5'
    ));

    // First Department .
    $settings->add(new admin_setting_configtext(
        'local_academic_ticket_system/system_name',
        get_string('system_name', 'local_academic_ticket_system'),
        get_string('system_name_desc', 'local_academic_ticket_system'),
        'Support',
        PARAM_TEXT
    ));

    $ADMIN->add('localplugins', $settings);
}
