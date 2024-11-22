import type { Config } from 'tailwindcss'
import flowbitePlugin from 'flowbite/plugin'

/** @type {import('tailwindcss').Config} */
export default {
  content: ['*.php', './src/**/*.{js,ts,jsx,tsx}', './node_modules/flowbite/**/*.js'],
  theme: {
    extend: {}
  },
  plugins: [flowbitePlugin]
} satisfies Config
