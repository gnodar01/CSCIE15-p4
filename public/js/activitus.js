var logout = document.getElementById('logout');
var logoutLink = document.getElementById('logout-link');

logoutLink.addEventListener('click', (e) => {
    e.preventDefault();
    logout.submit();
})