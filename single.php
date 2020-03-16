<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>

  <h2 class="page-heading"><?php the_title(); ?></h2>

  <div id="post-container">
    <section id="blogpost">
      <div class="card">
        <div class="card-meta-blogpost">
          Posted by <?php the_author(); ?> on <?php the_time('F jS, Y') ?>
          <?php if (get_post_type() == 'post') : ?>
            in <?php echo get_the_category_list(', '); ?>
          <?php endif; ?>
        </div>

        <?php if (has_post_thumbnail()) : ?>
          <div class="card-image">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="Featured image" />
          </div>
        <?php endif; ?>

        <div class="card-description">
          <?php the_content(); ?>
        </div>
      </div>

      <div id="comments-section">
        <?php
        comment_form();

        $comments_number = get_comments_number();
        if ($comments_number != 0) :
        ?>

          <div class="comments">
            <h3>What others say</h3>

            <ol class="all-comments">
              <?php
              $comments = get_comments(array(
                'post_id' => $post->ID,
                'status' => 'approve'
              ));
              wp_list_comments(array(
                'per_page' => 15
              ), $comments);
              ?>
            </ol>
          </div>

        <?php endif; ?>
      </div>
    </section>

    <!-- Post endif; -->
  <?php endif; ?>

  <aside id="sidebar">
    <?php dynamic_sidebar('main-sidebar'); ?>
  </aside>
  </div>



  <?php get_footer(); ?>