// Translations object containing all text in both Vietnamese and English
const translations = {
    vi: {
        // Navigation
        'nav.features': 'Tính năng',
        'nav.about': 'Giới thiệu',
        'nav.pricing': 'Bảng giá',
        'nav.contact': 'Liên hệ',
        'nav.cta': 'Bắt đầu ngay',
        'nav.menu': '☰ Menu',

        // Hero Section
        'hero.badge': 'Dịch vụ lên TestFlight iOS #1',
        'hero.title': 'Nền tảng phân phối TestFlight chuyên nghiệp cho iOS',
        'hero.subtitle': 'Nhận link TestFlight trong 5 phút. An toàn, nhanh chóng, hỗ trợ 24/7.',
        'hero.cta1': '💰 Đăng ký Miễn Phí',
        'hero.cta2': 'Xem bảng giá',
        'hero.stat1': 'Khách hàng',
        'hero.stat2': 'Uptime',
        'hero.stat3': 'Hỗ trợ',

        // Features Section
        'features.badge': 'Tại sao chọn chúng tôi?',
        'features.title': '<span class="gradient-text">Chức năng nổi bật</span>',
        'features.subtitle': 'Trải nghiệm dịch vụ lên TestFlight nhanh chóng, an toàn và tiện lợi nhất thị trường.',
        'features.f1.title': 'Triển khai siêu nhanh',
        'features.f1.desc': 'Nhận link TestFlight chỉ trong vài phút sau khi đăng ký. Không cần chờ đợi, không cần tài khoản Developer.',
        'features.f2.title': 'Bảo mật Apple chính hãng',
        'features.f2.desc': 'Sử dụng hệ thống TestFlight chính thức của Apple. Ứng dụng được ký số an toàn, không lo bị thu hồi.',
        'features.f3.title': 'Hỗ trợ 24/7',
        'features.f3.desc': 'Đội ngũ hỗ trợ luôn sẵn sàng giải đáp thắc mắc qua Telegram, Zalo, Messenger bất cứ lúc nào.',
        'features.f4.title': 'Link riêng biệt',
        'features.f4.desc': 'Mỗi khách hàng nhận được link TestFlight riêng, dễ dàng quản lý và chia sẻ cho người dùng của bạn.',
        'features.f5.title': 'Tương thích mọi iPhone/iPad',
        'features.f5.desc': 'Hoạt động trên tất cả các thiết bị iOS từ iPhone 6s trở lên, iPad và iPod Touch đều được hỗ trợ.',
        'features.f6.title': 'Gia hạn dễ dàng',
        'features.f6.desc': 'Gia hạn link TestFlight nhanh chóng chỉ với một click. Không mất dữ liệu, không cần cài lại app.',

        // About Section
        'about.badge': 'Về chúng tôi',
        'about.title': 'Đối tác công nghệ <span class="gradient-text">đáng tin cậy</span> của bạn',
        'about.desc1': 'Với hơn 10 năm kinh nghiệm trong ngành công nghệ, chúng tôi đã giúp hàng nghìn doanh nghiệp chuyển đổi số thành công.',
        'about.desc2': 'Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng đồng hành cùng bạn trên hành trình phát triển.',
        'about.check1': 'Hỗ trợ 24/7',
        'about.check2': 'Đội ngũ chuyên gia',
        'about.check3': 'Giải pháp tùy chỉnh',
        'about.check4': 'Cam kết chất lượng',

        // Pricing Section
        'pricing.badge': 'Bảng giá',
        'pricing.title': 'Chọn gói phù hợp với <span class="gradient-text">nhu cầu</span> của bạn',
        'pricing.period': '/tháng',
        'pricing.popular': 'Phổ biến nhất',
        'pricing.starter.name': 'Gói Xcode',
        'pricing.starter.desc': 'Phù hợp cho ứng dụng Xcode',
        'pricing.starter.f1': 'Hạn dùng 30 ngày',
        'pricing.starter.f2': '1 Link TestFlight',
        'pricing.starter.f3': 'Hỗ trợ VIP',
        'pricing.starter.f4': 'Không giới hạn lượt tải',
        'pricing.starter.f5': 'Bảo hành 30 ngày',
        'pricing.starter.f6': 'Có link ngay sau đợt quét Apple',
        'pricing.starter.cta': 'Liên hệ ngay',
        'pricing.pro.name': 'Gói IPA',
        'pricing.pro.desc': 'Phù hợp cho file IPA có sẵn',
        'pricing.pro.f1': 'Hạn dùng 30 ngày',
        'pricing.pro.f2': '1 Link TestFlight',
        'pricing.pro.f3': 'Hỗ trợ VIP',
        'pricing.pro.f4': 'Không giới hạn lượt tải',
        'pricing.pro.f5': 'Bảo hành 30 ngày',
        'pricing.pro.f6': 'Có link ngay sau đợt quét Apple',
        'pricing.pro.cta': 'Liên hệ ngay',
        'pricing.enterprise.name': 'Fix Full IPA',
        'pricing.enterprise.desc': 'UP TESTFLIGHT',
        'pricing.enterprise.f1': 'Fix lỗi IPA hoàn chỉnh',
        'pricing.enterprise.f2': 'Upload lên TestFlight',
        'pricing.enterprise.f3': 'Hỗ trợ 24/7',
        'pricing.enterprise.f4': 'Bảo hành lỗi',
        'pricing.enterprise.f5': 'Giao nhanh trong ngày',
        'pricing.enterprise.cta': 'Liên hệ ngay',
        'pricing.starter.price': '800K~1M',
        'pricing.pro.price': '1M~1M5',
        'pricing.enterprise.price': '300K',
        'pricing.enterprise.period': '/IPA',

        // Contact Section
        'contact.badge': 'Liên hệ',
        'contact.title': 'Hãy <span class="gradient-text">kết nối</span> với chúng tôi',
        'contact.subtitle': 'Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn. Hãy liên hệ ngay!',
        'contact.address.label': 'Địa chỉ',
        'contact.address.value': '123 Đường ABC, Quận 1, TP.HCM',
        'contact.phone.label': 'Điện thoại',
        'contact.form.name': 'Họ và tên',
        'contact.form.name.placeholder': 'Nguyễn Văn A',
        'contact.form.telegram': 'Telegram',
        'contact.form.telegram.placeholder': '@username hoặc số điện thoại',
        'contact.form.message': 'Tin nhắn',
        'contact.form.message.placeholder': 'Nội dung tin nhắn...',
        'contact.form.intro': 'Hãy để lại thông tin, tôi sẽ liên hệ lại cho bạn',
        'contact.form.submit': 'Gửi tin nhắn',

        // Footer
        'footer.desc': 'Giải pháp công nghệ đột phá cho doanh nghiệp hiện đại.',
        'footer.product': 'Sản phẩm',
        'footer.features': 'Tính năng',
        'footer.pricing': 'Bảng giá',
        'footer.integrations': 'Tích hợp',
        'footer.company': 'Công ty',
        'footer.about': 'Giới thiệu',
        'footer.blog': 'Blog',
        'footer.careers': 'Tuyển dụng',
        'footer.support': 'Hỗ trợ',
        'footer.help': 'Trung tâm hỗ trợ',
        'footer.contact': 'Liên hệ',
        'footer.docs': 'Tài liệu',
        'footer.rights': 'Tất cả quyền được bảo lưu.',

        // Floating Contact
        'floating.contact': 'Liên hệ'
    },
    en: {
        // Navigation
        'nav.features': 'Features',
        'nav.about': 'About',
        'nav.pricing': 'Pricing',
        'nav.contact': 'Contact',
        'nav.cta': 'Get Started',
        'nav.menu': '☰ Menu',

        // Hero Section
        'hero.badge': 'Share Beta iOS Apps Quickly',
        'hero.title': 'Professional TestFlight Distribution Platform for iOS',
        'hero.subtitle': 'Fast deployment - Get your TestFlight link right after registration. Data and builds are absolutely protected.',
        'hero.cta1': '💰 Sign Up Free',
        'hero.cta2': 'View Pricing',
        'hero.stat1': 'Customers',
        'hero.stat2': 'Uptime',
        'hero.stat3': 'Support',

        // Features Section
        'features.badge': 'Key Features',
        'features.title': 'Everything you need to <span class="gradient-text">succeed</span>',
        'features.subtitle': 'Discover comprehensive tools designed to help your business thrive.',
        'features.f1.title': 'Lightning Fast',
        'features.f1.desc': 'Optimized performance with response time under 100ms, ensuring smooth user experience.',
        'features.f2.title': 'Maximum Security',
        'features.f2.desc': 'End-to-end encryption and compliance with international security standards like ISO 27001, GDPR.',
        'features.f3.title': 'Smart Analytics',
        'features.f3.desc': 'Intuitive dashboard with AI real-time data analysis, helping you make accurate decisions.',
        'features.f4.title': 'Flexible Integration',
        'features.f4.desc': 'Easy connection with 100+ popular apps like Slack, Jira, Google Workspace.',
        'features.f5.title': 'Cross-Platform',
        'features.f5.desc': 'Works perfectly on all devices: desktop, tablet, mobile with responsive interface.',
        'features.f6.title': 'Highly Customizable',
        'features.f6.desc': 'Flexibly adjust to your business needs with an extensible module system.',

        // About Section
        'about.badge': 'About Us',
        'about.title': 'Your <span class="gradient-text">trusted</span> technology partner',
        'about.desc1': 'With over 10 years of experience in the technology industry, we have helped thousands of businesses successfully digitalize.',
        'about.desc2': 'Our team of experts is always ready to accompany you on your development journey.',
        'about.check1': '24/7 Support',
        'about.check2': 'Expert Team',
        'about.check3': 'Custom Solutions',
        'about.check4': 'Quality Commitment',

        // Pricing Section
        'pricing.badge': 'Pricing',
        'pricing.title': 'Choose the plan that fits your <span class="gradient-text">needs</span>',
        'pricing.period': '/month',
        'pricing.popular': 'Most Popular',
        'pricing.starter.name': 'Xcode Package',
        'pricing.starter.desc': 'For Xcode apps',
        'pricing.starter.f1': '30-day duration',
        'pricing.starter.f2': '1 TestFlight Link',
        'pricing.starter.f3': 'VIP Support',
        'pricing.starter.f4': 'Unlimited downloads',
        'pricing.starter.f5': '30-day warranty',
        'pricing.starter.f6': 'Link ready after Apple scan',
        'pricing.starter.cta': 'Contact Now',
        'pricing.pro.name': 'IPA Package',
        'pricing.pro.desc': 'For existing IPA files',
        'pricing.pro.f1': '30-day duration',
        'pricing.pro.f2': '1 TestFlight Link',
        'pricing.pro.f3': 'VIP Support',
        'pricing.pro.f4': 'Unlimited downloads',
        'pricing.pro.f5': '30-day warranty',
        'pricing.pro.f6': 'Link ready after Apple scan',
        'pricing.pro.cta': 'Contact Now',
        'pricing.enterprise.name': 'Fix Full IPA',
        'pricing.enterprise.desc': 'UP TESTFLIGHT',
        'pricing.enterprise.f1': 'Complete IPA fix',
        'pricing.enterprise.f2': 'Upload to TestFlight',
        'pricing.enterprise.f3': '24/7 Support',
        'pricing.enterprise.f4': 'Same-day delivery',
        'pricing.enterprise.cta': 'Contact Now',
        'pricing.starter.price': '$40~$50',
        'pricing.pro.price': '$50~$70',
        'pricing.enterprise.price': '$20',
        'pricing.enterprise.period': '/IPA',

        // Contact Section
        'contact.badge': 'Contact',
        'contact.title': 'Let\'s <span class="gradient-text">connect</span> with us',
        'contact.subtitle': 'We are always ready to listen and support you. Contact us now!',
        'contact.address.label': 'Address',
        'contact.address.value': '123 ABC Street, District 1, HCMC',
        'contact.phone.label': 'Phone',
        'contact.form.name': 'Full Name',
        'contact.form.name.placeholder': 'John Doe',
        'contact.form.telegram': 'Telegram',
        'contact.form.telegram.placeholder': '@username or phone number',
        'contact.form.message': 'Message',
        'contact.form.message.placeholder': 'Your message...',
        'contact.form.intro': 'Leave your info, I will contact you back',
        'contact.form.submit': 'Send Message',

        // Footer
        'footer.desc': 'Breakthrough technology solutions for modern businesses.',
        'footer.product': 'Product',
        'footer.features': 'Features',
        'footer.pricing': 'Pricing',
        'footer.integrations': 'Integrations',
        'footer.company': 'Company',
        'footer.about': 'About',
        'footer.blog': 'Blog',
        'footer.careers': 'Careers',
        'footer.support': 'Support',
        'footer.help': 'Help Center',
        'footer.contact': 'Contact',
        'footer.docs': 'Documentation',
        'footer.rights': 'All rights reserved.',

        // Floating Contact
        'floating.contact': 'Contact'
    }
};

// Language switching functionality
let currentLang = localStorage.getItem('language') || 'vi';

// Function to update all translatable elements
function updateLanguage(lang) {
    currentLang = lang;
    localStorage.setItem('language', lang);

    // Update HTML lang attribute
    document.documentElement.lang = lang;

    // Update all elements with data-i18n attribute
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (translations[lang] && translations[lang][key]) {
            element.innerHTML = translations[lang][key];
        }
    });

    // Update all placeholders with data-i18n-placeholder attribute
    document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
        const key = element.getAttribute('data-i18n-placeholder');
        if (translations[lang] && translations[lang][key]) {
            element.placeholder = translations[lang][key];
        }
    });

    // Update active button state
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.getAttribute('data-lang') === lang) {
            btn.classList.add('active');
        }
    });

    // Ẩn/hiện Zalo theo ngôn ngữ
    if (typeof updateZaloVisibility === 'function') {
        updateZaloVisibility(lang);
    }
}

// Initialize language on page load
document.addEventListener('DOMContentLoaded', function () {
    // Set initial language
    updateLanguage(currentLang);

    // Add click event listeners to language buttons
    document.querySelectorAll('.lang-btn').forEach(button => {
        button.addEventListener('click', function () {
            const lang = this.getAttribute('data-lang');
            updateLanguage(lang);
        });
    });
});
