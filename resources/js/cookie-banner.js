const banner = document.getElementById('cookieBanner');

if (banner) {
    const CONSENT_COOKIE = 'dm_cookie_consent';
    const buttons = banner.querySelectorAll('[data-consent]');

    const getCookie = (name) => {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) {
            return parts.pop().split(';').shift();
        }
        return null;
    };

    const setCookie = (name, value, days) => {
        const maxAge = days * 24 * 60 * 60;
        document.cookie = `${name}=${value}; max-age=${maxAge}; path=/; samesite=lax`;
    };

    const hideBanner = () => {
        banner.classList.add('is-hidden');
        window.setTimeout(() => {
            banner.remove();
        }, 250);
    };

    const existing = getCookie(CONSENT_COOKIE);
    if (existing) {
        hideBanner();
    } else {
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const choice = button.getAttribute('data-consent');
                setCookie(CONSENT_COOKIE, choice, 180);
                hideBanner();
                window.dispatchEvent(new CustomEvent('cookie:consent', { detail: choice }));
                if (choice === 'accept') {
                    window.dispatchEvent(new CustomEvent('cookie:accepted'));
                }
            });
        });
    }
}
