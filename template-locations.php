<?php
/*
Template Name: Locations
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


  // Stores, as defined by the custom post type
  $context['stores'] = Timber::get_posts('post_type=store&order=ASC&orderby=menu_order');

  $templates = array('page-{{slug}}.twig');
  Timber::render($templates, $context);

  Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);



?>