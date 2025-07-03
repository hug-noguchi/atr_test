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
        <li><?php the_title(); ?></li>
      </ul>
    </div>

    <?php if(have_posts()):while(have_posts()):the_post(); ?>

    <div id="left">
      <div id="post">

        <h1 class="title"><?php the_title(); ?></h1>
        <p class="date"><?php the_date(); ?></p>

        <!--<?php get_template_part('sns'); ?>-->

        <div class="eyecatch">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/blank_img.jpg" alt="<?php the_title(); ?>">
          <?php endif; ?>
        </div>

        <div class="content">
          <?php the_content(); ?>
        </div>

        <?php endwhile;else: ?>
        <?php endif; ?>

        <!--<?php get_template_part('sns'); ?>-->
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>

<?php get_footer(); ?>
