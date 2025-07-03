<?php get_header(); ?>

<main>
  <div id="wrapper">
    <div id="left">
      <div id="list">



      <ul class="listMain">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <li>

          <div class="listImage">
            <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ): ?>
                <?php echo the_post_thumbnail(); ?>
                <?php else: ?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blank_img.jpg" alt="<?php get_the_title(); ?>">
                <?php endif; ?>

            </a>
            </div>
            <div class="listText">
              <p class="listTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <p class="listExcept"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_content(), 30, '…' ); ?></a></p>
              <p class="listBtn"><a href="<?php the_permalink(); ?>" class="txthide">続きを読む</a></p>
            </div>
          </li>




  <?php endwhile; ?>
<?php else : ?>
  <div class="error">
    <p>お探しの記事は見つかりませんでした。</p>
  </div>
<?php endif; ?>

</ul>

</div>

      <div id="pagenation">
        <ul>
          <?php
            the_posts_pagination(
              array(
                'prev_text' => '<span class="sr-only">&lt;</span>',
                'next_text' => '<span class="sr-only">&gt;</span>',
              )
            );
          ?>
        </ul>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>

<?php get_footer(); ?>
