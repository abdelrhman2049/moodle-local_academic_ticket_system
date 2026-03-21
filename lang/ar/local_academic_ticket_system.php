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
 * Arabic strings for local_academic_ticket_system.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin Info.
$string['pluginname'] = 'نظام التذاكر الأكاديمية';
$string['ticketsystem'] = 'نظام التذاكر';

// General Actions.
$string['actions'] = 'الإجراءات';
$string['add_ticket'] = 'إضافة تذكرة جديدة';
$string['create_ticket'] = 'إنشاء تذكرة';
$string['return_home'] = 'العودة للقائمة';
$string['viewticket'] = 'عرض التذكرة';
$string['submit'] = 'إرسال';
$string['success'] = 'تم بنجاح!';
$string['error'] = 'خطأ!';
$string['reopen_ticket_button'] = 'إعادة فتح التذكرة';
$string['back_to_home'] = 'العودة للرئيسية';
$string['view'] = 'عرض التفاصيل';
$string['department_created'] = 'تم إنشاء القسم بنجاح';
$string['creation_failed'] = 'فشل عملية إنشاء القسم، يرجى المحاولة مرة أخرى.';

// Form Fields & UI Elements.
$string['ticket_title'] = 'عنوان التذكرة';
$string['ticket_title_label'] = 'عنوان التذكرة';
$string['ticket_description_label'] = 'وصف المشكلة';
$string['description'] = 'الوصف';
$string['ticket_department_label'] = 'القسم';
$string['user_name_label'] = 'تم التقديم بواسطة';
$string['click_to_upload'] = 'انقر هنا لاختيار الملفات من جهازك';
$string['attach_files_optional'] = 'المرفقات (اختياري)';
$string['attachments'] = 'المرفقات';
$string['send_ticket'] = 'إرسال التذكرة';
$string['welcome_message'] = 'مرحباً بك في نظام الدعم الأكاديمي';
$string['form_instruction'] = 'يسعدنا مساعدتك، يرجى ملء النموذج أدناه وسيتم الرد عليك فوراً.';
$string['title_placeholder'] = 'مثال: لا يمكنني الدخول للمقرر...';
$string['select_department_hint'] = '-- اختر القسم --';
$string['description_placeholder'] = 'يرجى شرح المشكلة بالتفصيل لمساعدتك بشكل أفضل...';
$string['drag_drop_hint'] = 'أو قم بسحب وإفلات الملفات هنا';

// Statuses.
$string['status_open'] = 'مفتوحة';
$string['status_closed'] = 'مغلقة';
$string['status_in_progress'] = 'قيد التنفيذ';
$string['status_urgent'] = 'عاجلة';
$string['status_admin_reply'] = 'رد الإدارة';
$string['status_student_reply'] = 'رد الطالب';
$string['status_assigned'] = 'تم التعيين لمختص';

// Admin & Assignments.
$string['admin_only_label'] = 'إعدادات خاصة بالإدارة';
$string['change_status_label'] = 'تحديث الحالة';
$string['update_status_button'] = 'حفظ التغييرات';
$string['change_category_label'] = 'تغيير القسم';
$string['update_category_button'] = 'تحديث القسم';
$string['assign_user_label'] = 'تعيين لموظف مختص';
$string['assigned_user'] = 'تم التعيين لـ';
$string['unassigned'] = 'غير معين';
$string['assign_user'] = 'تعيين مختص';
$string['assigned_to_label'] = 'الموظف المسؤول';
$string['assigned_to'] = 'المختص المسؤول';

// Replies & History.
$string['replies_heading'] = 'سجل المناقشة';
$string['no_replies_message'] = 'لا توجد ردود على هذه التذكرة حتى الآن.';
$string['no_replies_hint'] = 'كن أول من يضيف رداً أو استفساراً لنتمكن من مساعدتك.';
$string['add_reply_heading'] = 'اكتب ردك';
$string['send_reply_button'] = 'إرسال الرد والملفات';
$string['start_reply'] = 'ابدأ المحادثة أدناه!';
$string['write_your_reply'] = 'اكتب ردك...';

// Activity Logs.
$string['ticket_log'] = 'سجل النشاطات';
$string['log_replied'] = 'قام {$a} بإضافة رد جديد.';
$string['log_status_changed'] = 'قام {$a->user} بتغيير الحالة من {$a->old} إلى {$a->new}.';
$string['log_assigned'] = 'تم تعيين التذكرة لموظف مختص.';
$string['log_category_changed'] = 'قام {$a->user} بنقل التذكرة من {$a->old} إلى {$a->new}.';

// Headings & Labels.
$string['ticket_details_heading'] = 'تفاصيل التذكرة';
$string['attachments_heading'] = 'المرفقات الأصلية';
$string['recent_tickets_heading'] = 'تذاكر الطالب الأخيرة';
$string['ticket_id_label'] = 'رقم مرجع التذكرة';
$string['created_at'] = 'تاريخ التقديم';
$string['ticket_status_label'] = 'الحالة الحالية';
$string['all_tickets'] = 'جميع التذاكر الأكاديمية';
$string['add_new_department'] = 'إضافة قسم جديد';
$string['id'] = 'المعرف';
$string['title'] = 'عنوان الموضوع';
$string['status'] = 'حالة التذكرة';
$string['department'] = 'القسم';
$string['category_title'] = 'القسم';
$string['category'] = 'القسم';
$string['ip_address'] = 'عنوان IP';
$string['created_by'] = 'بواسطة';

// Stats & General.
$string['all_tickets_stats'] = 'نظرة عامة على جميع التذاكر';
$string['my_tickets_label'] = 'قائمة التذاكر الخاصة بي';
$string['total'] = 'الإجمالي';
$string['no_tickets_desc'] = 'لم تقم بإنشاء أي تذاكر حتى الآن.';
$string['all_rights_reserved'] = 'جميع الحقوق محفوظة لـ';
$string['sorry_no_ticket'] = 'عذراً، لا توجد تذاكر حالياً';
$string['nopermission'] = 'دخول غير مصرح به';
$string['nopermission_desc'] = 'عذراً، لا تملك الصلاحية لعرض هذه التذكرة.';
$string['email_confirm_subject'] = '✔ [تذكرة رقم #{$a->id}] تم استلام طلبك: {$a->title}';
$string['email_confirm_body_plain'] = '
مرحباً {$a->firstname}،
لقد استلمنا تذكرتك رقم #{$a->id} بخصوص "{$a->title}".
الحالة الحالية: {$a->status}
يمكنك متابعة التذكرة من هنا:
{$a->url}
تحياتنا،
فريق دعم {$a->site}
';
$string['email_confirm_body'] = '
<div dir="rtl" style="background-color: #f3f4f6; padding: 40px 0; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; color: #374151; text-align: right;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
        <div style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); padding: 32px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 800;">تم استلام التذكرة!</h1>
            <p style="color: #e0e7ff; margin: 8px 0 0 0; font-size: 15px;">نحن نراجع طلبك الآن</p>
        </div>
        <div style="padding: 40px 30px;">
            <p style="font-size: 16px; margin-bottom: 24px; color: #111827;">مرحباً <strong>{$a->firstname}</strong>،</p>
            <p style="line-height: 1.6; color: #4b5563; margin-bottom: 30px;">
                شكراً لتواصلك معنا. تم فتح تذكرة دعم جديدة بنجاح. سيقوم فريقنا بمراجعة التفاصيل والرد عليك في أقرب وقت ممكن.
            </p>
            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin-bottom: 32px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; color: #6b7280; font-size: 12px; font-weight: 700;">رقم التذكرة</td>
                        <td style="padding: 8px 0; color: #111827; font-weight: 700; text-align: left;">#{$a->id}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; font-weight: 700;">الموضوع</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: left; font-weight: 600;">{$a->title}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; font-weight: 700;">القسم</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: left;">{$a->category}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 0; color: #6b7280; font-size: 12px; font-weight: 700;">الحالة</td>
                        <td style="padding: 12px 0 0; text-align: left;">
                            <span style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: 800;">{$a->status}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center;">
                <a href="{$a->url}" style="display: inline-block; background: linear-gradient(to left, #4f46e5, #3b82f6); color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-weight: 700; font-size: 16px;">
                    عرض تفاصيل التذكرة
                </a>
            </div>
        </div>
        <div style="background-color: #f9fafb; padding: 24px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="color: #9ca3af; font-size: 12px; margin: 0;">
                هذه رسالة تلقائية، يرجى عدم الرد عليها مباشرة.
            </p>
        </div>
    </div>
</div>';
$string['view_ticket'] = 'عرض التذكرة';
$string['admin_alert_subject'] = '🚨 عاجل: تذكرة جديدة رقم #{$a->id} - {$a->title}';
$string['admin_alert_body'] = '
<div dir="rtl" style="padding: 15px; border-right: 5px solid #ef4444; background-color: #fef2f2; text-align: right;">
    <h3 style="margin-top:0; color: #b91c1c;">🚨 تم استلام تذكرة عاجلة</h3>
    <p><strong>الطالب:</strong> {$a->firstname}</p>
    <p><strong>العنوان:</strong> {$a->title}</p>
    <p><strong>القسم:</strong> {$a->category}</p>
    <hr style="border:0; border-top:1px solid #fee2e2; margin: 10px 0;">
    <a href="{$a->url}" style="background-color: #dc2626; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">
        عرض التذكرة الآن
    </a>
</div>
';
$string['header_subtitle'] = 'نحن هنا لمساعدتك ودعمك اليوم 🌟';
$string['current_year_label'] = 'السنة الحالية';
$string['live_stats_heading'] = 'لوحة الإحصائيات الحية';
$string['total_tickets_label'] = 'إجمالي التذاكر';
$string['closed_label'] = 'مغلقة';
$string['open_label'] = 'مفتوحة';
$string['my_tickets_desc'] = 'تتبع وإدارة جميع طلبات الدعم الخاصة بك';
$string['search_placeholder'] = 'بحث برقم التذكرة أو الموضوع...';
$string['no_tickets_title'] = 'لا توجد تذاكر حالياً';
$string['no_tickets_message'] = 'لم تقم بتقديم أي تذاكر دعم حتى الآن. هل تحتاج للمساعدة؟ ابدأ تذكرة جديدة وسيقوم فريقنا بالمتابعة.';
$string['start_new_ticket_btn'] = 'أنشئ تذكرتك الأولى';
$string['copyright_label'] = 'جميع الحقوق محفوظة';
$string['attention_required'] = 'تنبيه هام';
$string['cancel'] = 'إلغاء';
$string['enable'] = 'تفعيل النظام';
$string['enable_desc'] = 'عند التفعيل، سيتمكن المستخدمون من إنشاء وعرض التذاكر.';
$string['support_email'] = 'البريد الإلكتروني للدعم';
$string['support_email_desc'] = 'عنوان البريد الإلكتروني الذي يظهر للمستخدمين للتواصل المباشر أو الإشعارات.';
$string['default_email_placeholder'] = 'noreply@yourmoodlesite.com';
$string['internal_notes_heading'] = 'ملاحظات الفريق الداخلية';
$string['no_internal_notes'] = 'لا توجد ملاحظات داخلية بعد.';
$string['internal_note_placeholder'] = 'اترك ملاحظة لزملائك...';
$string['academic_ticket_system:addcategory'] = 'صلاحية إضافة أقسام جديدة';
$string['academic_ticket_system:download'] = 'صلاحية تحميل مرفقات التذاكر';
$string['academic_ticket_system:manageticket'] = 'صلاحية إدارة وتعيين كافة التذاكر (للإدارة)';
$string['academic_ticket_system:addticket'] = 'صلاحية إنشاء تذاكر جديدة (للطلاب)';
$string['academic_ticket_system:viewticket'] = 'صلاحية عرض تفاصيل التذاكر';
$string['my_summary_heading'] = 'ملخص نشاطك';
$string['awaiting_me_label'] = 'بانتظار ردك';
$string['under_review_label'] = 'تحت المراجعة';
$string['resolved_label'] = 'تذاكر تم حلها';
$string['action_needed_hint'] = 'يرجى الرد لتجنب الإغلاق التلقائي';
$string['we_are_working_hint'] = 'فريقنا يعمل على طلبك الآن';
$string['happy_to_help_hint'] = 'سعداء بمساعدتك دائماً!';
$string['quick_tip_label'] = 'نصيحة سريعة';
$string['student_dashboard_tip'] = 'يرجى الرد على استفسارات الموظفين خلال 12 ساعة، حيث يتم إغلاق التذاكر غير النشطة تلقائياً لضمان دعم أسرع للجميع.';
$string['academic_ticket_system:viewownoverviews'] = 'عرض لوحة النشاط الخاصة';
$string['my_summary_heading'] = 'نظرة عامة على نشاطي';
$string['awaiting_me_label'] = 'بانتظار إجراء مني';
$string['under_review_label'] = 'قيد المراجعة';
$string['resolved_label'] = 'تم الحل';
$string['action_needed_hint'] = 'قام الموظفون بالرد، يرجى الاستجابة.';
$string['we_are_working_hint'] = 'نحن نراجع طلبك حالياً.';
$string['happy_to_help_hint'] = 'تم حل مشكلتك بنجاح.';
$string['quick_tip_label'] = 'نصيحة سريعة';
$string['student_dashboard_tip'] = 'لضمان الدعم الأسرع، يرجى الرد خلال 12 ساعة. التذاكر التي لا يوجد بها نشاط لمدة 12 ساعة تُغلق تلقائياً.';
$string['ticket_priority_label'] = 'أولوية التذكرة';
$string['select_priority_hint'] = 'اختر مستوى الأولوية';
$string['priority'] = 'الأولوية';
$string['priority_low'] = 'منخفضة';
$string['priority_medium'] = 'متوسطة';
$string['priority_high'] = 'عالية';
$string['priority_urgent'] = 'عاجلة';
$string['messageprovider:ticket_confirmation'] = 'تأكيد تقديم التذكرة';
$string['messageprovider:admin_urgent_alert'] = 'تنبيه الإدارة: إشعار تذكرة عاجلة';
$string['showing'] = 'عرض';
$string['to'] = 'إلى';
$string['of'] = 'من أصل';
$string['tickets_count'] = 'تذاكر';
$string['previous'] = 'السابق';
$string['next'] = 'التالي';
$string['filesselected'] = 'تم اختيار {$a} ملفات';
$string['sending'] = 'جاري الإرسال...';
$string['drag_drop_hint'] = 'اسحب الملفات هنا أو انقر للرفع';
$string['record_voice_note'] = 'ملاحظة صوتية (إمكانية الوصول)';
$string['click_to_record'] = 'انقر على الميكروفون لبدء التسجيل';
$string['recording_now'] = 'جاري التسجيل... انقر إيقاف عند الانتهاء';
$string['recording_finished'] = 'تم تسجيل الملاحظة الصوتية بنجاح';
$string['tooltip_title_hint'] = 'اكتب عنواناً واضحاً ومختصراً لمشكلتك';
$string['tooltip_voice_hint'] = 'مثالي للمشاكل المعقدة - دقيقتان كحد أقصى';
$string['tooltip_upload_hint'] = 'ارفع لقطات شاشة أو ملفات سجل (الأقصى 5 ميجا)';
$string['start_recording'] = 'بدء التسجيل الصوتي';
$string['stop_recording'] = 'إيقاف التسجيل الصوتي';
$string['tooltip_category_hint'] = 'اختر القسم المسؤول عن معالجة هذه المشكلة';
$string['tooltip_priority_hint'] = 'حدد مدى استعجال طلبك';
$string['tooltip_desc_hint'] = 'قدم تفاصيل كاملة (خطوات التكرار، الأخطاء، إلخ)';
$string['status_open'] = 'مفتوحة';
$string['status_pending'] = 'قيد الانتظار';
$string['status_resolved'] = 'تم الحل';
$string['status_closed'] = 'مغلقة';
$string['status_adminreply'] = 'رد الإدارة';
$string['status_studentreply'] = 'رد الطالب';
$string['log_status_changed_from_to'] = 'قام {$a->user} بتغيير الحالة من "{$a->old}" إلى "{$a->new}"';
$string['log_replied'] = 'أضاف رداً جديداً';
$string['log_assigned'] = 'تم تعيين التذكرة إلى: {$a}';
$string['log_category_changed'] = 'تم تغيير القسم إلى: {$a}';
$string['log_internal_note_added'] = 'أضاف ملاحظة داخلية';
$string['log_feedback_submitted'] = 'تم تقديم تقييم: {$a} نجوم';
$string['ticket_title_help'] = 'أدخل عنواناً موجزاً ووصفياً لطلب الدعم الخاص بك.';
