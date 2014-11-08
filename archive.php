<?php
  $context = Timber::get_context();
  $home_id = url_to_postid('/home');
  $args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => array(4)
  );
  $context['pages'] = Timber::get_posts($args);
  $news_id = url_to_postid('/news');
  $context['newspage'] = Timber::get_post($news_id);
  $context['title'] = 'Archive';
  if (is_day()){
    $context['title'] = 'Archive: '.get_the_date( 'D M Y' );
  } else if (is_month()){
    $context['title'] = 'Archive: '.get_the_date( 'M Y' );
  } else if (is_year()){
    $context['title'] = 'Archive: '.get_the_date( 'Y' );
  } else if (is_tag()){
    $context['title'] = single_tag_title('', false);
  } else if (is_category()){
    $context['title'] = single_cat_title('', false);
    array_unshift($templates, 'archive-'.get_query_var('cat').'.twig');
  } else if (is_post_type_archive()){
    $context['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'archive-'.get_post_type().'.twig');
  }
  $context['posts'] = Timber::get_posts();
  $templates = array('archive.twig');
  Timber::render($templates, $context);
  Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);
?>