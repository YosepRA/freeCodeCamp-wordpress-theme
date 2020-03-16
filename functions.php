<?php

// Adding CSS and JS files.
function gt_setup()
{
  wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  wp_enqueue_style('style', get_stylesheet_uri());

  wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/da8b41aad6.js');
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'gt_setup');

// Adding theme supports.
function gt_init()
{
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5', array(
    'comment-list', 'comment-form', 'search-form'
  ));
}
add_action('after_setup_theme', 'gt_init');

// Project post type.

function gt_custom_post_type()
{
  register_post_type('project', array(
    'rewrite' => array('slug' => 'projects'),
    'labels' => array(
      'name' => 'Projects',
      'singular_name' => 'Project',
      'add_new_item' => 'Add New Project',
      'edit_item' => 'Edit Project'
    ),
    'menu-icon' => 'dashicons-clipboard',
    'public' => true,
    'has_archive' => true,
    'supports' => array(
      'title', 'thumbnail', 'editor', 'excerpt', 'comments'
    )
  ));
}
add_action('init', 'gt_custom_post_type');

// Filter to move comment field to bottom.
function prefix_move_comment_field_to_bottom($fields)
{
  $comment_field = $fields['comment'];
  $cookies_field = $fields['cookies'];

  unset($fields['comment']);
  unset($fields['cookies']);

  $fields['comment'] = $comment_field;
  $fields['cookies'] = $cookies_field;;
  return $fields;
}
add_filter('comment_form_fields', 'prefix_move_comment_field_to_bottom', 10, 1);

// Remove certain comment field.
function remove_website_field($fields)
{
  unset($fields['url']);
  unset($fields['cookies']);
  return $fields;
}
add_filter('comment_form_default_fields', 'remove_website_field');

// Sidebar
function gt_widgets()
{
  register_sidebar(
    array(
      'name' => 'Main Sidebar',
      'id' => 'main-sidebar',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );
}
add_action('widgets_init', 'gt_widgets');

// Search filter
function search_filter($query)
{
  if ($query->is_search()) {
    $query->set('post_type', array('post', 'project'));
  }
}
add_filter('pre_get_posts', 'search_filter');
