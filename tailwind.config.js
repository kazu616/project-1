/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js,php}"],
    theme: {
        extend: {
            fontFamily: {
                primary: ["Plus Jakarta Sans", "sans-serif"],
                secondary: ["Prata", "serif"],
            },
        },
    },
    plugins: [],
};
