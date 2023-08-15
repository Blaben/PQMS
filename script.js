
// Get all menu items with submenu
const menuItems = document.querySelectorAll('.dash-menu-item');

// Add event listeners for hover and focus
menuItems.forEach(item => {
    item.addEventListener('mouseenter', showSubmenu);
    item.addEventListener('mouseleave', hideSubmenu);
    item.addEventListener('focusin', showSubmenu);
    item.addEventListener('focusout', hideSubmenu);
});

function showSubmenu(event) {
    const submenu = event.currentTarget.querySelector('.dash-submenu');
    if (submenu) {
        submenu.style.display = 'block';
    }
}

function hideSubmenu(event) {
    const submenu = event.currentTarget.querySelector('.dash-submenu');
    if (submenu) {
        submenu.style.display = 'none';
    }
}
