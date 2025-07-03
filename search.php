<?php get_header(); ?>

<?php
$searchStr = $_GET['s'];

$setPostView = 10;
if(isset($_GET['cnt'])){
	$getPage = preg_replace("/[^0-9]/","",$_GET['cnt']);
	$setPostOffset = ($getPage*$setPostView)-$setPostView;
}else{$getPage=1;$setPostOffset=0;}

?>

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
        <li><a href="<?php echo esc_url(home_url('/')); ?>">あなたらしく</a></li>
        <li>検索：『<?php the_search_query(); ?>』</li>
      </ul>
    </div>

    <div id="left">
      <div id="searchTtl" class="ttl">
        <h2>
          『<?php the_search_query(); ?>』に関するトピック
        </h2>
      </div>

      <div id="list">
        <ul class="listMain clearfix">
          <?php
          if (have_posts() && get_search_query()) :
          while (have_posts()) :
          the_post();
          get_template_part( 'template-parts/post/content', 'excerpt' );
          endwhile;
          ?>
          <li class="clearfix">
            <div class="listImage">
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ): ?>
              <?php echo the_post_thumbnail(); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/blank_img.jpg" alt="<?php get_the_title(); ?>">
              <?php endif; ?>
            </a>
            </div>
            <div class="listText">
              <p class="listTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <p class="listExcept"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_content(),30, '…' ); ?></a></p>
              <p class="listBtn"><a href="<?php the_permalink(); ?>" class="txthide">続きを読む</a></p>
            </div>
          </li>
        </ul>
        <?php else: ?>
          <p>表示できる情報はありません。</p>
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
