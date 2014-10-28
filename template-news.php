<?php
/*
Template Name: News
*/
/**
* The template for displaying posts in a timeline.
*/

  $context = Timber::get_context();
  $context['page'] = Timber::get_post();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => [$home_id]
  );
  $context['pages'] = Timber::get_posts($args);
  $args=array(
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'date'
  );
  $context['posts'] = Timber::get_posts($args);
  $templates = array('page-{{slug}}.twig');
  Timber::render($templates, $context);
  Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

?>