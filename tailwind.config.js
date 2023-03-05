/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [ 
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',],
    theme: {
      container: {
        center: true,
        padding: '16px'
      },
      extend:
      {
        fontFamily:{
          'viga' : ['Viga','sans'],
          'poppins': ['Poppins','sans-serif']
        },
        colors:{
          'primary': '#e4853c',
          'primary-hover': '#ce7836',
          'secondary': '#585e84',
          'secondary-hover': '#4d5273',
        }
      }
    },
    plugins: [],
  }