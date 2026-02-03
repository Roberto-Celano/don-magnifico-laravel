const reviewsTrack = document.querySelector('.reviews-bento');

if (reviewsTrack) {
    const isMobile = window.matchMedia('(max-width: 767.98px)').matches;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (isMobile && !prefersReducedMotion) {
        let autoScrollTimer = null;

        const scrollNext = () => {
            const maxScrollLeft = reviewsTrack.scrollWidth - reviewsTrack.clientWidth;
            if (maxScrollLeft <= 0) {
                return;
            }
            const step = Math.max(1, Math.floor(reviewsTrack.clientWidth * 0.9));
            const nextLeft = reviewsTrack.scrollLeft + step;
            if (nextLeft >= maxScrollLeft - 4) {
                reviewsTrack.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                reviewsTrack.scrollTo({ left: nextLeft, behavior: 'smooth' });
            }
        };

        const startAutoScroll = () => {
            if (autoScrollTimer) {
                return;
            }
            autoScrollTimer = window.setInterval(scrollNext, 3500);
        };

        const stopAutoScroll = () => {
            if (!autoScrollTimer) {
                return;
            }
            window.clearInterval(autoScrollTimer);
            autoScrollTimer = null;
        };

        startAutoScroll();
        reviewsTrack.addEventListener('pointerdown', stopAutoScroll, { passive: true });
        reviewsTrack.addEventListener('pointerup', startAutoScroll, { passive: true });
        reviewsTrack.addEventListener('pointercancel', startAutoScroll, { passive: true });
        reviewsTrack.addEventListener('mouseleave', startAutoScroll, { passive: true });
    }
}
