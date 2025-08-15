/** @type {import('tailwindcss').Config} */
module.exports = {
  // Cette ligne est la clé, elle force la bonne stratégie
  darkMode: 'selector', 

  content: [
    './*.php',
    './**/*.php',
    './**/*.js'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}