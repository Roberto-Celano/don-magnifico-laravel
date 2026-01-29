import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import './navbar';
import './effects';
import './lightbox';
import './cookie-banner';

const backToTop = document.getElementById('back-to-top');

if (backToTop) {
    const toggleBackToTop = () => {
        backToTop.classList.toggle('is-visible', window.scrollY > 200);
    };

    toggleBackToTop();
    window.addEventListener('scroll', toggleBackToTop, { passive: true });

    backToTop.addEventListener('click', (event) => {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

const yearLabel = document.getElementById('currentYear');
if (yearLabel) {
    yearLabel.textContent = new Date().getFullYear();
}

if ('loading' in HTMLImageElement.prototype) {
    document.querySelectorAll('img.lazyload').forEach((img) => {
        img.src = img.dataset.src;
    });
} else {
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js';
    document.body.appendChild(script);
}
