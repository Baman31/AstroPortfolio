/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.{js,html}",
  ],
  theme: {
    extend: {
      colors: {
        'cosmic-black': '#0a0a0a',
        'cosmic-gray': '#1a1a1a',
        'cosmic-dark': '#0f0f0f',
        'gold': '#D4AF37',
        'gold-light': '#F5D76E',
        'gold-dark': '#B8941E',
        'off-white': '#F8F8F8',
        'mystic-purple': '#3d2954',
      },
      fontFamily: {
        'heading': ['"Cinzel"', '"Playfair Display"', 'serif'],
        'body': ['"Poppins"', 'sans-serif'],
        'decorative': ['"Cormorant Garamond"', 'serif'],
      },
      backgroundImage: {
        'cosmic': "radial-gradient(circle at 50% 50%, #1a1a2e 0%, #0a0a0a 100%)",
        'stars': "url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Ccircle cx=%2210%22 cy=%2220%22 r=%221%22 fill=%22%23fff%22 opacity=%220.3%22/%3E%3Ccircle cx=%2280%22 cy=%2280%22 r=%221%22 fill=%22%23fff%22 opacity=%220.2%22/%3E%3Ccircle cx=%2250%22 cy=%2250%22 r=%221%22 fill=%22%23fff%22 opacity=%220.4%22/%3E%3C/svg%3E')",
      },
    },
  },
  plugins: [],
}
