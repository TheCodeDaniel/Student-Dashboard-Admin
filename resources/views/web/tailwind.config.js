/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}"],
  theme: {
    extend: {},
    colors: {
      sky: {
        100: "#bfeefb",
        200: "#80dcf7",
        300: "#41cbf3",
        400: "#01baef",
        500: "#013241",
        600: "#000C0F",
      },
    },
  },
  plugins: [],
};
