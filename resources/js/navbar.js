import { Collapse } from 'bootstrap';

const navbar = document.querySelector('.dm-navbar');

if (navbar) {
    const updateScrollState = () => {
        navbar.classList.toggle('is-scrolled', window.scrollY > 8);
    };

    updateScrollState();
    window.addEventListener('scroll', updateScrollState, { passive: true });
}

const collapseElement = document.getElementById('navbarNav');

if (collapseElement) {
    const collapse = Collapse.getOrCreateInstance(collapseElement, { toggle: false });

    collapseElement.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            if (collapseElement.classList.contains('show')) {
                collapse.hide();
            }
        });
    });
}
