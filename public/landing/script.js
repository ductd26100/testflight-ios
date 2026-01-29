// Contact Form Handler
document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.querySelector('.contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Lấy dữ liệu form
            const formData = {
                name: document.getElementById('name').value.trim(),
                email: document.getElementById('email').value.trim(),
                telegram: document.getElementById('telegram').value.trim(),
                message: document.getElementById('message').value.trim()
            };

            // Validate đơn giản
            if (!formData.name || !formData.email || !formData.message) {
                showMessage('Vui lòng điền đầy đủ thông tin!', 'error');
                return;
            }

            // Disable button và hiển thị loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>⏳ Đang gửi...</span>';

            try {
                // Lấy CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                const response = await fetch('/contact/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken || ''
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    showMessage(data.message, 'success');
                    contactForm.reset();
                } else {
                    showMessage(data.message || 'Có lỗi xảy ra!', 'error');
                }

            } catch (error) {
                console.error('Error:', error);
                showMessage('Không thể kết nối đến server. Vui lòng thử lại!', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });
    }
});

// Hiển thị thông báo
function showMessage(message, type = 'success') {
    // Xóa thông báo cũ nếu có
    const oldAlert = document.querySelector('.form-alert');
    if (oldAlert) {
        oldAlert.remove();
    }

    const alert = document.createElement('div');
    alert.className = `form-alert ${type}`;
    alert.innerHTML = `
        <span>${type === 'success' ? '✓' : '✕'}</span>
        <span>${message}</span>
    `;

    const form = document.querySelector('.contact-form');
    form.insertBefore(alert, form.firstChild);

    // Tự động ẩn sau 5 giây
    setTimeout(() => {
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 300);
    }, 5000);
}

// Ẩn/hiện Zalo theo ngôn ngữ
function updateZaloVisibility(lang) {
    const zaloItem = document.getElementById('zaloItem');
    if (zaloItem) {
        if (lang === 'en') {
            zaloItem.style.display = 'none';
        } else {
            zaloItem.style.display = 'flex';
        }
    }
}

// Gọi khi trang load để kiểm tra ngôn ngữ hiện tại
document.addEventListener('DOMContentLoaded', function () {
    const currentLang = localStorage.getItem('lang') || 'vi';
    updateZaloVisibility(currentLang);
});
