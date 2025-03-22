import './lucide';
import './splide';
import './bootstrap';

import Alpine from 'alpinejs';
import Imask from 'imask';

window.Alpine = Alpine;
Alpine.start();

const currencies = document.querySelectorAll('.currency');
currencies.forEach(currency => {
  Imask(currency, {
    mask: [
      { mask: '' },
      {
        mask: 'Rp num',
        lazy: false,
        blocks: {
          num: {
            mask: Number,
            thousandsSeparator: ',',
            normalizeZeros: true,
            padFractionalZeros: true,
          }
        }
      }
    ]
  });
});
