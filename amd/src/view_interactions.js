export const init = () => {
    const fileInput = document.getElementById('reply_file_input');
    if (fileInput) {
        fileInput.addEventListener('change', (event) => {
            const fileNameDisplay = document.getElementById('file_name_display');
            if (fileNameDisplay) {
                if (event.target.files.length > 0) {
                    fileNameDisplay.textContent = Array.from(event.target.files).map(f => f.name).join(', ');
                } else {
                    fileNameDisplay.textContent = '';
                }
            }
        });
    }
};