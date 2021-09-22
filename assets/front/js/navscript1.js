const wrapper = document.querySelector('.site-wrapper');
const burger = document.querySelector('nav .burger');

burger.addEventListener('click', () => {
  wrapper.classList.remove('no-animation');
  document.body.classList.toggle('mobile-open');
});