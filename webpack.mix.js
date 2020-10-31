const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/style.scss', 'public/assets')
    .sass('resources/assets/sass/admin.scss', 'public/assets')

    .styles([
        // FRONTEND .css files
        'resources/assets/template/frontend/css/bootstrap.min.css',
        'resources/assets/template/frontend/css/animate.css',
        'resources/assets/template/frontend/css/fontawesome-all.min.css',
        'resources/assets/template/frontend/css/et-line.css',
        'resources/assets/template/frontend/css/icomoon.css',
        'resources/assets/template/frontend/css/magnific-popup.css',
        'resources/assets/template/frontend/css/owl.carousel.min.css',
        'resources/assets/template/frontend/css/owl.theme.default.min.css',
        'resources/assets/template/frontend/css/xzoom.css',
        'resources/assets/template/frontend/css/datepicker.css',
        'resources/assets/template/frontend/css/default.css',
        'resources/assets/template/frontend/css/nav-menu.css',
        'resources/assets/template/frontend/css/mailform.css',
        'resources/assets/template/frontend/css/settings.css',
        'resources/assets/template/frontend/css/layers.css',
        'resources/assets/template/frontend/css/navigation.css',
        'resources/assets/template/frontend/css/search.css',
        'resources/assets/template/frontend/css/styles.css',
        'public/assets/style.css' // this .css file must be last
    ], 'public/css/style.min.css')

    .styles([
        // ADMIN - LOGIN .css files
        'resources/assets/template/admin/css/bootstrap.min.css',
        'resources/assets/template/admin/css/metismenu.min.css',
        'resources/assets/template/admin/css/icons.css',
        'resources/assets/template/admin/css/style.css'
    ], 'public/css/login.min.css')

    .styles([
        // ADMIN .css files
        'resources/assets/template/admin/css/morris.css',
        'resources/assets/template/admin/css/dataTables.bootstrap4.min.css',
        'resources/assets/template/admin/css/buttons.bootstrap4.min.css',
        'resources/assets/template/admin/css/responsive.bootstrap4.min.css',
        'resources/assets/template/admin/css/bootstrap-colorpicker.min.css',
        'resources/assets/template/admin/css/bootstrap-datepicker.min.css',
        'resources/assets/template/admin/css/select2.min.css',
        'resources/assets/template/admin/css/jquery.bootstrap-touchspin.min.css',
        'resources/assets/template/admin/css/magnific-popup.css',
        'resources/assets/template/admin/css/bootstrap.min.css',
        'resources/assets/template/admin/css/metismenu.min.css',
        'resources/assets/template/admin/css/icons.css',
        'resources/assets/template/admin/css/style.css',
        'public/assets/admin.css' // this .css file must be last
    ], 'public/css/admin.min.css')

    .scripts([
        // FRONTEND .js files
        'resources/assets/template/frontend/js/jquery.min.js',
        'resources/assets/template/frontend/js/modernizr.js',
        'resources/assets/template/frontend/js/bootstrap.min.js',
        'resources/assets/template/frontend/js/nav-menu.js',
        'resources/assets/template/frontend/js/search.js',
        'resources/assets/template/frontend/js/easy.responsive.tabs.js',
        'resources/assets/template/frontend/js/owl.carousel.min.js',
        'resources/assets/template/frontend/js/jquery.counterup.min.js',
        'resources/assets/template/frontend/js/jquery.stellar.min.js',
        'resources/assets/template/frontend/js/waypoints.min.js',
        'resources/assets/template/frontend/js/tabs.min.js',
        'resources/assets/template/frontend/js/countdown.js',
        'resources/assets/template/frontend/js/jquery.magnific-popup.min.js',
        'resources/assets/template/frontend/js/isotope.pkgd.min.js',
        'resources/assets/template/frontend/js/chart.min.js',
        'resources/assets/template/frontend/js/jquery.themepunch.tools.min.js',
        'resources/assets/template/frontend/js/jquery.themepunch.revolution.min.js',
        'resources/assets/template/frontend/js/revolution.extension.actions.min.js',
        'resources/assets/template/frontend/js/revolution.extension.carousel.min.js',
        'resources/assets/template/frontend/js/revolution.extension.kenburn.min.js',
        'resources/assets/template/frontend/js/revolution.extension.layeranimation.min.js',
        'resources/assets/template/frontend/js/revolution.extension.migration.min.js',
        'resources/assets/template/frontend/js/revolution.extension.navigation.min.js',
        'resources/assets/template/frontend/js/revolution.extension.parallax.min.js',
        'resources/assets/template/frontend/js/revolution.extension.slideanims.min.js',
        'resources/assets/template/frontend/js/revolution.extension.video.min.js',
        'resources/assets/template/frontend/js/map.js',
        'resources/assets/template/frontend/js/main.js',
        //'resources/assets/template/frontend/js/jquery.form.min.js',
        //'resources/assets/template/frontend/js/jquery.rd-mailform.min.c.js',
        'resources/assets/js/frontend.js' // this .js file must be last
    ], 'public/js/frontend.min.js')

    .scripts([
        // ADMIN - LOGIN .js files
        'resources/assets/template/admin/js/jquery.min.js',
        'resources/assets/template/admin/js/bootstrap.bundle.min.js',
        'resources/assets/template/admin/js/metisMenu.min.js',
        'resources/assets/template/admin/js/jquery.slimscroll.js',
        'resources/assets/template/admin/js/waves.min.js',
        'resources/assets/template/admin/js/jquery.sparkline.min.js',
        'resources/assets/template/admin/js/app.js'
    ], 'public/js/login.min.js')

    .scripts([
        // ADMIN .js files
        'resources/assets/template/admin/js/jquery.min.js',
        'resources/assets/template/admin/js/bootstrap.bundle.min.js',
        'resources/assets/template/admin/js/metisMenu.min.js',
        'resources/assets/template/admin/js/jquery.slimscroll.js',
        'resources/assets/template/admin/js/waves.min.js',
        'resources/assets/template/admin/js/jquery.sparkline.min.js',
        'resources/assets/template/admin/js/jquery.magnific-popup.min.js',
        'resources/assets/template/admin/js/tinymce.min.js',
        'resources/assets/template/admin/js/bootstrap-colorpicker.min.js',
        'resources/assets/template/admin/js/bootstrap-datepicker.js',
        'resources/assets/template/admin/js/select2.min.js',
        'resources/assets/template/admin/js/bootstrap-maxlength.min.js',
        'resources/assets/template/admin/js/bootstrap-filestyle.min.js',
        'resources/assets/template/admin/js/jquery.bootstrap-touchspin.min.js',
        'resources/assets/template/admin/js/jquery.dataTables.min.js',
        'resources/assets/template/admin/js/dataTables.bootstrap4.min.js',
        'resources/assets/template/admin/js/dataTables.buttons.min.js',
        'resources/assets/template/admin/js/buttons.bootstrap4.min.js',
        'resources/assets/template/admin/js/jszip.min.js',
        'resources/assets/template/admin/js/pdfmake.min.js',
        'resources/assets/template/admin/js/vfs_fonts.js',
        'resources/assets/template/admin/js/buttons.html5.min.js',
        'resources/assets/template/admin/js/buttons.print.min.js',
        'resources/assets/template/admin/js/buttons.colVis.min.js',
        'resources/assets/template/admin/js/dataTables.responsive.min.js',
        'resources/assets/template/admin/js/responsive.bootstrap4.min.js',
        'resources/assets/template/admin/js/morris.min.js',
        'resources/assets/template/admin/js/raphael-min.js',
        'resources/assets/template/admin/js/form-advanced.js',
        'resources/assets/template/admin/js/datatables.init.js',
        'resources/assets/template/admin/js/lightbox.js',
        //'resources/assets/template/admin/js/dashboard.js',
        'resources/assets/template/admin/js/app.js',
        'resources/assets/js/admin.js' // this .js file must be last
    ], 'public/js/admin.min.js');

mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/node_modules/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');
