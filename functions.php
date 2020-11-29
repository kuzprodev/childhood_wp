<?php
add_action('wp_enqueue_scripts', 'childhood_styles');
add_action('wp_enqueue_scripts', 'childhood_scripts');

function childhood_styles()
{
    wp_enqueue_style('childhood-style', get_stylesheet_uri());
    // wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/styles/main.min.css' );
    // wp_enqueue_style('cdn-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');
};

function childhood_scripts()
{
    wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
    // wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
    wp_deregister_script('jquery'); //отключаем стандартный джиквери от вп
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'); //регистрируем свою версию джиквери
    wp_enqueue_script('jquery'); //подключаем свою версию джиквери
};

add_theme_support('custom-logo'); // активация логотипа кастомного
add_theme_support('post-thumbnails'); //включить изображение записи метки в записях
add_theme_support('menus'); //активируем меню
// и в внешний вид настройки темы создать меню
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link__attributes', 10, 3);
function filter_nav_menu_link__attributes($atts, $item, $args)
{
    if ($args->menu === 'Main') {
        $atts['class'] = 'header__nav-item';

        if ($item->current) { //если текущая стр на которой мы находимся является активной, то мы берем эту ссылку и назначаем новый класс
            $atts['class'] .= ' header__nav-item-active';
        }
        // print_r($item); //id это индексатор который меняется в каждом сайте конечно, но тут для необходимой стр он 188
        if ($item->ID === 188 && (in_category('soft_toys') || in_category('edu_toys'))) {
            $atts['class'] .= ' header__nav-item-active';
        }
    };
    return $atts; //возвращаем измененные атрибуты
};

function my_acf_google_map_api($api)
{

    $api['key'] = 'your-key'; // Ваш ключ Google API

    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
