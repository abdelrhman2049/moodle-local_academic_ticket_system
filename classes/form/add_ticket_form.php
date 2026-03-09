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
 * Form for adding a new ticket.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_academic_ticket_system\form;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->libdir . '/formslib.php');

/**
 * Ticket addition form class.
 */
class add_ticket_form extends \moodleform {

    /**
     * Form definition.
     */
    public function definition() {
        $mform = $this->_form;

        // Container for the entire form.
        $mform->addElement('html', '<div class="space-y-6">');

        // Title field.
        $titleclasses = 'w-full px-4 py-3 rounded-lg border border-gray-300 ' .
            'focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 ' .
            'transition-all outline-none';

        $mform->addElement('text', 'title', get_string('ticket_title', 'local_academic_ticket_system'), [
            'class' => $titleclasses,
            'placeholder' => get_string('title_placeholder', 'local_academic_ticket_system'),
        ]);
        $mform->setType('title', PARAM_TEXT);
        $mform->addRule('title', null, 'required', null, 'client');

        // Add help button.
        $mform->addHelpButton('title', 'title_help', 'local_academic_ticket_system');

        // Category field (Dropdown).
        $categories = $this->_customdata['categories'];
        $options = array_map(fn($c) => $c->name, $categories);
        $mform->addElement('select', 'category_id', get_string('category', 'local_academic_ticket_system'), $options, [
            'class' => 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none',
        ]);

        // Description field (Editor).
        $mform->addElement('editor', 'description', get_string('description', 'local_academic_ticket_system'), [
            'rows' => 10,
            'class' => 'rounded-xl',
        ]);
        $mform->setType('description', PARAM_RAW);

        // Attachments area (Filemanager).
        $mform->addElement('filemanager', 'attachments', get_string('attachments', 'local_academic_ticket_system'), null, [
            'subdirs' => 0,
            'maxfiles' => 5,
            'accepted_types' => ['image', '.pdf', '.docx'],
        ]);

        // Close the space-y-6 container.
        $mform->addElement('html', '</div>');

        // Control buttons (Submit & Cancel).
        $buttonarray = [];

        $submitclasses = 'bg-indigo-600 hover:bg-indigo-700 text-white font-bold ' .
            'py-3 px-8 rounded-lg transition-all transform hover:scale-105 shadow-md';

        $buttonarray[] = $mform->createElement('submit', 'submitbutton',
            get_string('send_ticket', 'local_academic_ticket_system'), [
                'class' => $submitclasses,
            ]);

        $buttonarray[] = $mform->createElement('cancel', 'cancelbutton', get_string('cancel'), [
            'class' => 'bg-gray-200 hover:bg-gray-300 text-gray-700 py-3 px-8 rounded-lg transition-all',
        ]);

        $mform->addGroup($buttonarray, 'buttonar', '', [' '], false);
    }
}
