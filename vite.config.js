import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    manifest: true,
    rollupOptions: {
      input: './src/main.ts'
    },
    modulePreload: {
      polyfill: false
    }
  },
  server: {
    origin: 'http://localhost:5173'
  }
})
