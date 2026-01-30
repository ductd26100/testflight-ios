/**
 * Anti-Clone Protection Script
 * Prevents copying, right-click, and common developer tools shortcuts
 */
(function () {
    'use strict';

    // Allowed domains - only these domains can display this website
    const allowedDomains = [
        'testflightios.com',
        'www.testflightios.com',
        'localhost',
        '127.0.0.1'
    ];

    // Check if site is being cloned/iframed from unauthorized domain
    function checkDomain() {
        const currentHost = window.location.hostname;
        const isAllowed = allowedDomains.some(domain =>
            currentHost === domain || currentHost.endsWith('.' + domain)
        );

        if (!isAllowed && currentHost !== '') {
            document.body.innerHTML = '<div style="display:flex;justify-content:center;align-items:center;height:100vh;background:#1a1a2e;color:#fff;font-family:sans-serif;text-align:center;"><div><h1>⚠️ Truy cập không hợp lệ</h1><p>Website này chỉ có thể truy cập từ <a href="https://testflightios.com" style="color:#00d4ff;">testflightios.com</a></p></div></div>';
        }
    }

    // Prevent iframe embedding
    function preventIframe() {
        if (window.top !== window.self) {
            window.top.location = window.self.location;
        }
    }

    // Disable right-click context menu
    function disableRightClick(e) {
        e.preventDefault();
        return false;
    }

    // Disable text selection
    function disableSelection() {
        document.body.style.userSelect = 'none';
        document.body.style.webkitUserSelect = 'none';
        document.body.style.msUserSelect = 'none';
        document.body.style.mozUserSelect = 'none';
    }

    // Block keyboard shortcuts
    function blockKeyboardShortcuts(e) {
        // F12 - Developer Tools
        if (e.keyCode === 123) {
            e.preventDefault();
            return false;
        }

        // Ctrl+Shift+I - Developer Tools
        if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
            e.preventDefault();
            return false;
        }

        // Ctrl+Shift+J - Console
        if (e.ctrlKey && e.shiftKey && e.keyCode === 74) {
            e.preventDefault();
            return false;
        }

        // Ctrl+U - View Source
        if (e.ctrlKey && e.keyCode === 85) {
            e.preventDefault();
            return false;
        }

        // Ctrl+S - Save Page
        if (e.ctrlKey && e.keyCode === 83) {
            e.preventDefault();
            return false;
        }

        // Ctrl+C - Copy (optional, can be annoying)
        // if (e.ctrlKey && e.keyCode === 67) {
        //     e.preventDefault();
        //     return false;
        // }
    }

    // Detect DevTools open (basic detection)
    function detectDevTools() {
        const threshold = 160;
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;

        if (widthThreshold || heightThreshold) {
            // DevTools might be open - you can add custom action here
            console.clear();
        }
    }

    // Initialize protection
    function init() {
        // Check domain
        checkDomain();

        // Prevent iframe
        preventIframe();

        // Disable right-click
        document.addEventListener('contextmenu', disableRightClick);

        // Disable selection
        disableSelection();

        // Block keyboard shortcuts
        document.addEventListener('keydown', blockKeyboardShortcuts);

        // Periodic DevTools check
        setInterval(detectDevTools, 1000);

        // Clear console
        console.clear();
        console.log('%c⚠️ STOP!', 'color: red; font-size: 50px; font-weight: bold;');
        console.log('%cThis is a browser feature intended for developers.', 'font-size: 16px;');
    }

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
