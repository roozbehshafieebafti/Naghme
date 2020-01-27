const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function(mix){
    mix.styles([
        './resources/assets/css/bootstrap.min.css',
        './resources/assets/css/Admin.css',
        './resources/assets/css/all.min.css',
        './resources/assets/css/jquery-ui.min.css',
        './resources/assets/css/templatemo-style.css',
        './resources/assets/css/home.css',
        './resources/assets/css/header.css',
        './resources/assets/css/footer.css',
        './resources/assets/css/history.css',
        './resources/assets/css/chart.css',
        './resources/assets/css/ethics.css',
        './resources/assets/css/regulation.css',
        './resources/assets/css/form.css',
        './resources/assets/css/authorities.css',
        './resources/assets/css/news.css',
        './resources/assets/css/newsReadMore.css',
        './resources/assets/css/pagination.css',
        './resources/assets/css/representation.css',
        './resources/assets/css/readMoreRepresentation.css',
        './resources/assets/css/membership.css',
        './resources/assets/css/search.css',
        './resources/assets/css/activities.css',
        './resources/assets/css/activity.css',
        './resources/assets/css/allActivities.css',
        './resources/assets/css/login.css',
        './resources/assets/css/register.css',
        './resources/assets/css/forget.css',
        './resources/assets/css/recalls.css',
    ],'public/css/app.css')

    mix.scripts([
        // './resources/assets/js/jquery.min.js',
        // './resources/assets/js/bootstrap.min.js',
        './resources/assets/js/jquery-ui.min.js',
        './resources/assets/js/popper.min.js',
        './resources/assets/js/all.min.js',
        './resources/assets/js/sweetalert.min.js',
        './resources/assets/js/Main/home.js',
        './resources/assets/js/Main/register.js',
        './resources/assets/js/Main/pagination.js',
        './resources/assets/js/Main/activity.js',
        './resources/assets/js/Main/recalls.js'
    ],'public/js/main.js')
})