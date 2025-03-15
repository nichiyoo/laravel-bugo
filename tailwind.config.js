import { fontFamily } from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      container: {
        center: true,
        padding: '2rem',
      },
      fontFamily: {
        sans: ['var(--font-sans)', ...fontFamily.sans],
      },
      colors: {
        background: '#e13d56',
        foreground: '#cf384f',
        secondary: '#bcfdf7',
        darker: '#7b212f',
        accent: {
          '50': '#fefde8',
          '100': '#fffdc2',
          '200': '#fff689',
          '300': '#ffed66',
          '400': '#fdd812',
          '500': '#ecbe06',
          '600': '#cc9302',
          '700': '#a36905',
          '800': '#86520d',
          '900': '#724311',
          '950': '#432305',
        },
        // accent: '#ffed66'
      },
      minWidth: {
        ornament: '1000px',
      }
    },
  },

  plugins: [forms],
};
