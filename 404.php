<?php get_header(); ?>

<div class="no-result">
  <h2 class="page-heading">Oh dear.. The 404 is here.</h2>
  <div class="random-image">
    <img src="http://source.unsplash.com/640x480/?cats" alt="Random images">
  </div>
  <h3>Sorry friend, there is nothing in here.</h3>
  <h3>Check out these instead.</h3>
  <ul>
    <li>
      <a href="<?php echo site_url('/blog') ?>">Blogs list</a>
    </li>
    <li>
      <a href="<?php echo site_url('/projects') ?>">Projects list</a>
    </li>
  </ul>
</div>

<?php get_footer(); ?>