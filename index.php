<?php get_header(); ?>

<div class="mainslider glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <?php
            // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => -1,
                'category_name'    => 'slider',
                'orderby'     => 'date',
                'order'       => 'ASC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <li style="background-image: url('<?php the_field('slider_image'); ?>')" class="glide__slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 offset-1">
                                <h2 style="<?php
                                            $field = get_field('slider_color');
                                            if ($field == 'white') {
                                            ?>
                                    color:#fff;                                    
                                    <?php }; ?>" class="slider__title"><?php the_title(); ?></h2>
                                <?php
                                $field = get_field('slider_btn');
                                if ($field == 'on') {
                                ?>
                                    <a href="<?php the_field('slider_link') ?>" class="button">Узнать больше</a>
                                <?php }; ?>
                            </div>
                        </div>
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.982942 13.3923L12.2253 24.631C12.7186 25.123 13.5179 25.123 14.0124 24.631C14.5057 24.1389 14.5057 23.3397 14.0124 22.8476L3.66178 12.5007L14.0112 2.15378C14.5045 1.66172 14.5045 0.862477 14.0112 0.369169C13.5179 -0.122894 12.7174 -0.122894 12.2241 0.369169L0.981696 11.6077C0.495966 12.0947 0.495966 12.9065 0.982942 13.3923Z" fill="white" />
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.0171 11.6077L2.77467 0.369029C2.28137 -0.123032 1.48213 -0.123032 0.987571 0.369029C0.494263 0.861093 0.494264 1.66033 0.987572 2.15239L11.3382 12.4993L0.98882 22.8462C0.495512 23.3383 0.495512 24.1375 0.98882 24.6308C1.48213 25.1229 2.28261 25.1229 2.77592 24.6308L14.0183 13.3923C14.504 12.9053 14.504 12.0935 14.0171 11.6077Z" fill="white" />
                            </svg>
                        </button>
                    </div>
                </li>
            <?php };
            wp_reset_postdata(); // сброс
            ?>
        </ul>
    </div>
</div>

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                <div class="about__img">
                    <img src="<?php the_field('about_img'); ?>" alt="про компанию">
                </div>
            </div>
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                <h1 class="title underlined"><?php the_field('about_title'); ?></h1>
                <div class="about__text">
                    <?php the_field('about_descr'); ?>
                </div>
                <a href="#" class="button">Узнать больше</a>
            </div>
        </div>
    </div>
</div>







<?php
// function print_hello ($text , $name){
//     echo 'Hello world' . $text . ' ' . $name;
// };
// function print_hello_1 (){
//     echo 'Hello world_1' . '<br>';
// };
// function print_hello_2 (){
//     echo 'Hello world_2' . '<br>';
// };
// add_action('my_hook', 'print_hello', 10, 2);
// add_action('my_hook', 'print_hello', 15);
// add_action('my_hook', 'print_hello_1', 10);
// add_action('my_hook', 'print_hello_2', 5);
// do_action('my_hook', 'dear customer', ' Kostyan');


// function my_filter_function($str)
// {
//     return 'Hello' . $str . '<br>';
// };
// add_filter('my_filter', 'my_filter_function', 15);

// echo apply_filters('my_filter', 'World');
// remove_filter('my_filter', 'my_filter_function', 15);
// echo apply_filters('my_filter', 'World');

// remove_action($tag, $function_to_remove, $priority);

// add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
// function filter_nav_menu_link_attributes($atts, $item, $args){
//     if($args->menu === 'Main' ) {
//         $atts['class'] .= ' header__nav-item-active';
// };
// if($item->ID === 106 && (in_category( 'soft_toys' ) || in_category( 'edu_toys' ))){
//     $attr['class'] .= ' header__nav-item-active';
// }
// }
// return $atts;
// https://wp-kama.ru/hook/nav_menu_link_attributes



?>


<?php
get_footer();
?>