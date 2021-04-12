const { colors: defaultColors } = require('tailwindcss/defaultTheme')
module.exports = {
  purge: [
    './resources/**/*/*/*.blade.php',
    './resources/**/*/*/*.js',
    './resources/**/*/*/*.vue',
  ],
  darkMode: false, // or '**/*.vuemedia' or 'class'
  theme: {
    extend: {},
    colors: {
      ...defaultColors,
      primary: '#232931',
      secondary: '#393e46',
      semi: {
        transparent: 'rgba(0,0,0,.6)'
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
