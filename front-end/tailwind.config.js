/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    fontFamily: {
      sans: ['Open Sans'],
      roboto: ['Roboto']
    },
    extend: {
      fontSize: {
        xxs: '.60rem',
      },
      colors: {
        mf: '#2C353E',
        'mf-100': '#E3E3E3',
        'mf-150': '#A6A6A6',
        'mf-200': '#4D5563',
        'mf-300': '#2A333C',
        'mf-900': '#1A232A',
      },
    },
  },
  plugins: [],
}
