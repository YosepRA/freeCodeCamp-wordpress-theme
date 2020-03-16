<?php get_header(); ?>

<h2 class="page-heading">All Projects</h2>

<section>
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
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
          <div class="card-meta">
            Posted by <?php the_author(); ?> on <?php the_time('F jS, Y'); ?>
          </div>
          <p>
            <?php echo wp_trim_words(get_the_excerpt(), 30) ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
        </div>
      </div>

  <?php
    endwhile;
  endif;
  ?>
</section>

<div class="pagination">
  <?php echo paginate_links(
    array(
      'prev_text' => '« Prev',
      'next_text' => 'Next »'

    )
  ); ?>
</div>

<?php get_footer(); ?>