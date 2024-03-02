const memberRows = document.querySelectorAll('.member-table-row');

memberRows.forEach((row) => {
    row.addEventListener("dblclick", () => {
        window.location.href = row.getAttribute('data-href');
    });
})