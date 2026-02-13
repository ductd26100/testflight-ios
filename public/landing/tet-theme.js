// ===== TET THEME - Lunar New Year 2026 =====

// Create falling blossoms
function createBlossoms() {
    const container = document.createElement('div');
    container.className = 'tet-blossoms';
    container.id = 'tetBlossoms';

    for (let i = 0; i < 20; i++) {
        const blossom = document.createElement('div');
        blossom.className = 'blossom';
        blossom.style.left = Math.random() * 100 + '%';
        blossom.style.animationDuration = (Math.random() * 5 + 8) + 's';
        blossom.style.animationDelay = (Math.random() * 10) + 's';
        container.appendChild(blossom);
    }

    document.body.appendChild(container);
}

// Create lanterns
function createLanterns() {
    const container = document.createElement('div');
    container.className = 'tet-lanterns';
    container.id = 'tetLanterns';

    for (let i = 0; i < 4; i++) {
        const lantern = document.createElement('div');
        lantern.className = 'lantern';
        lantern.innerHTML = '🏮';
        container.appendChild(lantern);
    }

    document.body.appendChild(container);
}

// Create Tet banner
function createTetBanner() {
    const banner = document.createElement('div');
    banner.className = 'tet-banner';
    banner.id = 'tetBanner';

    banner.innerHTML = `
        <div class="tet-banner-content">
            <span class="tet-banner-emoji">🧧</span>
            <span class="tet-banner-text">Chúc Mừng Năm Mới 2026 - Năm Bính Ngọ 🐴</span>
            <span class="tet-banner-emoji">🧧</span>
        </div>
        <button class="tet-banner-close" onclick="closeTetBanner()" title="Đóng">×</button>
    `;

    document.body.insertBefore(banner, document.body.firstChild);
    document.body.classList.add('tet-banner-visible');
}

// Close Tet banner
function closeTetBanner() {
    const banner = document.getElementById('tetBanner');
    if (banner) {
        banner.style.animation = 'slideUp 0.3s ease forwards';
        setTimeout(() => {
            banner.remove();
            document.body.classList.remove('tet-banner-visible');
        }, 300);
    }
}

// Add slide up animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideUp {
        to {
            transform: translateY(-100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Initialize Tet theme when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    createTetBanner();
    createBlossoms();
    createLanterns();
});

// Also run immediately if DOM is already loaded
if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(() => {
        if (!document.getElementById('tetBanner')) {
            createTetBanner();
            createBlossoms();
            createLanterns();
        }
    }, 100);
}
