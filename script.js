let openLoginRight = document.querySelector('.h1');
let openLoginWrapper = document.querySelector('.login-wrapper');

openLoginRight.addEventListener('click', function() {
    openLoginWrapper.classList.toggle('open');
});