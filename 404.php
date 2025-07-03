<?php
global $SYS_GLOBAL;

$SYS_GLOBAL['HTML_META_DESCRIPTION'] = "404.php";
$SYS_GLOBAL['HTML_META_TITLE'] = "404 FILE NOT FOUND";

?>

<?php get_header(); ?>

<div id="notfound">
  <h2>ページが見つかりません</h2>
  <p>404 FILE NOT FOUND<br>
  アクセスされたページは一時的にアクセスできないか、移動もしくは削除された可能性があります。</p>
</div>

<?php get_footer(); ?>
