const lightbox = document.getElementById('aboutLightbox');
const lightboxImage = lightbox?.querySelector('.about-lightbox-image');
const lightboxClose = lightbox?.querySelector('.about-lightbox-close');
const lightboxPrev = lightbox?.querySelector('.about-lightbox-prev');
const lightboxNext = lightbox?.querySelector('.about-lightbox-next');
const lightboxCounter = lightbox?.querySelector('.about-lightbox-counter');
const collageImages = Array.from(document.querySelectorAll('.about-collage-item'));

if (lightbox && lightboxImage && collageImages.length) {
    const originalOverflow = document.body.style.overflow;
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    const updateCounter = () => {
        if (lightboxCounter) {
            lightboxCounter.textContent = `${currentIndex + 1} / ${collageImages.length}`;
        }
    };

    const showImage = (index) => {
        const image = collageImages[index];
        if (!image) {
            return;
        }
        lightboxImage.src = image.src;
        lightboxImage.alt = image.alt || 'Immagine ingrandita';
        updateCounter();
    };

    const openLightbox = (index) => {
        currentIndex = index;
        showImage(currentIndex);
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImage.src = '';
        document.body.style.overflow = originalOverflow;
    };

    const goNext = () => {
        currentIndex = (currentIndex + 1) % collageImages.length;
        showImage(currentIndex);
    };

    const goPrev = () => {
        currentIndex = (currentIndex - 1 + collageImages.length) % collageImages.length;
        showImage(currentIndex);
    };

    collageImages.forEach((img, index) => {
        img.addEventListener('click', () => openLightbox(index));
    });

    lightboxPrev?.addEventListener('click', (event) => {
        event.stopPropagation();
        goPrev();
    });

    lightboxNext?.addEventListener('click', (event) => {
        event.stopPropagation();
        goNext();
    });

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
            closeLightbox();
        }
    });

    lightboxClose?.addEventListener('click', closeLightbox);

    lightbox.addEventListener('touchstart', (event) => {
        touchStartX = event.changedTouches[0].clientX;
    });

    lightbox.addEventListener('touchend', (event) => {
        touchEndX = event.changedTouches[0].clientX;
        const delta = touchStartX - touchEndX;
        if (Math.abs(delta) < 40) {
            return;
        }
        if (delta > 0) {
            goNext();
        } else {
            goPrev();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (!lightbox.classList.contains('is-open')) {
            return;
        }
        if (event.key === 'Escape') {
            closeLightbox();
        }
        if (event.key === 'ArrowRight') {
            goNext();
        }
        if (event.key === 'ArrowLeft') {
            goPrev();
        }
    });
}
