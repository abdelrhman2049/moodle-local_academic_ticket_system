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
 * Page to add new ticket categories/departments.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $OUTPUT, $DB, $USER;

require_login();

require_capability('local/academic_ticket_system:addcategory', context_system::instance());

$PAGE->set_url(new moodle_url('/local/academic_ticket_system/add_category.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('add_new_department', 'local_academic_ticket_system'));
$PAGE->set_heading(get_string('add_new_department', 'local_academic_ticket_system'));

$PAGE->requires->js(new moodle_url('https://cdn.jsdelivr.net/npm/sweetalert2@11'), true);
$PAGE->requires->css(new moodle_url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'));
$PAGE->requires->css(new moodle_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'));
$PAGE->requires->js_init_code('window.Swal = Swal;');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey()) {
    $title = required_param('title', PARAM_TEXT);
    $description = optional_param('description', '', PARAM_TEXT);

    $ip = getremoteaddr();

    $categorydata = (object) [
        'title' => $title,
        'description' => $description,
        'userid' => $USER->id,
        'timecreated' => time(),
        'created_by' => $USER->id,
        'ip_address' => $ip,
        'created_at' => time(),
        'updated_at' => time(),
    ];

    try {
        $DB->insert_record('ticket_categories', $categorydata);

        $successmsg = get_string('department_created', 'local_academic_ticket_system');
        $successtitle = get_string('success', 'local_academic_ticket_system');
        $indexurl = new moodle_url('/local/academic_ticket_system/index.php');

        echo $OUTPUT->header();
        $js = "Swal.fire({title: '{$successtitle}', text: '{$successmsg}', icon: 'success', " .
            "confirmButtonText: 'OK', allowOutsideClick: false}).then((result) => " .
            "{if (result.isConfirmed) {window.location.href = '{$indexurl}';}});";
        echo html_writer::script($js);
        echo $OUTPUT->footer();
        exit();

    } catch (Exception $e) {
        $errortitle = get_string('error', 'local_academic_ticket_system');
        $errormsg = get_string('creation_failed', 'local_academic_ticket_system');

        echo $OUTPUT->header();
        $jserror = "Swal.fire({title: '{$errortitle}', text: '{$errormsg}', icon: 'error', " .
            "confirmButtonText: 'OK'});";
        echo html_writer::script($jserror);
        echo $OUTPUT->footer();
        exit();
    }
}

$categories = $DB->get_records('ticket_categories');
$categorylist = [];

if ($categories) {
    foreach ($categories as $category) {
        $creator = $DB->get_record('user', ['id' => $category->created_by]);
        $categorylist[] = [
            'title' => $category->title,
            'description' => $category->description,
            'created_by' => $creator ? fullname($creator) : 'Unknown',
            'created_at' => userdate($category->created_at),
        ];
    }
}

$templatecontext = [
    'categories' => $categorylist,
    'action_url' => $PAGE->url->out(false),
    'index_url' => (new moodle_url('/local/academic_ticket_system/index.php'))->out(false),
    'sesskey' => sesskey(),
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_academic_ticket_system/add_category', $templatecontext);
echo $OUTPUT->footer();
