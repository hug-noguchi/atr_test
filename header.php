<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

  <?php
  global $page, $paged;
  if (is_front_page()) : ?>
    <title> 『あなたらしく』 | 大阪・兵庫・奈良老人ホーム・高齢者施設紹介センター</title>
  <?php else : ?>
    <title><?php the_title(); ?> |  『あなたらしく』</title>
  <?php endif; ?>

  <?php $description = SCF::get( 'description' ); ?>
  <?php $keywords = SCF::get( 'keywords' ); ?>
  <meta name="description" content="<?php echo esc_html($description); ?> ">
  <meta name="keywords" content="<?php echo esc_html($keywords); ?>" />
  <!-- faviconの設定 -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png" sizes="180x180">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/android-touch-icon.png" sizes="192x192">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header>
    <div class="header">
      <div class="inner clearfix">
        <div class="header_box">
          <h1>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="『あなたらしく』  大阪・兵庫・奈良老人ホーム・高齢者施設紹介センター">
            </a>
          </h1>
          <div class="btn_service">
            <a href="https://www.bellco.co.jp/anatarasiku/"> 老人ホーム選びの<br class="sp">無料サポートサービス</a>
          </div>
        </div>
      <!--
        <div class="powered">
          <img src="<?php echo get_template_directory_uri(); ?>" alt="">
        </div>

        <ul class="sns">
          <li>
            <a href="" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sns_fb.png" alt="Facebook">
            </a>
          </li>
          <li>
            <a href="" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sns_tw.png" alt="Twitter">
            </a>
          </li>
        </ul>
      -->
      </div>
    </div>
    <nav>
      <div class="nav">
            <ul>
				<li><a href="<?php echo home_url(); ?>"><span>最新記事</span></a></li>
				<li><a href="<?php echo home_url(); ?>/knowledge/"><span>老人ホームの<br>きほん</span></a></li>
				<li><a href="<?php echo home_url(); ?>/qa/"><span>お悩み<br>Q&A</span></a></li>
				<li><a href="<?php echo home_url(); ?>/preparation/"><span>準備ガイド</span></a></li>
				<li><a href="<?php echo home_url(); ?>/guide/"><span>介護のあれこれ</span></a></li>
				<li><a href="<?php echo home_url(); ?>/healthcare/"><span>ヘルスケア<br>(雑学・エンタメ)</span></a></li>
            </ul>
        </div>
    </nav>
  </header>
