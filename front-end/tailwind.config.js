/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  content: [],
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
        'mf-200': '#4D5563',
        'mf-900': '#1A232A',
      },
    },
  },
  plugins: [],
}
