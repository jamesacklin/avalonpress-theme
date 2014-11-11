<?php
/*
Template Name: News
*/
/**
* The template for displaying posts in a timeline.
*/
  global $paged;
  if (!isset($paged) || !$paged){
    $paged = 1;
  }
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
  $args=array(
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'date',
    'posts_per_page' => 5,
    'paged' => $paged
  );
  query_posts($args);
  $context['posts'] = Timber::get_posts();
  $context['pagination'] = Timber::get_pagination();
  $templates = array('page-{{slug}}.twig');
  Timber::render($templates, $context);
  Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

?>