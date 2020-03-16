<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php wp_head(); ?>
</head>

<body>
  <div id="slideout-menu">
    <ul>
      <li>
        <a href="<?php echo site_url(); ?>">Home</a>
      </li>
      <li>
        <a href="<?php echo site_url('/blog'); ?>">Blog</a>
      </li>
      <li>
        <a href="<?php echo site_url('/projects'); ?>">Projects</a>
      </li>
      <li>
        <a href="<?php echo site_url('/about'); ?>">About</a>
      </li>
      <div class="searchbox-slide-menu">
        <?php get_search_form(); ?>
      </div>
    </ul>
  </div>

  <nav>
    <div id="logo-img">
      <a href="<?php echo site_url(); ?>">
        <img src="<?php echo (get_template_directory_uri() . '/img/logo.png') ?>" alt="GTCoding Logo" />
      </a>
    </div>

    <div id="menu-icon">
      <i class="fas fa-bars"></i>
    </div>

    <ul>
      <li>
        <a href="<?php echo site_url(); ?>" class="<?php if (is_front_page()) echo 'active'; ?>">Home</a>
      </li>
      <li>
        <a href="<?php echo site_url('/blog'); ?>" class="<?php if (get_post_type() == 'post') echo 'active'; ?>">Blog</a>
      </li>
      <li>
        <a href="<?php echo site_url('/projects'); ?>" class="<?php if (get_post_type() == 'project') echo 'active'; ?>">Projects</a>
      </li>
      <li>
        <a href="<?php echo site_url('/about'); ?>" class="<?php if (is_page('about')) echo 'active' ?>">About</a>
      </li>
      <li>
        <div id="search-icon">
          <i class="fas fa-search"></i>
        </div>
      </li>
    </ul>
  </nav>

  <div id="searchbox">
    <?php get_search_form(); ?>
  </div>

  <?php if (!is_front_page()) echo '<main>'; ?>