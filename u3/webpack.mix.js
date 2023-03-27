let mix = require('laravel-mix');

mix
.disableNotifications()
.js('src/app.js', 'dist')
.sass('src/app.scss', 'public')