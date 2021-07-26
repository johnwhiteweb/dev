<?php

get_header();
// get_header('new-home');


while (have_posts()) {
  the_post(); ?>

  <div class="full_width new_page clearfix">
    <div class="in_1200">
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    </div>
  </div>
<?php } ?>

<?php
get_footer();
// get_footer('new2');

?>