console.log('Dropdown JS Loaded');

document.addEventListener('DOMContentLoaded', function () {
    const profileBtn = document.getElementById('profileBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');

    if (profileBtn && dropdownMenu) {
        profileBtn.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });

        window.addEventListener('click', function (event) {
            if (!dropdownMenu.contains(event.target) && event.target !== profileBtn) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});
