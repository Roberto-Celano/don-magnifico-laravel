const CONSENT_COOKIE = 'dm_cookie_consent';
const banner = document.getElementById('cookieBanner');
const preferenceLink = document.querySelector('[data-cookie-preferences]');

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

const deleteCookie = (name) => {
    document.cookie = `${name}=; max-age=0; path=/; samesite=lax`;
};

const hideBanner = () => {
    if (!banner) {
        return;
    }
    banner.classList.add('is-hidden');
};

const showBanner = () => {
    if (!banner) {
        return;
    }
    banner.classList.remove('is-hidden');
    banner.scrollIntoView({ behavior: 'smooth', block: 'end' });
};

if (preferenceLink) {
    preferenceLink.addEventListener('click', (event) => {
        event.preventDefault();
        deleteCookie(CONSENT_COOKIE);
        showBanner();
    });
}

if (banner) {
    const buttons = banner.querySelectorAll('[data-consent]');
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
