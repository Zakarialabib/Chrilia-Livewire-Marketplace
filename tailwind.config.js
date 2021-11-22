const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  darkMode: "class",
  purge: {
    enabled: false,
    content: [
      "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    options: {
      safelist: []
    }
  },
  theme: {
    extend: {
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        dark: {
          bg: "#151823",
          "eval-1": "#222738",
          "eval-2": "#2A2F42",
          "eval-3": "#2C3142",
        },
        indigo: colors.indigo,
        rose: colors.rose,
        blueGray: colors.blueGray,
        lightBlue: colors.lightBlue,
        orange: colors.orange,
        red: colors.red
      },
    }
  },
  variants: [
    'responsive',
    'group-hover',
    'focus-within',
    'first',
    'last',
    'odd',
    'even',
    'hover',
    'focus',
    'active',
    'visited',
    'disabled'
  ],
  plugins: [
    require('@tailwindcss/forms',
    require('tailwindcss-tables')({
      cellPadding: '.75rem',  // default: .75rem
      tableBorderColor: '#dee2e6',  // default: #dee2e6
      tableStripedBackgroundColor: 'rgba(0,0,0,.05)',  // default: rgba(0,0,0,.05)
      tableHoverBackgroundColor: 'rgba(0,0,0,.075)',  // default: rgba(0,0,0,.075)
      tableBodyBorder: true, // default: true. If set to false, borders for the table body will be removed. Only works for normal tables (i.e. does not apply to .table-bordered)
      verticalAlign: 'top', // default: 'top'
    }),
  )]
}