<?php
/**
 * Kizuna functions and definitions
 *
 * @package Kizuna
 */

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
  require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'kizuna_setup' ) ) :
function kizuna_setup() {

  register_nav_menu( 'header-nav', 'Header navigation bar' );
  register_nav_menu( 'footer-nav', 'Footer navigation bar' );


  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'custom-logo', array(
    'height'      => 248,
    'width'       => 248,
    'flex-height' => true,
  ) );

}
endif; // kizuna_setup
add_action( 'after_setup_theme', 'kizuna_setup' );

/**
 * Enqueue scripts and styles.
 */
function kizuna_scripts() {
  wp_enqueue_style('kizuna-style', get_stylesheet_uri());
  wp_enqueue_script('kizuna-script', get_template_directory_uri().'/js/functions.js', array('jquery'));
  wp_enqueue_script('qrcode', get_template_directory_uri().'/js/qrcode.min.js');
}
add_action( 'wp_enqueue_scripts', 'kizuna_scripts' );

/**
 * Custom field box
 */
function add_custom_fields() {
  add_meta_box('donation_infos', 'Another', 'insert_meta_fields', 'post', 'normal');
}
add_action('admin_menu', 'add_custom_fields');

function insert_meta_fields() {
  global $post;

  $current_color = get_post_meta($post->ID, 'color', true);
  if ($current_color == "") {
    $current_color = "red";
  }
  echo '<h4>Color</h4>';
  insert_radio_input("color", "red", $current_color);
  insert_radio_input("color", "blue", $current_color);
  insert_radio_input("color", "green", $current_color);
  insert_radio_input("color", "yellow", $current_color);

  echo '<hr>';

  $current_lang = get_post_meta($post->ID, 'lang', true);
  if ($current_lang == "") {
    $current_lang = "ja";
  }
  echo '<h4>Language</h4>';
  insert_radio_input("lang", "ja", $current_lang);
  insert_radio_input("lang", "en", $current_lang);

  echo '<hr>';

  $current_btc_addr = get_post_meta($post->ID, 'btc_addr', true);
  echo '<h4>Bitcoin address</h4>';
  insert_address_input("btc_addr", $current_btc_addr);

  echo '<hr>';

  $current_bch_addr = get_post_meta($post->ID, 'bch_addr', true);
  echo '<h4>BitcoinCash address</h4>';
  insert_address_input("bch_addr", $current_bch_addr);

  echo '<hr>';

  $current_hp = get_post_meta($post->ID, 'hp', true);
  echo '<h4>Homepage</h4>';
  insert_address_input('hp', $current_hp);
}

function insert_radio_input($name, $value, $current_value) {
  echo '<input type="radio" name="'.$name.'" value="'.$value.'"';
  if ($current_value == $value) {
    echo ' checked="checked"';
  }
  echo '><span style="margin-right:15px;">'.$value.'</span>';
}

function insert_address_input($name, $current_value) {
  echo '<input type="text" name="'.$name.'" size="70" value="'.$current_value.'">';
}

function save_custom_fields( $post_id ) {
  update_field_if_exist($post_id, 'color');
  update_field_if_exist($post_id, 'lang');
  update_field_if_exist($post_id, 'btc_addr');
  update_field_if_exist($post_id, 'bch_addr');
  update_field_if_exist($post_id, 'hp');
}

function update_field_if_exist( $post_id, $field ) {
  if ( !empty($_POST[$field]) ) {
    update_post_meta($post_id, $field, $_POST[$field]);
  }
}
add_action('save_post', 'save_custom_fields');
