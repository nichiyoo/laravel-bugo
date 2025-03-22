import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

console.log('splide.js loaded');

document.addEventListener('DOMContentLoaded', function () {
  const splide = document.querySelector('.splide');
  if (!splide) return;

  new Splide(splide, {
    direction: 'ttb',
    height: '17rem',
    type: 'loop',
  }).mount();
});
