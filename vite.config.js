// https://vitejs.dev/config/
// http://localhost:3005 is serving Vite on development but accessing it directly will be empty

import { defineConfig } from 'vite'
import legacy from '@vitejs/plugin-legacy'
import liveReload from 'vite-plugin-live-reload'

const { resolve } = require('path')

export default defineConfig({
  plugins: [
    legacy({
      targets: ['defaults', 'not IE 11'],
    }),
    liveReload([`${__dirname}/*.php`, `${__dirname}/(lib|partials)/**/*.php`]),
  ],
  root: 'src',
  base: process.env.APP_ENV === 'development' ? '/src' : '/dist',
  resolve: {
    alias: {
      '@images': resolve(__dirname, './src/assets/images'),
    },
  },
  build: {
    // output dir for production build
    outDir: resolve(__dirname, './dist'),
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,

    // esbuild target
    target: 'modules',

    // our entry
    rollupOptions: {
      input: '/main.js',
    },
  },
  server: {
    // required to load scripts from custom host
    cors: true,

    // we need a strict port to match on PHP side
    strictPort: true,
    port: 3005,
  },
})
