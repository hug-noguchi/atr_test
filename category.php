<?php get_header(); ?>
<style>
  #wrapper {
      display: block!important;
  }
  #left {
    margin-right: 0!important;
  }
</style>

<main>
  <div id="wrapper" class="clearfix">
    <div id="breadcrumb" class="breadcrumb_toukou">
      <ul>
        <li><a href="<?php echo home_url(); ?>">あなたらしく</a></li>
        <li><?php the_category(); ?></li>
      </ul>
    </div>
    <div id="left">
      <div id="catTtl" class="ttl <?php echo get_the_category()[0]->slug; ?>">
        <h2>
          <?php $category = get_the_category(); $cat_name = $category[0]->cat_name; echo $cat_name; ?>
        </h2>
        <p>
          <?php echo category_description(); ?>
        </p>
      </div>

      <div id="list">
        <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>
        <ul class="listMain clearfix">
          <li class="clearfix">
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
        </ul>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div id="pagenation">
        <ul class="page-numbers">
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
