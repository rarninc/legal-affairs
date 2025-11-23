const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'gold': '#e0c880',
        'primary': '#434343',
        'body': '#676C72',
        'table': '#F8F9FC',
        'login': '#2D6B9A',
        'login-100': '#265C85',
        'login-200': '#1F4F73',
        'cert':'#983265'
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [require("daisyui")],
}

