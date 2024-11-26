import { defineConfig } from 'vite'
// import usePHP from 'vite-plugin-php'

export default defineConfig({
  // plugins: [usePHP({ entry: ['index.php'] })],
  // server: {
  //   port: 8000
  // }
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
