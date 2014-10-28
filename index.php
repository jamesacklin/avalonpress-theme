<?php
  $context = Timber::get_context();

  // The current page object is page
  $context['page'] = Timber::get_post();

  // The sites' pages are contained in the object 'page'
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => [$home_id]
  );
  $context['pages'] = Timber::get_posts($args);

  // Stores, as defined by the custom post type
  $context['stores'] = Timber::get_posts('post_type=store&order=ASC&orderby=menu_order');

  // Use index.twig by default...
  $templates = array('index.twig');
  // ... but render home.twig if we're on the home page.
  if (is_front_page()){
    array_unshift($templates, 'home.twig');
  }

  Timber::render($templates, $context);
?>