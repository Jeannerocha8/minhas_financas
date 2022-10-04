/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    fontFamily: {
      sans: ['Open Sans'],
      roboto: ['Roboto']
    },
    //-webkit-box-shadow: 9px 19px 10px 0px rgba(0,0,0,0.58);
    // box-shadow: ;
    extend: {
      boxShadow: {
        '3xl': '1px 4px 8px 0px rgba(0,0,0,0.4)',
      },
      fontSize: {
        xxs: '.60rem',
      },
      colors: {
        mf: '#2C353E',
        'mf-100': '#E3E3E3',
        'mf-150': '#A6A6A6',
        'mf-200': '#4D5563',
        'mf-300': '#2A333C',
        'mf-400': '#1e2730',
        'mf-500': '#39414c',
        'mf-900': '#1A232A',
      },
    },
  },
  plugins: [],
}
