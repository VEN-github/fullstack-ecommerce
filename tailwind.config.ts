import type { Config } from 'tailwindcss'
import flowbitePlugin from 'flowbite/plugin'
import { addDynamicIconSelectors } from '@iconify/tailwind'

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./app/**/*.php', './src/**/*.{js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        primary: '#2c3037',
        secondary: '#ed6a4c',
        error: '#ec2d40'
      }
    }
  },
  plugins: [flowbitePlugin, addDynamicIconSelectors()]
} satisfies Config
