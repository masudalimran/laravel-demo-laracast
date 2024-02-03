/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.{blade.php, js, ts, vue}"],
    theme: {
        extend: {
            fontFamily: {
                rubik: ["Rubik Doodle Shadow", "monospace"],
                cang: ["Long Cang", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: "#40a56a",
                secondary: "#eaf9f0",
            },
            animation: {
                "color-change": "color-switch 60s ease-in-out infinite",
            },
            keyframes: {
                "color-switch": {
                    "0%, 100%": { color: "red" },
                    "10%": { color: "orange" },
                    "20%": { color: "rgb(174, 174, 37)" },
                    "30%": { color: "green" },
                    "50%": { color: "blue" },
                    "60%": { color: "orange" },
                    "70%": { color: "black" },
                    "85%": { color: "violet" },
                },
            },
        },
    },
    plugins: [],
};
