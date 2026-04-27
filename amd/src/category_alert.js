export const init = (alertData) => {
    if (!alertData || !window.Swal) {
        return;
    }

    window.Swal.fire({
        title: alertData.title,
        text: alertData.message,
        icon: alertData.type,
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed && alertData.redirect) {
            window.location.href = alertData.redirect;
        }
    });
};