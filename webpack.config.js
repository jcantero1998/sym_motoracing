var Encore = require('@symfony/webpack-encore');
Encore
 // directory where all compiled assets will be stored
 .setOutputPath('web/build/')
 // Windows??? <---------------------------
 .setManifestKeyPrefix('build')
 // what's the public path to this directory (relative to your project'sdocument root dir)
 .setPublicPath('/build')
 // empty the outputPath dir before each build
 .cleanupOutputBeforeBuild()
 // will output as web/build/app.js
 .addEntry('app', './web/assets/js/main.js')
 // will output as web/build/global.css
 .addStyleEntry('global', './web/assets/scss/app.scss')
 // allow sass/scss files to be processed
 .enableSassLoader()
 // allow legacy applications to use $/jQuery as a global variable
 .autoProvidejQuery()
 .enableSourceMaps(!Encore.isProduction())
 // create hashed filenames (e.g. app.abc123.css)
 // .enableVersioning()
;
// export the final configuration
module.exports = Encore.getWebpackConfig();