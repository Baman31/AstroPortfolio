/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.{js,html}",
  ],
  theme: {
    extend: {
      colors: {
        'deep-blue': '#0C134F',
        'gold': '#FFD700',
        'off-white': '#F8F8F8',
        'saffron': '#FF9933',
      },
      fontFamily: {
        'heading': ['"Playfair Display"', 'serif'],
        'body': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
