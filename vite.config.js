const path = require('path')

module.exports = {
    entry: path.resolve(__dirname, "index.js"),  //エントリポイントであるファイルのパスを指定
    output: {
        path: path.resolve(__dirname, 'dist'),  //バンドルしたファイルの出力先のパスを指定
        filename: 'bundle.js' //出力時のファイル名の指定
    }
}


import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        vue(),
    ],
});