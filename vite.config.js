import { defineConfig } from 'vite'
import { viteStaticCopy } from 'vite-plugin-static-copy'

// https://vitejs.dev/config/
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
  },
  plugins: [
    viteStaticCopy({
      targets: [
        {
          src: 'src/assets/images',
          dest: 'assets'
        }
      ]
    })
  ]
})
