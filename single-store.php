<?php
  $context = Timber::get_context();
  $context['store'] = Timber::get_post();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => array(4)
  );
  $context['pages'] = Timber::get_posts($args);
  $templates = array('single-store.twig');
  Timber::render($templates, $context);
?>