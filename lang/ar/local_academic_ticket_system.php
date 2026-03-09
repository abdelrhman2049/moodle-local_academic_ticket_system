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

$string['pluginname'] = 'نظام التذاكر الأكاديمية';
$string['ticketsystem'] = 'نظام التذاكر';

$string['actions'] = 'الإجراءات';
$string['add_ticket'] = 'إضافة تذكرة جديدة';
$string['create_ticket'] = 'إنشاء تذكرة';
$string['return_home'] = 'العودة للقائمة';
$string['viewticket'] = 'عرض التذكرة';
$string['submit'] = 'إرسال';
$string['success'] = 'تم بنجاح!';
$string['error'] = 'خطأ!';
$string['department_created'] = 'تم انشاء القسم بنجاح';

$string['ticket_title_label'] = 'عنوان التذكرة';
$string['ticket_description_label'] = 'وصف المشكلة';
$string['ticket_department_label'] = 'القسم';
$string['user_name_label'] = 'تم التقديم بواسطة';
$string['click_to_upload'] = 'انقر هنا لاختيار الملفات من جهازك';
$string['attach_files_optional'] = 'المرفقات (اختياري)';
$string['welcome_message'] = 'مرحباً بك في نظام الدعم الأكاديمي';

$string['status_open'] = 'مفتوحة';
$string['status_closed'] = 'مغلقة';
$string['status_in_progress'] = 'قيد التنفيذ';
$string['status_urgent'] = 'عاجلة';
$string['status_admin_reply'] = 'رد الإدارة';
$string['status_student_reply'] = 'رد الطالب';

$string['admin_only_label'] = 'إعدادات خاصة بالإدارة';
$string['change_status_label'] = 'تحديث الحالة';
$string['update_status_button'] = 'حفظ التغييرات';
$string['change_category_label'] = 'تغيير القسم';
$string['update_category_button'] = 'تحديث القسم';
$string['assign_user_label'] = 'تعيين لموظف مختص';
$string['assigned_user'] = 'تم التعيين لـ';
$string['unassigned'] = 'غير معين';
$string['status_assigned'] = 'تم التعيين لمختص';

$string['replies_heading'] = 'سجل المناقشة';
$string['no_replies_message'] = 'لا توجد ردود على هذه التذكرة حتى الآن.';
$string['no_replies_hint'] = 'كن أول من يضيف رداً أو استفساراً لنتمكن من مساعدتك.';
$string['add_reply_heading'] = 'اكتب ردك';
$string['send_reply_button'] = 'إرسال الرد والملفات';
$string['start_reply'] = 'ابدأ المحادثة أدناه!';
$string['write_your_reply'] = 'اكتب ردك...';

$string['ticket_log'] = 'سجل النشاطات';
$string['log_replied'] = 'قام {$a} بإضافة رد جديد.';
$string['log_status_changed'] = 'قام {$a->user} بتغيير الحالة من {$a->old} إلى {$a->new}.';
$string['log_assigned'] = 'تم تعيين التذكرة لموظف مختص.';
$string['log_category_changed'] = 'قام {$a->user} بنقل التذكرة من {$a->old} إلى {$a->new}.';

$string['ticket_details_heading'] = 'تفاصيل التذكرة';
$string['attachments_heading'] = 'المرفقات الأصلية';
$string['recent_tickets_heading'] = 'تذاكر الطالب السابقة';

$string['ticket_id_label'] = 'رقم مرجع التذكرة';
$string['created_at'] = 'تاريخ التقديم';
$string['ticket_status_label'] = 'الحالة الحالية';
$string['id'] = 'المعرف';
$string['title'] = 'عنوان الموضوع';
$string['status'] = 'حالة التذكرة';
$string['department'] = 'القسم';
$string['category_title'] = 'القسم';
$string['ip_address'] = 'عنوان IP';
$string['created_by'] = 'بواسطة';

$string['close_ticket_button'] = 'إنهاء وإغلاق التذكرة';
$string['assign_user'] = 'تعيين مختص';
$string['view'] = 'عرض التفاصيل';

$string['all_tickets'] = 'جميع التذاكر الأكاديمية';
$string['add_new_department'] = 'إضافة قسم جديد';

$string['email_confirm_subject'] = 'تم استلام تذكرتك بنجاح: {$a->title}';
$string['email_confirm_body'] = 'مرحباً {$a->firstname}، نشكرك على تواصلك معنا. لقد تم استلام تذكرتك بنجاح تحت رقم مرجعي #{$a->id}. سيقوم الفريق المختص بمراجعة طلبك والرد عليك.';
$string['messageprovider:ticket_confirmation'] = 'إشعارات تأكيد استلام التذاكر';
$string['email_confirm_intro'] = 'مرحباً {$a->firstname}، نشكرك على تواصلك معنا.';
$string['view_ticket_btn'] = 'عرض التذكرة الآن';
$string['email_confirm_footer_note'] = 'نظام التذاكر الأكاديمية - Learn-ix © 2026';
$string['email_confirm_body_plain'] = 'مرحباً {$a->firstname}، تم استلام تذكرتك رقم #{$a->id}. يمكنك عرضها هنا: {$a->url}';
$string['email_no_reply_note'] = 'هذه رسالة تلقائية، يرجى عدم الرد عليها مباشرة.';
$string['email_powered_by'] = 'بواسطة نظام تذاكر Learn-ix';

$string['form_instruction'] = 'يسعدنا مساعدتك، يرجى ملء النموذج أدناه وسيتم الرد عليك فوراً';
$string['title_placeholder'] = 'مثال: لا يمكنني الدخول للمقرر...';
$string['select_department_hint'] = '-- اختر القسم --';
$string['description_placeholder'] = 'يرجى شرح المشكلة بالتفصيل لمساعدتك بشكل أفضل...';
$string['drag_drop_hint'] = 'أو قم بسحب وإفلات الملفات هنا';
$string['nopermission'] = 'دخول غير مصرح به';
$string['nopermission_desc'] = 'عذراً، لا تملك الصلاحية لعرض هذه التذكرة.';
$string['back_to_home'] = 'العودة للرئيسية';
$string['sorry_no_ticket'] = 'عذراً، لا توجد تذاكر حالياً';
$string['all_tickets_stats'] = 'نظرة عامة على جميع التذاكر';
$string['my_tickets_label'] = 'قائمة التذاكر الخاصة بي';
$string['total'] = 'الإجمالي';
$string['assigned_to_label'] = 'الموظف المسؤول';
$string['no_tickets_desc'] = 'لم تقم بإنشاء أي تذاكر حتى الآن.';
$string['all_rights_reserved'] = 'جميع الحقوق محفوظة لـ';
$string['header_subtitle'] = 'نحن هنا لمساعدتك ودعمك اليوم 🌟';
$string['current_year_label'] = 'السنة الحالية';
$string['live_stats_heading'] = 'لوحة الإحصائيات الحية';
$string['total_tickets_label'] = 'إجمالي التذاكر';
$string['closed_label'] = 'مغلقة';
$string['open_label'] = 'مفتوحة';
$string['my_tickets_desc'] = 'قائمة بجميع التذاكر والمتابعات الخاصة بك';
$string['search_placeholder'] = 'بحث برقم التذكرة أو الموضوع...';
$string['no_tickets_title'] = 'لا توجد تذاكر حالياً';
$string['no_tickets_message'] = 'يبدو أن كل شيء هادئ هنا! إذا واجهت مشكلة، نحن هنا للمساعدة بضغطة زر.';
$string['start_new_ticket_btn'] = 'ابدأ تذكرة جديدة';
$string['copyright_label'] = 'جميع الحقوق محفوظة';
$string['attention_required'] = 'تنبيه هام';
$string['cancel'] = ' الغاء';
$string['enable'] = 'تفعيل النظام';
$string['enable_desc'] = 'عند التفعيل، سيتمكن المستخدمون من إنشاء وعرض التذاكر.';
$string['support_email'] = 'البريد الإلكتروني للدعم';
$string['support_email_desc'] = 'عنوان البريد الإلكتروني الذي سيظهر للمستخدمين للتواصل المباشر أو للإشعارات.';
$string['default_email_placeholder'] = 'noreply@yourmoodlesite.com';
$string['internal_notes_heading'] = 'ملاحظات الفريق الداخلية';
$string['no_internal_notes'] = 'لا توجد ملاحظات داخلية بعد.';
$string['internal_note_placeholder'] = 'اترك ملاحظة للزملاء...';
$string['new_reply_hint'] = 'يوجد رد جديد يحتاج انتباهك!';
$string['auto_close_heading'] = 'تنبيه: التذكرة ستغلق قريباً';
$string['auto_close_text'] = 'لقد قمنا بالرد على استفسارك. يرجى الرد خلال 12 ساعة، وإلا سيتم إغلاق التذكرة تلقائياً حفاظاً على جودة الخدمة.';
$string['academic_ticket_system:addcategory'] = 'صلاحية إضافة أقسام جديدة';
$string['academic_ticket_system:download'] = 'صلاحية تحميل مرفقات التذاكر';
$string['academic_ticket_system:manageticket'] = 'صلاحية إدارة وتعيين كافة التذاكر (للموظفين)';
$string['academic_ticket_system:addticket'] = 'صلاحية إنشاء تذاكر جديدة (للطلاب)';
$string['academic_ticket_system:viewticket'] = 'صلاحية عرض تفاصيل التذاكر';
$string['my_summary_heading'] = 'ملخص نشاطك';
$string['awaiting_me_label'] = 'بانتظار ردك';
$string['under_review_label'] = 'تحت المراجعة';
$string['resolved_label'] = 'تذاكر تم حلها';
$string['action_needed_hint'] = 'يرجى الرد لتجنب إغلاق التذكرة';
$string['we_are_working_hint'] = 'فريقنا يعمل على طلبك الآن';
$string['happy_to_help_hint'] = 'سعداء بمساعدتك دائماً';
$string['quick_tip_label'] = 'نصيحة سريعة';
$string['student_dashboard_tip'] = 'تذكر دائماً الرد على استفسارات الإدارة خلال 12 ساعة، حيث يتم إغلاق التذاكر غير النشطة تلقائياً للحفاظ على سرعة الدعم.';
$string['ticket_priority_label'] = 'أولوية التذكرة';
$string['select_priority_hint'] = 'اختر مستوى الأولوية';
$string['priority_low'] = 'منخفضة';
$string['priority_medium'] = 'متوسطة';
$string['priority_high'] = 'عالية';
$string['priority_urgent'] = 'عاجلة';
$string['internal_notes_heading'] = 'ملاحظات الفريق الداخلية';
$string['no_internal_notes'] = 'لا توجد ملاحظات داخلية حتى الآن.';
$string['internal_note_placeholder'] = 'اكتب ملاحظة لزملائك...';
$string['showing'] = 'عرض';
$string['to'] = 'إلى';
$string['of'] = 'من أصل';
$string['tickets_count'] = 'تذكرة';
$string['previous'] = 'السابق';
$string['next'] = 'التالي';
$string['filesselected'] = 'تم اختيار {$a} ملف/ملفات';
$string['sending'] = 'جاري الإرسال...';
$string['drag_drop_hint'] = 'اسحب الملفات هنا أو اضغط للاختيار';
$string['record_voice_note'] = 'ملاحظة صوتية (إمكانية الوصول)';
$string['click_to_record'] = 'اضغط على المايكروفون لبدء التسجيل';
$string['recording_now'] = 'جاري التسجيل... اضغط إيقاف عند الانتهاء';
$string['recording_finished'] = 'تم تسجيل الملاحظة الصوتية بنجاح';
$string['tooltip_title_hint'] = 'اكتب عنواناً واضحاً ومختصراً لمشكلتك';
$string['tooltip_voice_hint'] = 'مثالي لشرح المشاكل المعقدة - دقيقتان كحد أقصى';
$string['tooltip_upload_hint'] = 'ارفق صوراً للمشكلة أو ملفات سجلات (الأقصى 5 ميجا)';
$string['start_recording'] = 'بدء التسجيل الصوتي';
$string['stop_recording'] = 'إيقاف التسجيل الصوتي';
$string['tooltip_category_hint'] = 'اختر القسم المسؤول عن معالجة هذا النوع من المشاكل';
$string['tooltip_priority_hint'] = 'حدد مدى استعجال الطلب لترتيب الأولويات';
$string['tooltip_desc_hint'] = 'اكتب تفاصيل كاملة (خطوات المشكلة، رسائل الخطأ، إلخ)';
$string['status_open'] = 'مفتوحة';
$string['status_pending'] = 'قيد الانتظار';
$string['status_resolved'] = 'تم الحل';
$string['status_closed'] = 'مغلقة';
$string['status_adminreply'] = 'رد الإدارة';
$string['status_studentreply'] = 'رد الطالب';
$string['log_status_changed_from_to'] = 'قام {$a->user} بتغيير الحالة من "{$a->old}" إلى "{$a->new}"';
$string['log_replied'] = 'أضاف رداً جديداً';
$string['log_assigned'] = 'قام بتعيين التذكرة إلى: {$a}';
$string['log_category_changed'] = 'قام بتغيير القسم إلى: {$a}';
$string['log_internal_note_added'] = 'أضاف ملاحظة داخلية';
$string['log_feedback_submitted'] = 'قام بإرسال تقييم: {$a} نجوم';
