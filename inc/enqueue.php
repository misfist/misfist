<?php
/**
 * Misfist enqueue functions
 *
 * @package Understrap
 * @subpackage Misfist\Inc
 * @since 1.0.0
 */

/**
 * Remove Parent Styles and Scripts
 *
 * @since 1.0.0
 */
function misfist_remove_parent_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'misfist_remove_parent_scripts', 20 );

/**
 * Enqueue Child Styles and Scripts
 *
 * @since 1.0.0
 */
function misfist_enqueue_styles() {

  /**
   * Dequeue unused JetPack CSS
   * @link https://wordpress.org/support/topic/what-is-simple-payments-module-and-how-do-i-disable-it/
   */
  wp_dequeue_style( 'simple-payments' );

	// Get the theme data
	$the_theme = wp_get_theme();
  $google_font = esc_url( 'https://fonts.googleapis.com/css?family=Ewert|Sancreek&amp;subset=latin-ext' );
  $icon_font = esc_url( 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );

  wp_enqueue_style( 'misfist-fonts', $google_font );
  wp_enqueue_style( 'misfist-icons', $icon_font );
  wp_enqueue_style( 'misfist-styles', get_stylesheet_directory_uri() . '/css/style.min.css', array(), $the_theme->get( 'Version' ) );
  wp_enqueue_script( 'misfist-scripts', get_stylesheet_directory_uri() . '/js/app.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'misfist_enqueue_styles' );
