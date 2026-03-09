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
 * Index page for the Ticket System with Pagination.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');

defined('MOODLE_INTERNAL') || die();

global $DB, $USER, $PAGE, $OUTPUT;

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$url = new moodle_url('/local/academic_ticket_system/index.php');
$PAGE->set_url($url);
$PAGE->set_title(get_string('pluginname', 'local_academic_ticket_system'));
$PAGE->set_heading(get_string('pluginname', 'local_academic_ticket_system'));

$PAGE->requires->css(new moodle_url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'));
$PAGE->requires->css(new moodle_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'));

$page = optional_param('page', 0, PARAM_INT);
$perpage = 3;
$offset = $page * $perpage;

$canmanage = has_capability('local/academic_ticket_system:manageticket', $context);
$canaddticket = has_capability('local/academic_ticket_system:addticket', $context);
$canaddcategory = has_capability('local/academic_ticket_system:addcategory', $context);

$userselects = "u.firstname, u.lastname";

if ($canmanage) {
    $totalcount = $DB->count_records('ticket_system_tickets');

    $sql = "SELECT t.*, c.title AS category_title, $userselects
            FROM {ticket_system_tickets} t
            LEFT JOIN {ticket_categories} c ON t.category_id = c.id
            LEFT JOIN {user} u ON t.userid = u.id
            ORDER BY t.created_at DESC";
    $tickets = $DB->get_records_sql($sql, [], $offset, $perpage);
} else {
    $totalcount = $DB->count_records('ticket_system_tickets', ['userid' => $USER->id]);

    $sql = "SELECT t.*, c.title AS category_title, $userselects
            FROM {ticket_system_tickets} t
            LEFT JOIN {ticket_categories} c ON t.category_id = c.id
            LEFT JOIN {user} u ON t.userid = u.id
            WHERE t.userid = ?
            ORDER BY t.created_at DESC";
    $tickets = $DB->get_records_sql($sql, [$USER->id], $offset, $perpage);
}

$totalclosedglobal = $DB->count_records('ticket_system_tickets', ['status' => 'closed']);
$totalopenglobal = $DB->count_records_select('ticket_system_tickets', "status != 'closed'");

$ticketsdata = [];
foreach ($tickets as $ticket) {
    $isactionneeded = false;

    $statusclass = 'bg-gray-100 text-gray-800';
    switch ($ticket->status) {
        case 'open':
            $statusclass = 'bg-blue-100 text-blue-800 border-blue-200';
            break;
        case 'closed':
            $statusclass = 'bg-red-100 text-red-800 border-red-200';
            break;
        case 'admin reply':
            $statusclass = 'bg-purple-100 text-purple-800 border-purple-200';
            break;
        case 'student reply':
            $statusclass = 'bg-yellow-100 text-yellow-800 border-yellow-200';
            if ($canmanage) {
                $isactionneeded = true;
            }
            break;
        case 'in progress':
            $statusclass = 'bg-indigo-100 text-indigo-800 border-indigo-200';
            break;
    }

    $ticket->firstnamephonetic = $ticket->firstnamephonetic ?? '';
    $ticket->lastnamephonetic  = $ticket->lastnamephonetic ?? '';
    $ticket->middlename        = $ticket->middlename ?? '';
    $ticket->alternatename     = $ticket->alternatename ?? '';

    $creatorname = fullname($ticket);

    $assignedname = '-';
    if (!empty($ticket->assigned_to)) {
        $assigneduser = $DB->get_record('user', ['id' => $ticket->assigned_to], 'id, firstname, lastname');
        if ($assigneduser) {
            $assigneduser->firstnamephonetic = '';
            $assigneduser->lastnamephonetic  = '';
            $assigneduser->middlename        = '';
            $assigneduser->alternatename     = '';
            $assignedname = fullname($assigneduser);
        }
    }

    $ticketsdata[] = [
        'id'               => $ticket->id,
        'title'            => $ticket->title,
        'priority'         => $ticket->priority,
        'status'           => get_string('status_' . str_replace(' ', '_', $ticket->status), 'local_academic_ticket_system'),
        'status_class'     => $statusclass,
        'category_title'   => $ticket->category_title ?: 'General',
        'created_at'       => userdate($ticket->created_at),
        'created_by'       => $creatorname,
        'assigned_to'      => $assignedname,
        'view_url'         => (new moodle_url('/local/academic_ticket_system/view.php', ['id' => $ticket->id]))->out(false),
        'is_action_needed' => $isactionneeded,
    ];
}

$categoriesdata = [];
if ($canmanage) {
    $categories = $DB->get_records('ticket_categories');
    foreach ($categories as $cat) {
        $catopen = $DB->count_records_select('ticket_system_tickets', 'category_id = ? AND status != ?', [$cat->id, 'closed']);
        $catclosed = $DB->count_records('ticket_system_tickets', ['category_id' => $cat->id, 'status' => 'closed']);

        $categoriesdata[] = [
            'title'          => $cat->title,
            'open_tickets'   => $catopen,
            'closed_tickets' => $catclosed,
        ];
    }
}

$paginationdata = [];
$totalpages = ceil($totalcount / $perpage);

if ($totalpages > 1) {
    for ($i = 0; $i < $totalpages; $i++) {
        $paginationdata[] = [
            'pagnumber' => $i + 1,
            'pagurl'    => (new moodle_url($PAGE->url, ['page' => $i]))->out(false),
            'active'    => ($i == $page),
        ];
    }
}

$templatedata = [
    'user_name'             => fullname($USER),
    'currentyear'           => date('Y'),
    'has_manage_capability' => $canmanage,
    'has_addtick_capability' => $canaddticket,
    'has_addCat_capability' => $canaddcategory,
    'total_tickets'         => $totalcount,
    'total_closed_tickets'  => $totalclosedglobal,
    'total_open_tickets'    => $totalopenglobal,
    'categories'            => $categoriesdata,
    'tickets'               => $ticketsdata,
    'has_pagination'        => ($totalpages > 1),
    'pagination'            => $paginationdata,
    'prev_url'              => ($page > 0) ? (new moodle_url($PAGE->url, ['page' => $page - 1]))->out(false) : false,
    'next_url'              => ($page < $totalpages - 1) ? (new moodle_url($PAGE->url, ['page' => $page + 1]))->out(false) : false,
    'showing_from'          => $totalcount > 0 ? $offset + 1 : 0,
    'showing_to'            => min($offset + $perpage, $totalcount),
    'total_records'         => $totalcount,
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_academic_ticket_system/index', $templatedata);
echo $OUTPUT->footer();
