const path = require('path');
const ExtractTestPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {
        index: './src/scss/index.scss'
    },
    output: {
        path: path.join(__dirname, 'public/css'),
        filename: '[name].css'
    },
    module: {
        loaders: [
            {
                test: /\.scss$/,
                loader: ExtractTestPlugin.extract({
                    fallback: 'style-loader',
                    use: 'css-loader!sass-loader'
                })
            }
        ]
    },
    plugins: [
        new ExtractTestPlugin('[name].css')
    ]
};