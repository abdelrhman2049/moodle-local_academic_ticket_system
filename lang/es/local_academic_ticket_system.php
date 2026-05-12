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
 * Spanish (International) strings for local_academic_ticket_system.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin Info.
$string['pluginname'] = 'Sistema de Tickets Académicos';
$string['ticketsystem'] = 'Sistema de Tickets';

// General Actions.
$string['actions'] = 'Acciones';
$string['add_ticket'] = 'Agregar Nuevo Ticket';
$string['create_ticket'] = 'Crear Ticket';
$string['return_home'] = 'Volver al Listado';
$string['viewticket'] = 'Ver Ticket';
$string['submit'] = 'Enviar';
$string['success'] = '¡Éxito!';
$string['error'] = '¡Error!';
$string['reopen_ticket_button'] = 'Reabrir Ticket';
$string['back_to_home'] = 'Volver al Inicio';
$string['view'] = 'Ver Detalles';
$string['department_created'] = 'Departamento Creado Exitosamente';
$string['creation_failed'] = 'La creación de la categoría falló. Por favor, inténtelo de nuevo.';

// Form Fields & UI Elements.
$string['ticket_title'] = 'Título del Ticket';
$string['ticket_title_label'] = 'Título del Ticket';
$string['ticket_description_label'] = 'Descripción del Problema';
$string['description'] = 'Descripción';
$string['ticket_department_label'] = 'Departamento';
$string['user_name_label'] = 'Enviado Por';
$string['click_to_upload'] = 'Haga clic aquí para seleccionar archivos de su dispositivo';
$string['attach_files_optional'] = 'Archivos Adjuntos (Opcional)';
$string['attachments'] = 'Archivos Adjuntos';
$string['send_ticket'] = 'Enviar Ticket';
$string['welcome_message'] = 'Bienvenido al Sistema de Soporte Académico';
$string['form_instruction'] = 'Estamos encantados de ayudarle; por favor complete el siguiente formulario.';
$string['title_placeholder'] = 'Ej.: No puedo acceder al curso...';
$string['select_department_hint'] = '-- Seleccionar Departamento --';
$string['description_placeholder'] = 'Por favor, explique el problema en detalle...';
$string['drag_drop_hint'] = 'Arrastre y suelte archivos aquí o haga clic para cargar';
$string['department_updated'] = 'Departamento Actualizado Exitosamente';
$string['department_deleted'] = 'Departamento Eliminado Exitosamente';
$string['add_to_navbar'] = 'Agregar a la Barra de Navegación';
$string['add_to_navbar_desc'] = 'Si está habilitado, se añadirá un enlace al sistema de tickets en el menú de navegación principal.';
$string['primary_color'] = 'Color Principal';
$string['primary_color_desc'] = 'El color principal utilizado para botones, encabezados y la identidad visual primaria.';
$string['secondary_color'] = 'Color Secundario';
$string['secondary_color_desc'] = 'Utilizado para degradados, acentos y elementos secundarios de la interfaz.';
$string['system_name'] = 'Nombre del Primer Departamento';
$string['system_name_desc'] = 'Este es el nombre predeterminado para el primer departamento. Puede renombrarlo o gestionar otros departamentos más tarde haciendo clic en la sección "Departamentos".';

// Statuses.
$string['status_open'] = 'Abierto';
$string['status_closed'] = 'Cerrado';
$string['status_in_progress'] = 'En Progreso';
$string['status_urgent'] = 'Urgente';
$string['status_admin_reply'] = 'Respuesta del Administrador';
$string['status_student_reply'] = 'Respuesta del Estudiante';
$string['status_assigned'] = 'Asignado a un Especialista';
$string['status_pending'] = 'Pendiente';
$string['status_resolved'] = 'Resuelto';
$string['status_adminreply'] = 'Respuesta del Administrador';
$string['status_studentreply'] = 'Respuesta del Estudiante';

// Admin & Assignments.
$string['admin_only_label'] = 'Controles Administrativos';
$string['change_status_label'] = 'Actualizar Estado';
$string['update_status_button'] = 'Guardar Cambios';
$string['change_category_label'] = 'Cambiar Departamento';
$string['update_category_button'] = 'Actualizar Departamento';
$string['assign_user_label'] = 'Asignar a un Especialista';
$string['assigned_user'] = 'Asignado A';
$string['unassigned'] = 'Sin Asignar';
$string['assign_user'] = 'Asignar Especialista';
$string['assigned_to_label'] = 'Asignado A';
$string['assigned_to'] = 'Especialista Asignado';

// Replies & History.
$string['replies_heading'] = 'Historial de Conversación';
$string['no_replies_message'] = 'Aún no se han encontrado respuestas para este ticket.';
$string['no_replies_hint'] = 'Sea el primero en agregar una respuesta o consulta.';
$string['add_reply_heading'] = 'Escriba su Respuesta';
$string['send_reply_button'] = 'Enviar Respuesta y Archivos';
$string['start_reply'] = '¡Inicie la conversación a continuación!';
$string['write_your_reply'] = 'Escriba su respuesta....';

// Activity Logs.
$string['ticket_log'] = 'Línea de Tiempo de Actividad';
$string['log_replied'] = '{$a} agregó una nueva respuesta.';
$string['log_status_changed'] = '{$a->user} cambió el estado de {$a->old} a {$a->new}.';
$string['log_assigned'] = 'Ticket asignado a un especialista.';
$string['log_category_changed'] = '{$a->user} movió el ticket de {$a->old} a {$a->new}.';
$string['log_status_changed_from_to'] = '{$a->user} cambió el estado de "{$a->old}" a "{$a->new}"';
$string['log_internal_note_added'] = 'Se agregó una nota interna';
$string['log_feedback_submitted'] = 'Comentario enviado con calificación: {$a} estrellas';

// Headings & Labels.
$string['ticket_details_heading'] = 'Detalles del Ticket';
$string['attachments_heading'] = 'Archivos Adjuntos Originales';
$string['recent_tickets_heading'] = 'Últimos Tickets de Estudiantes';
$string['ticket_id_label'] = 'ID de Referencia del Ticket';
$string['created_at'] = 'Fecha de Creación';
$string['ticket_status_label'] = 'Estado Actual';
$string['all_tickets'] = 'Todos los Tickets Académicos';
$string['add_new_department'] = 'Agregar Nuevo Departamento';
$string['add_department'] = 'Departamentos';
$string['id'] = 'ID';
$string['title'] = 'Título del Asunto';
$string['status'] = 'Estado del Ticket';
$string['department'] = 'Departamento';
$string['category_title'] = 'Departamento';
$string['category'] = 'Categoría';
$string['ip_address'] = 'Dirección IP';
$string['created_by'] = 'Creado Por';

// Stats & General.
$string['all_tickets_stats'] = 'Resumen Global de Tickets';
$string['my_tickets_label'] = 'Mis Tickets Enviados';
$string['total'] = 'Total';
$string['no_tickets_desc'] = 'Aún no ha creado ningún ticket.';
$string['all_rights_reserved'] = 'Todos los derechos reservados a';
$string['sorry_no_ticket'] = 'No se Encontraron Tickets';
$string['nopermission'] = 'Acceso Denegado';
$string['nopermission_desc'] = 'Lo sentimos, no tiene permiso para ver este ticket.';
$string['email_confirm_subject'] = '✔ [Ticket #{$a->id}] Recibimos su solicitud: {$a->title}';
$string['email_confirm_body_plain'] = '
Hola {$a->firstname},
Recibimos su ticket #{$a->id} relacionado con "{$a->title}".
Estado Actual: {$a->status}
Puede hacer seguimiento de su ticket aquí:
{$a->url}
Saludos,
Equipo de Soporte de {$a->site}
';
$string['email_confirm_body'] = '
<div style="background-color: #f3f4f6; padding: 40px 0; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; color: #374151;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
        <div style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); padding: 32px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px;">¡Ticket Recibido!</h1>
            <p style="color: #e0e7ff; margin: 8px 0 0 0; font-size: 15px; font-weight: 500;">Estamos revisando su solicitud</p>
        </div>
        <div style="padding: 40px 30px;">
            <p style="font-size: 16px; margin-bottom: 24px; color: #111827;">Hola <strong>{$a->firstname}</strong>,</p>
            <p style="line-height: 1.6; color: #4b5563; margin-bottom: 30px;">
                Gracias por contactarnos. Se ha abierto exitosamente un nuevo ticket de soporte. Nuestro equipo revisará los detalles y le responderá a la brevedad.
            </p>
            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin-bottom: 32px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">ID del Ticket</td>
                        <td style="padding: 8px 0; color: #111827; font-weight: 700; text-align: right; font-family: monospace; font-size: 14px;">#{$a->id}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Asunto</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right; font-weight: 600;">{$a->title}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Categoría</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right;">{$a->category}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 8px; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Fecha</td>
                        <td style="padding: 12px 0 8px; color: #111827; text-align: right;">{$a->date}</td>
                    </tr>
                    <tr style="border-top: 1px dashed #e5e7eb;">
                        <td style="padding: 12px 0 0; color: #6b7280; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">Estado</td>
                        <td style="padding: 12px 0 0; text-align: right;">
                            <span style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: 800; text-transform: uppercase;">{$a->status}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center;">
                <a href="{$a->url}" style="display: inline-block; background: linear-gradient(to right, #4f46e5, #3b82f6); color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-weight: 700; font-size: 16px; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4); transition: all 0.3s ease;">
                    Ver Detalles del Ticket
                </a>
            </div>
            <p style="text-align: center; font-size: 12px; color: #9ca3af; margin-top: 24px;">
                También puede copiar este enlace: <br>
                <a href="{$a->url}" style="color: #6b7280; text-decoration: none;">{$a->url}</a>
            </p>
        </div>
        <div style="background-color: #f9fafb; padding: 24px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="color: #9ca3af; font-size: 12px; margin: 0 0 8px;">
                Este es un mensaje automático. Por favor, no responda directamente a este correo.
            </p>
            <p style="color: #d1d5db; font-size: 11px; margin: 0; font-weight: 600; text-transform: uppercase;">
                Desarrollado por el Sistema de Soporte de {$a->site}
            </p>
        </div>
    </div>
</div>';
$string['view_ticket'] = 'Ver Ticket';
$string['admin_alert_subject'] = '🚨 URGENTE: Nuevo Ticket #{$a->id} - {$a->title}';
$string['admin_alert_body'] = '
<div style="padding: 15px; border-left: 5px solid #ef4444; background-color: #fef2f2;">
    <h3 style="margin-top:0; color: #b91c1c;">🚨 Ticket Urgente Recibido</h3>
    <p><strong>Estudiante:</strong> {$a->firstname}</p>
    <p><strong>Título:</strong> {$a->title}</p>
    <p><strong>Categoría:</strong> {$a->category}</p>
    <hr style="border:0; border-top:1px solid #fee2e2; margin: 10px 0;">
    <a href="{$a->url}" style="background-color: #dc2626; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">
        Ver Ticket Ahora
    </a>
</div>
';
$string['header_subtitle'] = 'Estamos aquí para ayudarle hoy 🌟';
$string['current_year_label'] = 'Año Actual';
$string['live_stats_heading'] = 'Panel de Estadísticas en Vivo';
$string['total_tickets_label'] = 'Total de Tickets';
$string['closed_label'] = 'Cerrados';
$string['open_label'] = 'Abiertos';
$string['my_tickets_desc'] = 'Rastree y gestione todas sus solicitudes de soporte';
$string['search_placeholder'] = 'Buscar por ID o Asunto...';
$string['no_tickets_title'] = 'No se encontraron tickets';
$string['no_tickets_message'] = 'Aún no ha enviado ningún ticket de soporte.
¿Necesita ayuda? Cree un nuevo ticket y nuestro equipo se encargará del resto.';
$string['start_new_ticket_btn'] = 'Crear su Primer Ticket';
$string['copyright_label'] = 'Todos los derechos reservados';
$string['attention_required'] = 'Se Requiere Atención';
$string['cancel'] = 'Cancelar';
$string['enable'] = 'Habilitar Sistema';
$string['enable_desc'] = 'Si está habilitado, los usuarios pueden crear y ver tickets.';
$string['support_email'] = 'Correo de Soporte';
$string['support_email_desc'] = 'La dirección de correo electrónico que se muestra a los usuarios para contacto directo o notificaciones.';
$string['default_email_placeholder'] = 'noreply@sumoodlesite.com';
$string['internal_notes_heading'] = 'Notas Internas del Equipo';
$string['no_internal_notes'] = 'Aún no hay notas internas.';
$string['internal_note_placeholder'] = 'Deje una nota para sus colegas...';
$string['academic_ticket_system:addcategory'] = 'Permiso para agregar nuevas categorías';
$string['academic_ticket_system:download'] = 'Permiso para descargar archivos adjuntos de tickets';
$string['academic_ticket_system:manageticket'] = 'Permiso para gestionar/asignar todos los tickets (Administrador/Personal)';
$string['academic_ticket_system:addticket'] = 'Permiso para crear nuevos tickets (Estudiante)';
$string['academic_ticket_system:viewticket'] = 'Permiso para ver los detalles del ticket';
$string['my_summary_heading'] = 'Mi Resumen de Actividad';
$string['awaiting_me_label'] = 'Esperando mi Acción';
$string['under_review_label'] = 'En Revisión';
$string['resolved_label'] = 'Resueltos';
$string['action_needed_hint'] = 'El personal ha respondido. Por favor, responda.';
$string['we_are_working_hint'] = 'Actualmente estamos revisando su solicitud.';
$string['happy_to_help_hint'] = 'Su problema fue resuelto exitosamente.';
$string['quick_tip_label'] = 'Consejo Rápido';
$string['student_dashboard_tip'] = 'Para garantizar el soporte más rápido, por favor responda dentro de las 12 horas. Los tickets sin actividad durante 12 horas se cierran automáticamente.';
$string['academic_ticket_system:viewownoverviews'] = 'Ver el panel de actividad propio';
$string['ticket_priority_label'] = 'Prioridad del Ticket';
$string['select_priority_hint'] = 'Seleccione el nivel de prioridad';
$string['priority'] = 'Prioridad';
$string['priority_low'] = 'Baja';
$string['priority_medium'] = 'Media';
$string['priority_high'] = 'Alta';
$string['priority_urgent'] = 'Urgente';
$string['messageprovider:ticket_confirmation'] = 'Confirmación de envío de ticket';
$string['messageprovider:admin_urgent_alert'] = 'Alerta de administrador: Notificación de ticket urgente';
$string['showing'] = 'Mostrando';
$string['to'] = 'a';
$string['of'] = 'de';
$string['tickets_count'] = 'tickets';
$string['previous'] = 'Anterior';
$string['next'] = 'Siguiente';
$string['filesselected'] = '{$a} archivos seleccionados';
$string['sending'] = 'Enviando...';
$string['record_voice_note'] = 'Nota de Voz (Accesibilidad)';
$string['click_to_record'] = 'Haga clic en el micrófono para comenzar a grabar';
$string['recording_now'] = 'Grabando... haga clic en detener cuando termine';
$string['recording_finished'] = 'Nota de voz grabada exitosamente';
$string['tooltip_title_hint'] = 'Dé a su ticket un nombre claro y breve';
$string['tooltip_voice_hint'] = 'Ideal para problemas complejos - Máximo 2 minutos';
$string['tooltip_upload_hint'] = 'Cargue capturas de pantalla o registros (Máximo 5 MB)';
$string['start_recording'] = 'Iniciar grabación de voz';
$string['stop_recording'] = 'Detener grabación de voz';
$string['tooltip_category_hint'] = 'Seleccione el departamento que gestiona este problema';
$string['tooltip_priority_hint'] = 'Elija qué tan urgente es su solicitud';
$string['tooltip_desc_hint'] = 'Proporcione todos los detalles (pasos para reproducir, errores, etc.)';
$string['ticket_title_help'] = 'Ingrese un título breve y descriptivo para su solicitud de soporte.';
$string['privacy:metadata:tickets'] = 'Almacenamiento para tickets de soporte creados por usuarios.';
$string['privacy:metadata:tickets:userid'] = 'El ID del usuario que creó el ticket.';
$string['privacy:metadata:tickets:title'] = 'El título del ticket.';
$string['privacy:metadata:tickets:content'] = 'El contenido completo y la descripción del ticket.';
$string['privacy:metadata:tickets:created_at'] = 'La marca de tiempo de cuando se abrió el ticket.';
$string['privacy:metadata:presence'] = 'Almacenamiento temporal del estado de visualización en tiempo real.';
$string['privacy:metadata:presence:userid'] = 'El ID del usuario que está viendo actualmente un ticket.';
$string['privacy:metadata:presence:ticketid'] = 'El ID del ticket que se está visualizando.';
$string['privacy:metadata:presence:timemodified'] = 'La última vez que se actualizó la presencia del usuario.';
