<?php get_header(); ?>

<div id="banner">
  <h1>&lt;GTCoding/&gt;</h1>
  <h3>Learn coding from scratch</h3>
</div>

<main>
  <a href="<?php echo site_url('/blog'); ?>">
    <h2 class="section-heading">All Blogs</h2>
  </a>

  <section>
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 2
    );
    $blogposts = new WP_Query($args);

    if ($blogposts->have_posts()) :
      while ($blogposts->have_posts()) :
        $blogposts->the_post();
    ?>
        <div class="card">
          <div class="card-image">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo the_post_thumbnail_url() ?>" alt="Card Image" />
            </a>
          </div>

          <div class="card-description">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <p>
              <?php echo wp_trim_words(get_the_excerpt(), 30) ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
          </div>
        </div>

    <?php
      endwhile;
    endif;
    // It's a good practice to reset the query once you're done with it.
    wp_reset_query();
    ?>
  </section>

  <h2 class="section-heading">All Projects</h2>
  <section>
    <?php
    $args = array(
      'post_type' => 'project',
      'posts_per_page' => 2
    );
    $projects = new WP_Query($args);

    if ($projects->have_posts()) :
      while ($projects->have_posts()) :
        $projects->the_post();
    ?>
        <div class="card">
          <div class="card-image">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo the_post_thumbnail_url() ?>" alt="Card Image" />
            </a>
          </div>

          <div class="card-description">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <p>
              <?php echo wp_trim_words(get_the_excerpt(), 30) ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
          </div>
        </div>

    <?php
      endwhile;
    endif;

    wp_reset_query();
    ?>
  </section>

  <h2 class="section-heading">Source Code</h2>
  <section id="section-source">
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non earum
      dignissimos quos, ducimus repellat aliquam placeat veniam asperiores
      obcaecati possimus, consectetur mollitia nam deleniti voluptatibus
      eum! Praesentium consequatur repudiandae officia!
    </p>
    <a href="#" class="btn-readmore">GitHub Profile</a>
  </section>

  <?php get_footer(); ?>