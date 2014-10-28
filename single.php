<?php
  $context = Timber::get_context();

  // The current post object is post
  $context['post'] = Timber::get_post();

  // The sites' pages are contained in the object 'page'
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => [$home_id]
  );
  $context['pages'] = Timber::get_posts($args);

  // Use single.twig
  $templates = array('single.twig');

  Timber::render($templates, $context);
?>