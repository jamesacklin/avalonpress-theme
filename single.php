<?php
  $context = Timber::get_context();
  $context['post'] = Timber::get_post();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => [$home_id]
  );
  $context['pages'] = Timber::get_posts($args);
  $templates = array('single.twig');
  Timber::render($templates, $context);
?>