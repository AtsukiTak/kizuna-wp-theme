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

        <div class="crypto-infos">

          <!-- Bitcoin information -->
          <?php if( get_post_meta(get_the_ID(), 'btc_addr', true) != "") { ?>
          <?php $addr = get_post_meta(get_the_ID(), 'btc_addr', true); ?>
          <div class="crypto-info" id="btc-info" addr="<?php echo $addr; ?>">
            <h4>Bitcoin</h4>
            <p>Supporters : <span id="supporters-btc">0</span></p>
            <p>Donated : <span id="donated-btc">0</span> mBTC</p>
            <div class="qrcode" text="<?php echo $addr; ?>"></div>
            <p class="addr"><?php echo $addr; ?></p>
            <a target="_blank" rel="noopener noreferrer" href="https://blockexplorer.com/address/<?php echo $addr; ?>">Watch the history</a>
          </div>
          <?php } ?>

          <!-- BitcoinCash information -->
          <?php if( get_post_meta(get_the_ID(), 'bch_addr', true) != "") { ?>
          <?php $addr = get_post_meta(get_the_ID(), 'bch_addr', true); ?>
          <div class="crypto-info" id="bch-info" addr="<?php echo $addr; ?>">
            <h4>BitcoinCash</h4>
            <p>Supporters : <span id="supporters-bch">0</span></p>
            <p>Donated : <span id="donated-bch">0</span> mBTC</p>
            <div class="qrcode" text="<?php echo $addr; ?>"></div>
            <p class="addr"><?php echo $addr; ?></p>
            <a target="_blank" rel="noopener noreferrer" href="https://explorer.bitcoin.com/bch/address/<?php echo $addr; ?>">Watch the history</a>
          </div>
          <?php } ?>

        </div>

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
