import { defineConfig } from 'vite';
import path from 'path';
import fs from 'fs';

function getEntryFiles() {
  const entryDir = path.resolve(__dirname, 'assets/entry');
  const files = fs.readdirSync(entryDir);
  const entries = {};

  files.forEach(file => {
    const ext = path.extname(file);

    if (ext === '.js') {
      const name = path.basename(file, ext);
      entries[name] = path.resolve(entryDir, file);
    }
  });
  return entries;
}

export default defineConfig({
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: getEntryFiles(),
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/chunks/[name].js',
        assetFileNames: (assetInfo) => {
          const ext = assetInfo.name.split('.').pop();
          if (/css/i.test(ext)) {
            return 'css/[name][extname]';
          }

          if (/png|jpe?g|svg|gif|webp/i.test(ext)) {
            return 'images/[name][extname]';
          }

          if (/woff2?|ttf|otf/i.test(ext)) {
            return 'fonts/[name][extname]';
          }

          return 'assets/[name][extname]';
        },
      },
    },
  },
});