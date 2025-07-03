<div id="right">

  <div id="sidelist">
    <div id="popular" class="sidebox">
      <h3>
        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_popular.png" alt="人気の記事">人気の記事
      </h3>
      <?php 
if (function_exists('wpp_get_mostpopular')) {
  $arg = array (
    'range' => 'daily',
    'order_by' => 'views',
    'post_type' => 'post,page',
    'title_length' => '25',
    'limit' => 5, 
    'thumbnail_width' => '100',
    'thumbnail_height' => '100',
    'stats_category' => 1,
    'post_html' => '<li><div class="listImage">{thumb}</div>
      <p class="listTitle"><a href="{url}">{title}</a></p></li>'
  );

  echo '<ul class="listSide">';
    wpp_get_mostpopular($arg);
  echo '</ul>';  
}
?>     
    </div>

    <div id="pickup" class="sidebox">
      <h3>
        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_pickup.png" alt="ピックアップ">ピックアップ
      </h3>
      <ul class="listSide">
      <?php
        $args = array(
          'post_type' => 'post',
          'meta_key' => 'post_pickup',
          'meta_value' => 'check',
          'meta_compare' => 'LIKE',
          'posts_per_page' => 5 );

          $my_query = new WP_Query($args);
        ?>
        <?php if($my_query->have_posts()): ?>
	          <?php while($my_query->have_posts()): $my_query->the_post(); ?>
	　        <li>
              <div class="listImage">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ): ?>
                    <?php echo the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blank_thumb.jpg" alt="<?php get_the_title(); ?>">
                  <?php endif; ?>
                </a>
              </div>
              <p class="listTitle">
                <a class="wpp-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </p>
            </li>
	      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
  </div>
</div>
