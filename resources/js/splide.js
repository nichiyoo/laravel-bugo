import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide', {
    direction: 'ttb',
    height: '17rem',
    type: 'loop',
  }).mount();
});
