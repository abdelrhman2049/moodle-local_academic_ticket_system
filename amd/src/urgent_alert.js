import ajax from 'core/ajax';

const injectStyles = () => {
    if (document.getElementById('custom-urgent-toast-styles')) {
        return;
    }
    const style = document.createElement('style');
    style.id = 'custom-urgent-toast-styles';
    style.innerHTML = `
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
    `;
    document.head.appendChild(style);
};

const renderAlert = (data) => {
    if (document.getElementById('custom-urgent-toast')) {
        return;
    }

    try {
        const audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
        audio.volume = 0.5;
        audio.play().catch(() => {});
    } catch (e) {}

    const div = document.createElement('div');
    div.id = 'custom-urgent-toast';

    div.innerHTML = `
        <div class="toast-icon">🚨</div>
        <div class="toast-body">
            <b>Urgent Request!</b>
            <span>${data.user}: ${data.title}</span>
        </div>
    `;

    div.onclick = () => {
        let seen = JSON.parse(localStorage.getItem('seen_tickets') || '[]');
        if (!seen.includes(data.id)) {
            seen.push(data.id);
            localStorage.setItem('seen_tickets', JSON.stringify(seen));
        }
        document.body.removeChild(div);
        window.location.href = data.url;
    };
    
    document.body.appendChild(div);
};

export const init = () => {
    injectStyles();
    
    let lastCheck = Math.floor(Date.now() / 1000) - 3600;

    const checkUrgent = () => {
        const request = {
            methodname: 'local_academic_ticket_system_check_urgent',
            args: {
                lastcheck: lastCheck
            }
        };

        ajax.call([request])[0]
            .then((data) => {
                if (data.status === 'found') {
                    let seen = JSON.parse(localStorage.getItem('seen_tickets') || '[]');
                    if (!seen.includes(data.id)) {
                        renderAlert(data);
                    }
                }
            })
            .catch(() => {});
    };

    checkUrgent();
    setInterval(checkUrgent, 5000);
};