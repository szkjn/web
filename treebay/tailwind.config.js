module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
    },
  },
  variants: {
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    height: ["responsive", "hover", "focus"],
    width: ["responsive", "hover", "focus"],
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
  modules: {
    svgFill: ['responsive', 'hover'],
    svgStroke: ['focus'],
  }
}
