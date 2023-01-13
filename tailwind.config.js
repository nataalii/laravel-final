/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],  theme: {
    extend: {
      colors: {
        'grn': "#0FBA68",
        'brand-primary': '#2029F3',
        'system-error': '#CC1E1E',
        'brand-tertiary': '#EAD621',
        'system-success': '#249E2C',
      },

    },
  },
  plugins: [],
}
