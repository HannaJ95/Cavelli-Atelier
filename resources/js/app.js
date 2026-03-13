import './bootstrap';

// Optional: Close all <details> when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('details')) {
        document.querySelectorAll('details').forEach(d => d.removeAttribute('open'));
    }
});
