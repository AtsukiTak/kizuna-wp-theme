<?php
/**
 * @package Kizuna
 */

get_header(); ?>

<div class="container">
  <div class="contents">

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

    <article <?php post_class('article-index'); ?>>
      <a href="<?php the_permalink(); ?>">

      <!-- Contents -->
      <div class="index-contents">
        <h2 class="article-title <?php echo get_post_meta(get_the_ID(), 'color', true);?>">
          <?php the_title(); ?>
        </h2>
        <?php the_excerpt(); ?>
      </div>

      <!-- Thumbnail -->
      <div class="thumbnail">
      <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="no-img"/>
      <?php endif; ?>
      </div>

      </a>
    </article>

    <?php endwhile; endif; ?>

    <div class="pagination">
      <?php echo paginate_links( array(
        'type' => 'list',
        'mid_size' => '1',
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
      )); ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
