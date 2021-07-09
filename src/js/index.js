
const elementoId = document.getElementById('elemento-id');
const navId = document.getElementById('nav-id');


elementoId.addEventListener('click', toogleMenu);

document.body.addEventListener('click', () => {
});

function toogleMenu() {
    if(navId.classList.contains('toggle-menu-position-show')) {
        navId.classList.remove('toggle-menu-position-show');
        navId.classList.add('toggle-menu-position-hide');
    } else {
        navId.classList.add('toggle-menu-position-show');
        navId.classList.remove('toggle-menu-position-hide');
    }
}
