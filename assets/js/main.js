const memberRows = document.querySelectorAll('.member-table-row');
const deleteMemberLinks = document.querySelectorAll(".danger-btn");

memberRows.forEach((row) => {
    row.addEventListener("dblclick", () => {
        window.location.href = row.getAttribute('data-href');
    });
})

deleteMemberLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        const dataMemberId = link.getAttribute('data-member-id');
        if (window.confirm(`Are you sure you want to delete member with ID ${dataMemberId}?`)) {
            window.location.href = link.getAttribute('data-href');
        }
    })
});