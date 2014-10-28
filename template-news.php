<?php
/*
Template Name: News
*/
/**
 * The template for displaying locations as a level page.
 *
 * We echo all the locations out on the main page, but for this page,
 * we want a different layout, and to include maps.
 */

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

  // The sites' posts are contained in the object 'posts'
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