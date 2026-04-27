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
 * English strings for local_academic_ticket_system.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin Info.
$string['pluginname'] = 'Academic Ticket System';
$string['ticketsystem'] = 'Ticket System';

// General Actions.
$string['actions'] = 'Actions';
$string['add_ticket'] = 'Add New Ticket';
$string['create_ticket'] = 'Create Ticket';
$string['return_home'] = 'Back to List';
$string['viewticket'] = 'View Ticket';
$string['submit'] = 'Submit';
$string['success'] = 'Success!';
$string['error'] = 'Error!';
$string['reopen_ticket_button'] = 'Reopen Ticket';
$string['back_to_home'] = 'Back to Home';
$string['view'] = 'View Details';
$string['department_created'] = 'Department Created Successfully';
$string['creation_failed'] = 'The creation of the category failed. Please try again.';

// Form Fields & UI Elements.
$string['ticket_title'] = 'Ticket Title';
$string['ticket_title_label'] = 'Ticket Title';
$string['ticket_description_label'] = 'Issue Description';
$string['description'] = 'Description';
$string['ticket_department_label'] = 'Department';
$string['user_name_label'] = 'Submitted By';
$string['click_to_upload'] = 'Click here to choose files from your device';
$string['attach_files_optional'] = 'Attachments (Optional)';
$string['attachments'] = 'Attachments';
$string['send_ticket'] = 'Send Ticket';
$string['welcome_message'] = 'Welcome to Academic Support System';
$string['form_instruction'] = 'We are happy to assist you; please fill out the form below.';
$string['title_placeholder'] = 'e.g., I cannot access the course...';
$string['select_department_hint'] = '-- Select Department --';
$string['description_placeholder'] = 'Please explain the issue in detail...';
$string['drag_drop_hint'] = 'Or drag and drop files here';

// Statuses.
$string['status_open'] = 'Open';
$string['status_closed'] = 'Closed';
$string['status_in_progress'] = 'In Progress';
$string['status_urgent'] = 'Urgent';
$string['status_admin_reply'] = 'Admin Replied';
$string['status_student_reply'] = 'Student Replied';
$string['status_assigned'] = 'Assigned to Specialist';

// Admin & Assignments.
$string['admin_only_label'] = 'Administrative Controls';
$string['change_status_label'] = 'Update Status';
$string['update_status_button'] = 'Save Changes';
$string['change_category_label'] = 'Change Department';
$string['update_category_button'] = 'Update Department';
$string['assign_user_label'] = 'Assign to Specialist';
$string['assigned_user'] = 'Assigned To';
$string['unassigned'] = 'Not Assigned';
$string['assign_user'] = 'Assign Specialist';
$string['assigned_to_label'] = 'Assigned To';
$string['assigned_to'] = 'Assigned Specialist';

// Replies & History.
$string['replies_heading'] = 'Discussion History';
$string['no_replies_message'] = 'No replies found for this ticket yet.';
$string['no_replies_hint'] = 'Be the first to add a reply or inquiry.';
$string['add_reply_heading'] = 'Write Your Reply';
$string['send_reply_button'] = 'Send Reply & Files';
$string['start_reply'] = 'Start the conversation below!';
$string['write_your_reply'] = 'Write your reply  ....';

// Activity Logs.
$string['ticket_log'] = 'Activity Timeline';
$string['log_replied'] = '{$a} added a new reply.';
$string['log_status_changed'] = '{$a->user} changed status from {$a->old} to {$a->new}.';
$string['log_assigned'] = 'Assigned ticket to a specialist.';
$string['log_category_changed'] = '{$a->user} moved ticket from {$a->old} to {$a->new}.';

// Headings & Labels.
$string['ticket_details_heading'] = 'Ticket Details';
$string['attachments_heading'] = 'Original Attachments';
$string['recent_tickets_heading'] = 'Latest Student Tickets';
$string['ticket_id_label'] = 'Ticket Reference ID';
$string['created_at'] = 'Date Created';
$string['ticket_status_label'] = 'Current Status';
$string['all_tickets'] = 'All Academic Tickets';
$string['add_new_department'] = 'Add New Department';
$string['id'] = 'ID';
$string['title'] = 'Subject Title';
$string['status'] = 'Ticket Status';
$string['department'] = 'Department';
$string['category_title'] = 'Department';
$string['category'] = 'Category';
$string['ip_address'] = 'IP Address';
$string['created_by'] = 'Created By';

// Stats & General.
$string['all_tickets_stats'] = 'Global Tickets Overview';
$string['my_tickets_label'] = 'My Submitted Tickets';
$string['total'] = 'Total';
$string['no_tickets_desc'] = 'You haven\'t created any tickets yet.';
$string['all_rights_reserved'] = 'All rights reserved to';
$string['sorry_no_ticket'] = 'No Tickets Found';
$string['nopermission'] = 'Access Denied';
$string['nopermission_desc'] = 'Sorry, you do not have permission to view this ticket.';
$string['email_confirm_subject'] = '✔ [Ticket #{$a->id}] We received your request: {$a->title}';
$string['email_confirm_body_plain'] = '
Hi {$a->firstname},
We received your ticket #{$a->id} regarding "{$a->title}".
Current Status: {$a->status}
You can track your ticket here:
{$a->url}
Regards,
{$a->site} Support Team
';
$string['email_confirm_body'] = '
<div style="background-color: #f3f4f6; padding: 40px 0; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; color: #374151;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
        <div style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); padding: 32px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px;">Ticket Received!</h1>
            <p style="color: #e0e7ff; margin: 8px 0 0 0; font-size: 15px; font-weight: 500;">We are reviewing your request</p>
        </div>
        <div style="padding: 40px 30px;">
            <p style="font-size: 16px; margin-bottom: 24px; color: #111827;">Hi <strong>{$a->firstname}</strong>,</p>
            <p style="line-height: 1.6; color: #4b5563; margin-bottom: 30px;">
                Thank you for reaching out. A new support ticket has been opened successfully. Our support team will review the details and get back to you shortly.
            </p>
            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin-bottom: 32px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Ticket ID</td>
                        <td style="padding: 8px 0; color: #111827; font-weight: 700; text-align: right; font-family: monospace; font-size: 14px;">#{$a->id}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Subject</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right; font-weight: 600;">{$a->title}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Category</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right;">{$a->category}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Date</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right;">{$a->date}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 0; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Status</td>
                        <td style="padding: 12px 0 0; text-align: right;">
                            <span style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: 800; text-transform: uppercase;">{$a->status}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center;">
                <a href="{$a->url}" style="display: inline-block; background: linear-gradient(to right, #4f46e5, #3b82f6); color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-weight: 700; font-size: 16px; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4); transition: all 0.3s ease;">
                    View Ticket Details
                </a>
            </div>
            <p style="text-align: center; font-size: 12px; color: #9ca3af; margin-top: 24px;">
                Alternatively, you can copy this link: <br>
                <a href="{$a->url}" style="color: #6b7280; text-decoration: none;">{$a->url}</a>
            </p>
        </div>
        <div style="background-color: #f9fafb; padding: 24px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="color: #9ca3af; font-size: 12px; margin: 0 0 8px;">
                This is an automated message. Please do not reply directly to this email.
            </p>
            <p style="color: #d1d5db; font-size: 11px; margin: 0; font-weight: 600; text-transform: uppercase;">
                Powered by {$a->site} Support System
            </p>
        </div>
    </div>
</div>';
$string['view_ticket'] = 'View Ticket';
$string['admin_alert_subject'] = '🚨 URGENT: New Ticket #{$a->id} - {$a->title}';
$string['admin_alert_body'] = '
<div style="padding: 15px; border-left: 5px solid #ef4444; background-color: #fef2f2;">
    <h3 style="margin-top:0; color: #b91c1c;">🚨 Urgent Ticket Received</h3>
    <p><strong>Student:</strong> {$a->firstname}</p>
    <p><strong>Title:</strong> {$a->title}</p>
    <p><strong>Category:</strong> {$a->category}</p>
    <hr style="border:0; border-top:1px solid #fee2e2; margin: 10px 0;">
    <a href="{$a->url}" style="background-color: #dc2626; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">
        View Ticket Now
    </a>
</div>
';
$string['header_subtitle'] = 'We are here to assist you today 🌟';
$string['current_year_label'] = 'Current Year';
$string['live_stats_heading'] = 'Live Statistics Dashboard';
$string['total_tickets_label'] = 'Total Tickets';
$string['closed_label'] = 'Closed';
$string['open_label'] = 'Open';
$string['my_tickets_desc'] = 'Track and manage all your support requests';
$string['search_placeholder'] = 'Search by ID or Subject...';
$string['no_tickets_title'] = 'No tickets found';
$string['no_tickets_message'] = 'You haven’t submitted any support tickets yet.
Need help? Start a new ticket and our team will take it from there.';
$string['start_new_ticket_btn'] = 'Create Your First Ticket';
$string['copyright_label'] = 'All rights reserved';
$string['attention_required'] = 'Attention Required';
$string['cancel'] = 'Cancel';
$string['enable'] = 'Enable System';
$string['enable_desc'] = 'If enabled, users can create and view tickets.';
$string['support_email'] = 'Support Email';
$string['support_email_desc'] = 'The email address displayed to users for direct contact or notifications.';
$string['default_email_placeholder'] = 'noreply@yourmoodlesite.com';
$string['internal_notes_heading'] = 'Internal Team Notes';
$string['no_internal_notes'] = 'No internal notes yet.';
$string['internal_note_placeholder'] = 'Leave a note for colleagues...';
$string['academic_ticket_system:addcategory'] = 'Permission to add new categories';
$string['academic_ticket_system:download'] = 'Permission to download ticket attachments';
$string['academic_ticket_system:manageticket'] = 'Permission to manage/assign all tickets (Admin/Staff)';
$string['academic_ticket_system:addticket'] = 'Permission to create new tickets (Student)';
$string['academic_ticket_system:viewticket'] = 'Permission to view ticket details';
$string['my_summary_heading'] = 'Your Activity Summary';
$string['awaiting_me_label'] = 'Awaiting Your Reply';
$string['under_review_label'] = 'Under Review';
$string['resolved_label'] = 'Resolved Tickets';
$string['action_needed_hint'] = 'Please reply to prevent automatic closure';
$string['we_are_working_hint'] = 'Our team is currently processing your request';
$string['happy_to_help_hint'] = 'We are always happy to assist you!';
$string['quick_tip_label'] = 'Quick Tip';
$string['student_dashboard_tip'] = 'Please remember to respond to staff inquiries within 12 hours. Inactive tickets are automatically closed to ensure faster support for everyone.';
$string['academic_ticket_system:viewownoverviews'] = 'View own activity dashboard';
$string['my_summary_heading'] = 'My Activity Overview';
$string['awaiting_me_label'] = 'Awaiting My Action';
$string['under_review_label'] = 'Under Review';
$string['resolved_label'] = 'Resolved';
$string['action_needed_hint'] = 'Staff have replied. Please respond.';
$string['we_are_working_hint'] = 'We are currently reviewing your request.';
$string['happy_to_help_hint'] = 'Your issue was successfully resolved.';
$string['quick_tip_label'] = 'Quick Tip';
$string['student_dashboard_tip'] = 'To ensure the fastest support, please respond within 12 hours. Tickets with no activity for 12 hours are automatically closed.';
$string['ticket_priority_label'] = 'Ticket Priority';
$string['select_priority_hint'] = 'Select priority level';
$string['priority'] = 'Priority';
$string['priority_low'] = 'Low';
$string['priority_medium'] = 'Medium';
$string['priority_high'] = 'High';
$string['priority_urgent'] = 'Urgent';
$string['messageprovider:ticket_confirmation'] = 'Ticket submission confirmation';
$string['messageprovider:admin_urgent_alert'] = 'Admin alert: Urgent ticket notification';
$string['showing'] = 'Showing';
$string['to'] = 'to';
$string['of'] = 'of';
$string['tickets_count'] = 'tickets';
$string['previous'] = 'Previous';
$string['next'] = 'Next';
$string['filesselected'] = '{$a} files selected';
$string['sending'] = 'Sending...';
$string['drag_drop_hint'] = 'Drag and drop files here or click to upload';
$string['record_voice_note'] = 'Voice Note (Accessibility)';
$string['click_to_record'] = 'Click the microphone to start recording';
$string['recording_now'] = 'Recording... click stop when finished';
$string['recording_finished'] = 'Voice note recorded successfully';
$string['tooltip_title_hint'] = 'Give your ticket a clear, short name';
$string['tooltip_voice_hint'] = 'Best for complex issues - Max 2 minutes';
$string['tooltip_upload_hint'] = 'Upload screenshots or logs (Max 5MB)';
$string['start_recording'] = 'Start voice recording';
$string['stop_recording'] = 'Stop voice recording';
$string['tooltip_category_hint'] = 'Select the department that handles this issue';
$string['tooltip_priority_hint'] = 'Choose how urgent your request is';
$string['tooltip_desc_hint'] = 'Provide full details (steps to reproduce, errors, etc.)';
$string['status_open'] = 'Open';
$string['status_pending'] = 'Pending';
$string['status_resolved'] = 'Resolved';
$string['status_closed'] = 'Closed';
$string['status_adminreply'] = 'Admin Reply';
$string['status_studentreply'] = 'Student Reply';
$string['log_status_changed_from_to'] = '{$a->user} changed status from "{$a->old}" to "{$a->new}"';
$string['log_replied'] = 'Added a new reply';
$string['log_assigned'] = 'Assigned the ticket to: {$a}';
$string['log_category_changed'] = 'Changed category to: {$a}';
$string['log_internal_note_added'] = 'Added an internal note';
$string['log_feedback_submitted'] = 'Submitted feedback with rating: {$a} stars';
$string['ticket_title_help'] = 'Enter a brief and descriptive title for your support request.';
$string['privacy:metadata:tickets'] = 'Storage for user-created support tickets.';
$string['privacy:metadata:tickets:userid'] = 'The ID of the user who created the ticket.';
$string['privacy:metadata:tickets:title'] = 'The title of the ticket.';
$string['privacy:metadata:tickets:content'] = 'The full content and description of the ticket.';
$string['privacy:metadata:tickets:created_at'] = 'The timestamp when the ticket was opened.';
$string['privacy:metadata:presence'] = 'Temporary storage for real-time live viewing status.';
$string['privacy:metadata:presence:userid'] = 'The ID of the user currently viewing a ticket.';
$string['privacy:metadata:presence:ticketid'] = 'The ID of the ticket being viewed.';
$string['privacy:metadata:presence:timemodified'] = 'The last time the user presence was updated.';
