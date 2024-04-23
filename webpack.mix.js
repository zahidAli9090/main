const mix = require('laravel-mix')
const glob = require('glob')

mix.options({
    processCssUrls: false,
    clearConsole: true,
    terser: {
        extractComments: false,
    },
    manifest: false,
});

mix.webpackConfig({
    stats: {
        children: false,
    },
    externals: {
        vue: 'Vue',
    },
});

mix.disableSuccessNotifications();

mix.vue();

let buildPaths = []

if (process.env.npm_config_theme === 'true') {
    buildPaths.push('themes/*')
}

if (process.env.npm_config_plugin === 'true') {
    buildPaths.push('plugins/*')
}

if (process.env.npm_config_package === 'true') {
    buildPaths.push('packages/*')
}

if (process.env.npm_config_core === 'true') {
    buildPaths.push('core/*')
}

if (! buildPaths.length) {
    buildPaths = ['*/*']
}

// Run all webpack.mix.js in app
buildPaths.forEach(buildPath => glob.sync(`./platform/${buildPath}/webpack.mix.js`).forEach(item => require(__dirname + '/' + item)));
