<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
  $context = Timber::get_context();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => array(4)
  );
  $context['pages'] = Timber::get_posts($args);
  Timber::render('404.twig', $context);