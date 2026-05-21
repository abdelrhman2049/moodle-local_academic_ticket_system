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

$string['academic_ticket_system:addcategory'] = 'Permission to add new categories';
$string['academic_ticket_system:addticket'] = 'Permission to create new tickets (Student)';
$string['academic_ticket_system:download'] = 'Permission to download ticket attachments';
$string['academic_ticket_system:manageticket'] = 'Permission to manage/assign all tickets (Admin/Staff)';
$string['academic_ticket_system:specialist'] = 'Receive urgent alerts as a specialist';
$string['academic_ticket_system:viewownoverviews'] = 'View own activity dashboard';
$string['academic_ticket_system:viewticket'] = 'Permission to view ticket details';
$string['action_needed_hint'] = 'Staff have replied. Please respond.';
$string['actions'] = 'Actions';
$string['add_department'] = 'Departments';
$string['add_new_department'] = 'Add New Department';
$string['add_reply_heading'] = 'Write Your Reply';
$string['add_ticket'] = 'Add New Ticket';
$string['add_to_navbar'] = 'Add to Navigation Bar';
$string['add_to_navbar_desc'] = 'If enabled, a link to the ticket system will be added to the primary navigation menu.';
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
$string['admin_alert_subject'] = '🚨 URGENT: New Ticket #{$a->id} - {$a->title}';
$string['admin_only_label'] = 'Administrative Controls';
$string['all_rights_reserved'] = 'All rights reserved to';
$string['all_tickets'] = 'All Academic Tickets';
$string['all_tickets_stats'] = 'Global Tickets Overview';
$string['allowed_file_types'] = 'PDF, JPG, PNG (Max 5MB)';
$string['assign_user'] = 'Assign Specialist';
$string['assign_user_label'] = 'Assign to Specialist';
$string['assignable_roles'] = 'Assignable roles';
$string['assignable_roles_desc'] = 'Select the roles that can be assigned to tickets. Users with these roles will appear in the assignee dropdown.';
$string['assigned_to'] = 'Assigned Specialist';
$string['assigned_to_label'] = 'Assigned To';
$string['assigned_to_me'] = 'Assigned to me';
$string['assigned_user'] = 'Assigned To';
$string['attach_files_optional'] = 'Attachments (Optional)';
$string['attached_files'] = 'Attached Files:';
$string['attachments'] = 'Attachments';
$string['attachments_heading'] = 'Original Attachments';
$string['attention_required'] = 'Attention Required';
$string['awaiting_me_label'] = 'Awaiting My Action';
$string['back_to_home'] = 'Back to Home';
$string['browser_no_audio'] = 'Your browser does not support the audio element.';
$string['cancel'] = 'Cancel';
$string['category'] = 'Category';
$string['category_title'] = 'Department';
$string['change_category_label'] = 'Change Department';
$string['change_status_label'] = 'Update Status';
$string['click_to_download'] = 'Click to download';
$string['click_to_record'] = 'Click the microphone to start recording';
$string['click_to_upload'] = 'Click here to choose files from your device';
$string['close'] = 'Close';
$string['closed_label'] = 'Closed';
$string['copyright_label'] = 'All rights reserved';
$string['create_ticket'] = 'Create Ticket';
$string['created_at'] = 'Date Created';
$string['created_by'] = 'Created By';
$string['creation_failed'] = 'The creation of the Department failed. Please try again.';
$string['current_year_label'] = 'Current Year';
$string['default_email_placeholder'] = 'noreply@yourmoodlesite.com';
$string['department'] = 'Department';
$string['department_created'] = 'Department Created Successfully';
$string['department_deleted'] = 'Department Deleted Successfully';
$string['department_updated'] = 'Department Updated Successfully';
$string['description'] = 'Description';
$string['description_placeholder'] = 'Please explain the issue in detail...';
$string['drag_drop_hint'] = 'Drag and drop files here or click to upload';
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
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Department</td>
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
$string['email_confirm_body_plain'] = '
Hi {$a->firstname},
We received your ticket #{$a->id} regarding "{$a->title}".
Current Status: {$a->status}
You can track your ticket here:
{$a->url}
Regards,
{$a->site} Support Team
';
$string['email_confirm_subject'] = '✔ [Ticket #{$a->id}] We received your request: {$a->title}';
$string['enable'] = 'Enable System';
$string['enable_desc'] = 'If enabled, users can create and view tickets.';
$string['error'] = 'Error!';
$string['experience_question'] = 'How was your experience?';
$string['feedback_help'] = 'Your feedback helps us improve our service.';
$string['feedback_placeholder'] = 'Any additional comments? (Optional)';
$string['feedback_submitted'] = 'Feedback Submitted';
$string['filesselected'] = '{$a} files selected';
$string['form_instruction'] = 'We are happy to assist you; please fill out the form below.';
$string['happy_to_help_hint'] = 'Your issue was successfully resolved.';
$string['header_subtitle'] = 'We are here to assist you today 🌟';
$string['id'] = 'ID';
$string['internal_note_placeholder'] = 'Leave a note for colleagues...';
$string['internal_notes_heading'] = 'Internal Team Notes';
$string['ip_address'] = 'IP Address';
$string['live_stats_heading'] = 'Live Statistics Dashboard';
$string['live_viewing'] = 'Live Viewing';
$string['log_assigned'] = 'Assigned the ticket to: {$a}';
$string['log_category_changed'] = 'Changed Department to: {$a}';
$string['log_feedback_submitted'] = 'Submitted feedback with rating: {$a} stars';
$string['log_internal_note_added'] = 'Added an internal note';
$string['log_replied'] = 'Added a new reply';
$string['log_status_changed'] = '{$a->user} changed status from {$a->old} to {$a->new}.';
$string['log_status_changed_from_to'] = '{$a->user} changed status from "{$a->old}" to "{$a->new}"';
$string['messageprovider:admin_urgent_alert'] = 'Admin alert: Urgent ticket notification';
$string['messageprovider:ticket_confirmation'] = 'Ticket submission confirmation';
$string['mic_access_denied'] = 'Microphone access denied.';
$string['my_assignment'] = 'My Assignment';
$string['my_summary_heading'] = 'My Activity Overview';
$string['my_tickets_desc'] = 'Track and manage all your support requests';
$string['my_tickets_label'] = 'My Submitted Tickets';
$string['next'] = 'Next';
$string['no_internal_notes'] = 'No internal notes yet.';
$string['no_recent_tickets'] = 'No recent tickets.';
$string['no_replies_hint'] = 'Be the first to add a reply or inquiry.';
$string['no_replies_message'] = 'No replies found for this ticket yet.';
$string['no_tickets_desc'] = 'You haven\'t created any tickets yet.';
$string['no_tickets_message'] = 'You haven’t submitted any support tickets yet.
Need help? Start a new ticket and our team will take it from there.';
$string['no_tickets_title'] = 'No tickets found';
$string['nopermission'] = 'Access Denied';
$string['nopermission_desc'] = 'Sorry, you do not have permission to view this ticket.';
$string['of'] = 'of';
$string['open_label'] = 'Open';
$string['pluginname'] = 'Academic Ticket System';
$string['previous'] = 'Previous';
$string['primary_color'] = 'Primary Color';
$string['primary_color_desc'] = 'The main color used for buttons, headers, and primary branding.';
$string['priority'] = 'Priority';
$string['priority_high'] = 'High';
$string['priority_low'] = 'Low';
$string['priority_medium'] = 'Medium';
$string['priority_urgent'] = 'Urgent';
$string['privacy:metadata:presence'] = 'Temporary storage for real-time live viewing status.';
$string['privacy:metadata:presence:ticketid'] = 'The ID of the ticket being viewed.';
$string['privacy:metadata:presence:timemodified'] = 'The last time the user presence was updated.';
$string['privacy:metadata:presence:userid'] = 'The ID of the user currently viewing a ticket.';
$string['privacy:metadata:tickets'] = 'Storage for user-created support tickets.';
$string['privacy:metadata:tickets:content'] = 'The full content and description of the ticket.';
$string['privacy:metadata:tickets:created_at'] = 'The timestamp when the ticket was opened.';
$string['privacy:metadata:tickets:title'] = 'The title of the ticket.';
$string['privacy:metadata:tickets:userid'] = 'The ID of the user who created the ticket.';
$string['quick_tip_label'] = 'Quick Tip';
$string['ready'] = 'Ready';
$string['recent_tickets_heading'] = 'Latest Student Tickets';
$string['record_voice_note'] = 'Voice Note (Accessibility)';
$string['recording_finished'] = 'Voice note recorded successfully';
$string['recording_now'] = 'Recording... click stop when finished';
$string['remove_file'] = 'Remove file';
$string['reopen_ticket_button'] = 'Reopen Ticket';
$string['replies_heading'] = 'Discussion History';
$string['resolved_label'] = 'Resolved';
$string['return_home'] = 'Back to List';
$string['rolespecialist'] = 'Support Specialist';
$string['rolespecialistdescription'] = 'Handles department academic tickets and support workflow.';
$string['search_placeholder'] = 'Search by ID or Subject...';
$string['search_user_placeholder'] = 'Search name, email or username...';
$string['secondary_color'] = 'Secondary Color';
$string['secondary_color_desc'] = 'Used for gradients, accents, and secondary UI elements.';
$string['select_department_hint'] = '-- Select Department --';
$string['select_priority_hint'] = 'Select priority level';
$string['send_reply_button'] = 'Send Reply & Files';
$string['send_ticket'] = 'Send Ticket';
$string['sending'] = 'Sending...';
$string['showing'] = 'Showing';
$string['sorry_no_ticket'] = 'No Tickets Found';
$string['start_new_ticket_btn'] = 'Create Your First Ticket';
$string['start_recording'] = 'Start voice recording';
$string['start_reply'] = 'Start the conversation below!';
$string['status'] = 'Ticket Status';
$string['status_admin_reply'] = 'Admin Replied';
$string['status_adminreply'] = 'Admin Reply';
$string['status_assigned'] = 'Assigned to Specialist';
$string['status_closed'] = 'Closed';
$string['status_in_progress'] = 'In Progress';
$string['status_open'] = 'Open';
$string['status_pending'] = 'Pending';
$string['status_resolved'] = 'Resolved';
$string['status_student_reply'] = 'Student Replied';
$string['status_studentreply'] = 'Student Reply';
$string['status_urgent'] = 'Urgent';
$string['stop_recording'] = 'Stop voice recording';
$string['student'] = 'Student';
$string['student_dashboard_tip'] = 'To ensure the fastest support, please respond within 12 hours. Tickets with no activity for 12 hours are automatically closed.';
$string['submit'] = 'Submit';
$string['submit_feedback'] = 'Submit Feedback';
$string['success'] = 'Success!';
$string['support_email'] = 'Support Email';
$string['support_email_desc'] = 'The email address displayed to users for direct contact or notifications.';
$string['support_team'] = 'Support Team';
$string['system_name'] = 'First Department Name';
$string['system_name_desc'] = 'This is the default name for the first department. You can rename it or manage other departments later by clicking on the "Departments" section.';
$string['ticket_department_label'] = 'Department';
$string['ticket_description_label'] = 'Issue Description';
$string['ticket_details_heading'] = 'Ticket Details';
$string['ticket_id_label'] = 'Ticket Reference ID';
$string['ticket_log'] = 'Activity Timeline';
$string['ticket_priority_label'] = 'Ticket Priority';
$string['ticket_status_label'] = 'Current Status';
$string['ticket_title'] = 'Ticket Title';
$string['ticket_title_help'] = 'Enter a brief and descriptive title for your support request.';
$string['ticket_title_label'] = 'Ticket Title';
$string['tickets_count'] = 'tickets';
$string['ticketsystem'] = 'Ticket System';
$string['title'] = 'Subject Title';
$string['title_placeholder'] = 'e.g., I cannot access the course...';
$string['to'] = 'to';
$string['tooltip_category_hint'] = 'Select the department that handles this issue';
$string['tooltip_desc_hint'] = 'Provide full details (steps to reproduce, errors, etc.)';
$string['tooltip_priority_hint'] = 'Choose how urgent your request is';
$string['tooltip_title_hint'] = 'Give your ticket a clear, short name';
$string['tooltip_upload_hint'] = 'Upload screenshots or logs (Max 5MB)';
$string['tooltip_voice_hint'] = 'Best for complex issues - Max 2 minutes';
$string['total'] = 'Total';
$string['total_tickets_label'] = 'Total Tickets';
$string['unassigned'] = 'Not Assigned';
$string['under_review_label'] = 'Under Review';
$string['update_category_button'] = 'Update Department';
$string['update_status_button'] = 'Save Changes';
$string['user_name_label'] = 'Submitted By';
$string['view'] = 'View Details';
$string['view_profile'] = 'View Profile';
$string['view_ticket'] = 'View Ticket';
$string['viewticket'] = 'View Ticket';
$string['visit_my_portfolio'] = 'Visit my portfolio';
$string['we_are_working_hint'] = 'We are currently reviewing your request.';
$string['welcome_message'] = 'Welcome to Academic Support System';
$string['write_your_reply'] = 'Write your reply  ....';
