// Optional: Close dropdowns on click outside (for better UX)
document.addEventListener('click', function(event) {
    document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
        if (!menu.parentElement.contains(event.target)) {
            bootstrap.Dropdown.getInstance(menu.previousElementSibling)?.hide();
        }
    });
});