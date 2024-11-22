import { defineConfig } from 'vite'
import usePHP from 'vite-plugin-php'

export default defineConfig({
  plugins: [usePHP({ entry: ['index.php'] })],
  server: {
    port: 8000
  }
})
