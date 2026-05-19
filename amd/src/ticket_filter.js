export const init = () => {
    const input = document.getElementById('ticketSearch');
    const table = document.getElementById('ticketsTable');

    if (input && table) {
        input.addEventListener('keyup', (event) => {
            const filter = event.target.value.toUpperCase();
            const tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                const tdId = tr[i].getElementsByTagName('td')[0];
                const tdTitle = tr[i].getElementsByTagName('td')[1];

                if (tdId || tdTitle) {
                    const txtValueId = tdId ? tdId.textContent || tdId.innerText : '';
                    const txtValueTitle = tdTitle ? tdTitle.textContent || tdTitle.innerText : '';

                    if (txtValueId.toUpperCase().indexOf(filter) > -1 || txtValueTitle.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        });
    }
};