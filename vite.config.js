import { defineConfig } from 'vite';

export default defineConfig({
  root: '.',
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
  },
});
