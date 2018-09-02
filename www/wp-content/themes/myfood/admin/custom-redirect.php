<?php
function custom_redirect(){

    global $post;

    $template = get_page_template_slug($post->ID);

    if($template == "template-redirect.php"){
        $redirect = get_field( 'redirect', $post->ID );
        if($redirect){
            wp_redirect($redirect);
        }else{
            wp_redirect(home_url());
        }
        exit();
    }

}
add_action( 'template_redirect', 'custom_redirect' );
