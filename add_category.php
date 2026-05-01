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
$PAGE->requires->css(new moodle_url('/local/academic_ticket_system/styles/style.css'));
$primary = get_config('local_academic_ticket_system', 'primary_color') ?: '#2563eb';
$secondary = get_config('local_academic_ticket_system', 'secondary_color') ?: '#4f46e5';

$customcss = "
    :root {
        --ats-primary: {$primary};
        --ats-secondary: {$secondary};
        --ats-primary-light: {$primary}33; /* 20% opacity */
    }
";
$alert = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey()) {
    $action = optional_param('action', 'add', PARAM_ALPHANUMEXT);
    if ($action === 'delete') {
        $id = required_param('id', PARAM_INT);
        try {
            $DB->delete_records('local_academic_ticket_system_categories', ['id' => $id]);
            $alert = [
                'type' => 'success',
                'title' => get_string('success', 'local_academic_ticket_system'),
                'message' => get_string('department_deleted', 'local_academic_ticket_system'),
                'redirect' => $PAGE->url->out(false)
            ];
        } catch (Exception $e) {
            $alert = [
                'type' => 'error',
                'title' => get_string('error', 'local_academic_ticket_system'),
                'message' => get_string('deletion_failed', 'local_academic_ticket_system'),
                'redirect' => ''
            ];
        }
    } elseif ($action === 'edit') {
        $id = required_param('id', PARAM_INT);
        $title = required_param('title', PARAM_TEXT);
        $description = optional_param('description', '', PARAM_TEXT);
        $categorydata = (object) [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => time(),
        ];
        try {
            $DB->update_record('local_academic_ticket_system_categories', $categorydata);
            $alert = [
                'type' => 'success',
                'title' => get_string('success', 'local_academic_ticket_system'),
                'message' => get_string('department_updated', 'local_academic_ticket_system'),
                'redirect' => $PAGE->url->out(false)
            ];
        } catch (Exception $e) {
            $alert = [
                'type' => 'error',
                'title' => get_string('error', 'local_academic_ticket_system'),
                'message' => get_string('update_failed', 'local_academic_ticket_system'),
                'redirect' => ''
            ];
        }
    } else {
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
            $DB->insert_record('local_academic_ticket_system_categories', $categorydata);
            $alert = [
                'type' => 'success',
                'title' => get_string('success', 'local_academic_ticket_system'),
                'message' => get_string('department_created', 'local_academic_ticket_system'),
                'redirect' => (new moodle_url('/local/academic_ticket_system/index.php'))->out(false)
            ];
        } catch (Exception $e) {
            $alert = [
                'type' => 'error',
                'title' => get_string('error', 'local_academic_ticket_system'),
                'message' => get_string('creation_failed', 'local_academic_ticket_system'),
                'redirect' => ''
            ];
        }
    }
}
$categories = $DB->get_records('local_academic_ticket_system_categories');
$categorylist = [];
if ($categories) {
    $userids = [];
    foreach ($categories as $category) {
        if (!empty($category->created_by)) {
            $userids[$category->created_by] = $category->created_by;
        }
    }
    $users = [];
    if (!empty($userids)) {
        list($inorsql, $inparams) = $DB->get_in_or_equal($userids);
        $users = $DB->get_records_select('user', "id $inorsql", $inparams, '', 'id, firstname, lastname');
    }
    foreach ($categories as $category) {
        $creator = isset($users[$category->created_by]) ? clone $users[$category->created_by] : null;
        if ($creator) {
            $creator->firstnamephonetic = '';
            $creator->lastnamephonetic = '';
            $creator->middlename = '';
            $creator->alternatename = '';
        }
        $categorylist[] = [
            'id' => $category->id,
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
    'has_alert' => $alert !== null,
    'alert' => $alert
];
echo $OUTPUT->header();
echo html_writer::tag('style', $customcss);
echo $OUTPUT->render_from_template('local_academic_ticket_system/add_category', $templatecontext);
echo $OUTPUT->footer();
