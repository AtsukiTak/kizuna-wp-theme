<?php
/**
 * @package Kizuna
 */

get_header(); ?>

<div class="container">
  <div class="contents">

  <?php if(have_posts()): the_post(); ?>

  <article <?php post_class('article'); ?>>

    <!-- Generic information -->
    <div class="generic-info">
      <h1 class="pc-title <?php echo get_post_meta(get_the_ID(), 'color', true);?>">
        <?php the_title(); ?>
      </h1>
      <div class="generic-info-contents">

        <!-- Homepage information -->
        <?php if( get_post_meta(get_the_ID(), 'hp', true) != "" ) { ?>
        <?php $hp = get_post_meta(get_the_ID(), 'hp', true); ?>
        <p class="hp"><a target="_blank" rel="noopener noreferrer" href="<?php echo $hp ?>"><?php echo $hp ?></a></p>
        <?php } ?>

      </div>
    </div>

    <!-- Contents -->
    <div class="main-content">
    <?php the_content(); ?>
    </div>

    <h1 class="mobile-title <?php echo get_post_meta(get_the_ID(), 'color', true);?>">
    <?php the_title(); ?>
    </h1>

  </article>

  <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>
