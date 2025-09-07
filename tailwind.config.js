import defaultTheme from "tailwindcss/defaultTheme"
import forms from "@tailwindcss/forms"
import tailwindConfig from "shadcn/ui/tailwind.config"

/** @type {import('tailwindcss').Config} */
export default {
  ...tailwindConfig,
  content: [
    ...tailwindConfig.content,
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
    "*.{js,ts,jsx,tsx,mdx}",
  ],

  theme: {
    ...tailwindConfig.theme,
    extend: {
      ...tailwindConfig.theme.extend,
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans],
        poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
      animation: {
        "bounce-slow": "bounce 2s infinite",
        float: "float 3s ease-in-out infinite",
      },
      keyframes: {
        float: {
          "0%, 100%": { transform: "translateY(0px)" },
          "50%": { transform: "translateY(-10px)" },
        },
      },
    },
  },

  plugins: [...tailwindConfig.plugins, forms],
}
