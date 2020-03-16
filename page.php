<?php get_header(); ?>

<?php
if (have_posts()) : the_post();
?>

  <h2 class="page-heading"><?php the_title(); ?></h2>

  <div id="post-container">
    <section id="blogpost">
      <div class="card">
        <?php if (has_post_thumbnail()) : ?>
          <div class="card-image">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Card Image" />
          </div>
        <?php endif; ?>

        <div class="card-description">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <aside id="sidebar">
      <?php dynamic_sidebar('main-sidebar'); ?>
    </aside>
  </div>

<?php endif; ?>

<?php get_footer(); ?>