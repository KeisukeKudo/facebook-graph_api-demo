const mix = require('laravel-mix');
const path = require('path');

mix
  .ts('resources/ts/app.ts', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sourceMaps(true, 'source-map');

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.ts'],
    alias: {
      vue$: 'vue/dist/vue.esm.js',
      '@': path.resolve(__dirname, 'resources/ts'),
      '~': path.resolve(__dirname, 'resources/ts'),
    },
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: 'ts-loader',
        options: { appendTsSuffixTo: [/\.vue$/] },
        exclude: /node_modules/,
      },
    ],
  },
});
