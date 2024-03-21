const memberRows = document.querySelectorAll('.member-table-row');
const deleteMemberLinks = document.querySelectorAll(".delete-form");

memberRows.forEach((row) => {
    row.addEventListener("dblclick", () => {
        window.location.href = row.getAttribute('data-href');
    });
})

deleteMemberLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        const confirmDelete = confirm(`Are you sure you want to delete member?`);
        if (!confirmDelete) {
            e.preventDefault();
        }
    })
});