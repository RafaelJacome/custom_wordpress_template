<?php

function myFiles() {
  wp_enqueue_style( 'customStyles', get_stylesheet_uri() );
  wp_enqueue_script( 'customScript', get_template_directory_uri().'/dist/js/script.min.js');
  wp_enqueue_script( 'autocompleteui', get_template_directory_uri().'/vendors/js/jquery-ui-autocomplete.js');
  wp_enqueue_script( 'autocomplete', get_template_directory_uri().'/vendors/js/jquery.select-to-autocomplete.min.js');
  
}
add_action( 'wp_enqueue_scripts', 'myFiles' );



function the_breadcrumbs() {
    if (!is_home()) {
        echo '<a href="/">Inicio</a> / ';
        if (is_category() || is_single() || is_page()) {
            if(is_category()){
                $category = get_the_category();
                echo $category[0]->cat_name;
            }else{
                the_category(' - ');
            }if(is_page()) {
                echo the_title();
            }if (is_single()) {
                echo " / ";
                the_title();
            }
        }
    }
}