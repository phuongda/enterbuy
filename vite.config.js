import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: '.',
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        top: path.resolve(__dirname, 'assets/entry/top.js'),
        product: path.resolve(__dirname, 'assets/entry/product.js'),
        common: path.resolve(__dirname, 'assets/entry/common.js'),
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: assetInfo => {
          if (assetInfo.name && assetInfo.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          return '[name][extname]';
        },
      },
    },
    watch: {
      include: 'assets/**',
    },
  },
});
