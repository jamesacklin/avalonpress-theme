<?php
  $context = Timber::get_context();
  $context['page'] = Timber::get_post();
  $templates = array('index.twig');
  if (is_front_page()){
    array_unshift($templates, 'home.twig');
  }
  Timber::render($templates, $context);
?>