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
  $context['page'] = Timber::get_post();
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => array(4)
  );
  $context['pages'] = Timber::get_posts($args);
  $context['avalon_stores'] = Timber::get_posts('post_type=store&order=ASC&orderby=menu_order&category_name=\'Avalon Exchange\'');
  $context['reddz_stores'] = Timber::get_posts('post_type=store&order=ASC&orderby=menu_order&category_name=\'Reddz Trading\'');
  $templates = array('page-{{slug}}.twig');
  Timber::render($templates, $context);
  Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

?>