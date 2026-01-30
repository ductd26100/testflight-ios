// ===== Advanced Anti-Clone Protection =====
// Obfuscated + Enhanced Protection

(function (_0x4a2c, _0x1f3b) { const _0xcheck = function () { return window; }; const _0xinit = _0xcheck(); _0xinit['console']['log']('%c⚠️ CẢNH BÁO!', 'color:red;font-size:30px;font-weight:bold'); _0xinit['console']['log']('%cĐây là tính năng dành cho developer!', 'color:red;font-size:16px') })();

// Chặn chuột phải  
document.addEventListener('contextmenu', function (e) { e.preventDefault(); return !1 });

// Chặn phím tắt
document.addEventListener('keydown', function (e) { const k = e.keyCode || e.which; if (k === 123 || (e.ctrlKey && e.shiftKey && [73, 74, 67].includes(k)) || (e.ctrlKey && [85, 83].includes(k))) { e.preventDefault(); return !1 } });

// Chặn kéo thả & select
document.addEventListener('dragstart', function (e) { e.preventDefault(); return !1 });
document.addEventListener('selectstart', function (e) { e.preventDefault(); return !1 });

// Anti-iframe
if (window.top !== window.self) { window.top.location = window.self.location }

// Advanced debugger detection
(function () {
    const _0x1a = function () {
        const _0x2b = new Date();
        debugger;
        const _0x3c = new Date();
        if (_0x3c - _0x2b > 100) {
            document.body.innerHTML = '<div style="display:flex;justify-content:center;align-items:center;height:100vh;background:#0d0d0d;color:#ff3333;"><h1>🚫 Phát hiện công cụ debug</h1></div>';
        }
    };
    setInterval(_0x1a, 1000);
})();

// DevTools size detection
(function () {
    const _0t = 160;
    const _0c = function () {
        if (window.outerWidth - window.innerWidth > _0t || window.outerHeight - window.innerHeight > _0t) {
            console.clear();
        }
    };
    setInterval(_0c, 500);
})();

// Disable console methods
(function () {
    const _0n = function () { };
    const _0m = ['log', 'debug', 'info', 'warn', 'error', 'table', 'trace', 'dir', 'dirxml', 'group', 'groupEnd', 'time', 'timeEnd', 'profile', 'profileEnd', 'count'];
    _0m.forEach(function (m) {
        window.console[m] = _0n;
    });
})();

// Anti copy-paste in console
Object.defineProperty(window, 'console', {
    get: function () {
        return { log: function () { }, warn: function () { }, error: function () { }, info: function () { }, debug: function () { } };
    },
    set: function (_0v) { }
});

// Prevent toString exploit
(function () {
    const _0orig = Function.prototype.toString;
    Function.prototype.toString = function () {
        if (this === window.console.log || this === window.console.warn) {
            return 'function(){}';
        }
        return _0orig.apply(this, arguments);
    };
})();

// Add CSS protection
(function () {
    const _0s = document.createElement('style');
    _0s.textContent = '*{-webkit-user-select:none!important;-moz-user-select:none!important;-ms-user-select:none!important;user-select:none!important}img{-webkit-user-drag:none!important;-khtml-user-drag:none!important;-moz-user-drag:none!important;-o-user-drag:none!important;user-drag:none!important;pointer-events:none}';
    document.head.appendChild(_0s);
})();

// Honeypot trap
window._0xh = function () {
    document.body.innerHTML = '';
    window.location.href = 'about:blank';
};

// Self-destruct if cloned to different domain
(function () {
    const _0d = ['testflightios.com', 'www.testflightios.com', 'localhost', '127.0.0.1'];
    const _0h = window.location.hostname;
    if (_0h && !_0d.some(d => _0h === d || _0h.endsWith('.' + d))) {
        document.body.innerHTML = '<div style="display:flex;justify-content:center;align-items:center;height:100vh;background:#1a1a2e;color:#fff;text-align:center;font-family:sans-serif"><div><h1>⛔ Trang web không hợp lệ</h1><p>Vui lòng truy cập: <a href="https://testflightios.com" style="color:#00d4ff">testflightios.com</a></p></div></div>';
    }
})();

// Integrity check - detect if script is modified
(function () {
    const _0i = '6c33830';
    if (typeof window._0xIntegrity !== 'undefined' && window._0xIntegrity !== _0i) {
        document.body.innerHTML = '';
    }
})();
