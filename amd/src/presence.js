define(['core/ajax'], function(ajax) {
    var renderViewers = function(viewers) {
        var container = document.getElementById('presence-list');
        var wrapper = document.getElementById('presence-container');
        
        if (!container || !wrapper) {
            return;
        }

        if (viewers.length > 0) {
            wrapper.classList.remove('hidden');
            wrapper.style.display = 'block';
            container.innerHTML = ''; 
            
            viewers.forEach(function(viewer) {
                var div = document.createElement('div');
                div.className = 'presence-user';
                
                if (viewer.is_owner) {
                    div.classList.add('is-owner');
                    div.title = viewer.fullname + ' (Student)';
                } else {
                    div.title = viewer.fullname;
                }
                
                div.innerHTML = viewer.avatar;
                container.appendChild(div);
            });
        } else {
            wrapper.classList.add('hidden');
            wrapper.style.display = 'none';
        }
    };

    return {
        initHeartbeat: function(ticketId) {
            var sendPing = function() {
                var request = {
                    methodname: 'local_academic_ticket_system_update_presence',
                    args: {
                        ticketid: ticketId
                    }
                };
                
                ajax.call([request])[0].then(function(response) {
                    if (response.status === 'success') {
                        renderViewers(response.viewers);
                    }
                }).catch(function() {
                });
            };

            sendPing(); 
            setInterval(sendPing, 5000); 
        }
    };
});