<?php get_header(); ?>

<style>
  #wrapper {
    display: block!important;
  }
  #left {
      margin-right: 0!important;
  }
  .wsp-posts-title {
    display: none;
  }
  .wsp-category-title {
    text: none;
  }
  .home-item a,
  .wsp-posts-list li .wsp-category-title a {
    background-color: #faf8f2;
    text-indent: 0;
    display: block;
    padding: 3px 5px 2px;
    border: solid 1px #cacaca;
  }
  .home-item,
  .wsp-posts-list li {
    padding: 0;
    margin: 1.5em 0;
    list-style-type: none;
  }
  .wsp-posts-list .wsp-post {
    background: url(img/ico_level_2.png) no-repeat 0 0.5em;
    margin: 0.7em 0 0.7em 30px;
    padding: 0 0 0 25px;
  }
  .wsp-posts-list .wsp-post a {
    background: none;
    display: inline;
    padding: 0;
    border: none;
  }
</style>
<main>
  <div id="wrapper" class="clearfix">
    <div id="breadcrumb" class="breadcrumb_toukou">
      <ul>
        <li><a href="<?php echo home_url(); ?>">あなたらしく</a></li>
      </ul>
    </div>
    <div id="left">
      <div id="pageTtl" class="ttl">
      </div>
      <div class="home-item">
        <a href="<?php echo home_url(); ?>">あなたらしく</a>
      </div>
      <?php if(have_posts()): ?>
      <?php while(have_posts()):the_post(); ?>
      <div>
        <?php the_content(); ?>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>

<?php get_footer(); ?>
