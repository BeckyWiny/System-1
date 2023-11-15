// Add event listener to menu toggle checkbox
document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    menuToggle.addEventListener('change', function() {
        var menuItems = document.querySelector('.menu-items');
        if (menuToggle.checked) {
            menuItems.classList.add('open');
        } else {
            menuItems.classList.remove('open');
        }
    });
});
