// ===== Anti-Clone Protection Script =====
// PRODUCTION MODE - Protection ENABLED

// Chặn chuột phải
document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
    return false;
});

// Chặn các phím tắt DevTools
document.addEventListener('keydown', function (e) {
    // F12
    if (e.key === 'F12') {
        e.preventDefault();
        return false;
    }

    // Ctrl+Shift+I (Inspect)
    if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i')) {
        e.preventDefault();
        return false;
    }

    // Ctrl+Shift+J (Console)
    if (e.ctrlKey && e.shiftKey && (e.key === 'J' || e.key === 'j')) {
        e.preventDefault();
        return false;
    }

    // Ctrl+Shift+C (Element picker)
    if (e.ctrlKey && e.shiftKey && (e.key === 'C' || e.key === 'c')) {
        e.preventDefault();
        return false;
    }

    // Ctrl+U (View source)
    if (e.ctrlKey && (e.key === 'U' || e.key === 'u')) {
        e.preventDefault();
        return false;
    }

    // Ctrl+S (Save page)
    if (e.ctrlKey && (e.key === 'S' || e.key === 's')) {
        e.preventDefault();
        return false;
    }
});

// Chặn kéo thả hình ảnh
document.addEventListener('dragstart', function (e) {
    e.preventDefault();
    return false;
});

// Chặn select text
document.addEventListener('selectstart', function (e) {
    e.preventDefault();
    return false;
});

// Phát hiện DevTools mở
(function () {
    const threshold = 160;
    const check = function () {
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;

        if (widthThreshold || heightThreshold) {
            // DevTools có thể đang mở - clear console
            console.clear();
        }
    };

    // Kiểm tra mỗi giây
    setInterval(check, 1000);
})();

// Chặn iframe embedding
if (window.top !== window.self) {
    window.top.location = window.self.location;
}

// Console warning
console.log('%c⚠️ CẢNH BÁO!', 'color: red; font-size: 30px; font-weight: bold;');
console.log('%cĐây là tính năng dành cho developer. Nếu ai đó bảo bạn paste code vào đây, đó là lừa đảo!', 'color: red; font-size: 16px;');
