<?php
  $context = Timber::get_context();
  $context['page'] = Timber::get_post();
  $context['stores'] = Timber::get_posts('post_type=store');
  $templates = array('index.twig');
  if (is_front_page()){
    array_unshift($templates, 'home.twig');
  }
  Timber::render($templates, $context);
?>