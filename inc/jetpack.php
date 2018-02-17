<?php
/**
 * Misfist Jetpack functions
 *
 * @package Understrap
 * @subpackage Misfist\Inc
 * @since 1.0.0
 */

add_filter( 'jetpack_implode_frontend_css', '__return_false' );

/**
 * Enqueue Styles
 *
 * @since 1.0.0
 *
 * @link https://themeshaper.com/2014/05/30/customizing-jetpacks-sharing-module/
 * @link https://gist.github.com/misfist/f75a6dda7405d0aec13b173b71707b97
 *
 * @return void
 */
function misfist_disable_jetpack_styles() {

  wp_deregister_style( 'sharedaddy' );
  wp_deregister_style( 'sharing' );

}
add_action( 'wp_print_styles', 'misfist_disable_jetpack_styles' );


/**
 * Remove Parent JetPack Settings
 */
function misfist_remove_parent_jetpack_settings() {
  remove_action( 'after_setup_theme', 'components_jetpack_setup', 1 );
}
add_action( 'after_setup_theme', 'misfist_remove_parent_jetpack_settings' );

 /**
  * Jetpack setup function.
  *
  * See: https://jetpack.me/support/infinite-scroll/
  * See: https://jetpack.me/support/responsive-videos/
  */
function misfist_jetpack_setup() {
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'misfist_jetpack_setup', 20 );

/**
 * Remove Auto Adding of JetPack Sharing
 *
 * @since 1.0.0
 *
 * @uses start_loop hook
 * @see https://jetpack.com/2013/06/10/moving-sharing-icons/
 */
function misfist_remove_jetpack_sharing() {
  if ( is_singular( 'post' ) && function_exists( 'sharing_display' ) ) {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
  }
}
add_action( 'start_loop', 'misfist_remove_jetpack_sharing' );

/**
 * Set Default Meta Data
 *
 * @since 1.0.0
 *
 * @link https://jetpack.com/2013/07/12/add-a-default-image-open-graph-tag-on-home-page/
 *
 * @return string $image
 */
function misfist_core_jetpack_default_image() {
  $image = esc_url( get_stylesheet_directory_uri() . '/images/default.jpg' );
  return $image;
}
add_filter( 'jetpack_open_graph_image_default', 'custom_jetpack_default_image' );
