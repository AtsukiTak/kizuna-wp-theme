<?php
/**
 * @package Kizuna
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head prefix="og: http://ogp.me/ns#">

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/webclipicon.png">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho&amp;subset=japanese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/earlyaccess/mplus1p.css" rel="stylesheet" />

  <!-- For single or page contents -->
  <?php if( is_single() || is_page() ): ?>
  <meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
  <?php if( has_post_thumbnail() ): ?>
  <?php $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
  <meta property="og:image" content="<?php echo $postthumb[0]; ?>">
  <?php endif; ?>

  <!-- For top page contents -->
  <?php else: ?>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
  <?php
  $http = is_ssl() ? 'https://' : 'http://';
  $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  ?>
  <meta property="og:url" content="<?php echo $url; ?>">
  <meta property="og:description" content="<?php bloginfo( 'description' ) ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/ogp-thumbnail.png">
  <?php endif; ?>



	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-inner">
    <div class="site-title">
      <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    </div>
    
    <!-- Menu button -->
    <button type="button" id="navbutton">
      <img src="<?php echo get_template_directory_uri() ?>/genericons/svg-min/menu.svg">
    </button>

  </div>

  <!-- Header nav menu -->
  <?php
  wp_nav_menu( array(
    'theme_location' => 'header-nav',
    'container' => 'nav',
    'container_class' => 'header-nav',
    'container_id' => 'header-nav',
    'fallback_cb' => ''
  ));
  ?>

</header>
