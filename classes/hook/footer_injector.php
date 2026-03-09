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
 * Footer injector hook listener.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_academic_ticket_system\hook;

/**
 * Class footer_injector for injecting urgent alerts.
 *
 * @package    local_academic_ticket_system
 * @copyright  2026 learn-ix support@learn-ix.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class footer_injector {

    /**
     * Adds urgent alert HTML to the footer.
     *
     * @param \core\hook\output\before_footer_html_generation $hook
     * @return void
     */
    public static function add_urgent_alert(\core\hook\output\before_footer_html_generation $hook): void {
        global $CFG, $USER;

        if (!is_siteadmin()) {
            return;
        }

        $ajaxurl = $CFG->wwwroot . '/local/academic_ticket_system/ajax/check_urgent.php';

        $content = "
        <style>
            #custom-urgent-toast {
                position: fixed;
                top: 85px;
                right: 25px;
                background: linear-gradient(135deg, #e11d48 0%, #9f1239 100%);
                color: white;
                padding: 16px 24px;
                z-index: 9999999;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.3), 0 0 15px rgba(225, 29, 72, 0.4);
                cursor: pointer;
                min-width: 300px;
                max-width: 400px;
                font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
                border: 1px solid rgba(255, 255, 255, 0.2);
                display: flex;
                align-items: center;
                gap: 15px;
                animation: slideInCustom 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
                          pulseUrgent 2s infinite;
            }

            #custom-urgent-toast:hover {
                transform: scale(1.02);
                background: linear-gradient(135deg, #f43f5e 0%, #be123c 100%);
            }

            .toast-icon {
                font-size: 28px;
                background: rgba(255, 255, 255, 0.2);
                width: 45px;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
            }

            .toast-body b {
                display: block;
                font-size: 15px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .toast-body span {
                font-size: 13px;
                opacity: 0.9;
            }

            @keyframes slideInCustom {
                from { right: -500px; opacity: 0; }
                to { right: 25px; opacity: 1; }
            }

            @keyframes pulseUrgent {
                0% { box-shadow: 0 0 0 0 rgba(225, 29, 72, 0.5); }
                70% { box-shadow: 0 0 0 15px rgba(225, 29, 72, 0); }
                100% { box-shadow: 0 0 0 0 rgba(225, 29, 72, 0); }
            }
        </style>

        <script>
        (function() {
            let lastCheck = Math.floor(Date.now() / 1000) - 3600;

            function check() {
                fetch('{$ajaxurl}?lastcheck=' + lastCheck)
                .then(r => r.json())
                .then(data => {
                    if (data.status === 'found') {
                        let seen = JSON.parse(localStorage.getItem('seen_tickets') || '[]');
                        if (!seen.includes(data.id)) {
                            render(data);
                        }
                    }
                });
            }

            function render(data) {
                if (document.getElementById('custom-urgent-toast')) return;

                try {
                    const audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
                    audio.volume = 0.5;
                    audio.play();
                } catch (e) {
                    console.log('Autoplay blocked');
                }

                let div = document.createElement('div');
                div.id = 'custom-urgent-toast';

                div.innerHTML = `
                    <div class=\"toast-icon\">🚨</div>
                    <div class=\"toast-body\">
                        <b>Urgent Request!</b>
                        <span>\${data.user}: \${data.title}</span>
                    </div>
                `;

                div.onclick = function() {
                    let seen = JSON.parse(localStorage.getItem('seen_tickets') || '[]');
                    seen.push(data.id);
                    localStorage.setItem('seen_tickets', JSON.stringify(seen));
                    window.location.href = data.url;
                };
                document.body.appendChild(div);
            }

            setInterval(check, 5000);
            check();
        })();
        </script>
        ";

        $hook->add_html($content);
    }
}
