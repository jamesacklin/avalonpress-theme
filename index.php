<?php
  $context = Timber::get_context();
  $context['page'] = Timber::get_post();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => array(4)
  );
  $context['pages'] = Timber::get_posts($args);
  $context['avalon_stores'] = Timber::get_posts('post_type=store&order=ASC&orderby=menu_order&category_name=\'Avalon Exchange\'');
  $templates = array('index.twig');
  if (is_front_page()){
    array_unshift($templates, 'home.twig');
  }
  Timber::render($templates, $context);
?>