<?php
$queried_object = get_queried_object();

$id = isset($queried_object->term_id) ? $queried_object->term_id : $queried_object->ID;

if(term_exists($id, 'product_cat')){
    get_template_part('template-shop-list');
}else{
    get_template_part('template-shop-home');
}
