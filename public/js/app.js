// Config axios similar a resources/js/bootstrap.js sin Vite
window.axios = window.axios || axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
} else {
    console.warn('CSRF token no encontrado');
}
