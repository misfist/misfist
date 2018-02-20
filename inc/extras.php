<?php
/**
 * Misfist extra functions
 *
 * @package Understrap
 * @subpackage Misfist\Inc
 * @since 1.0.0
 */

 /**
  * Filter the excerpt "read more" string.
  *
  * @param string $more "Read more" excerpt string.
  * @return string (Maybe) modified "read more" excerpt string.
  */
 // function misfist_excerpt_more( $more ) {
 //     return '';
 // }
 // add_filter( 'excerpt_more', 'misfist_excerpt_more', 99 );

/**
 *
 * @param string $post_excerpt Posts's excerpt.
 *
 * @return string
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {

  if( $url = get_post_meta( get_the_id(), 'link', true ) ) :

    $post_excerpt = $post_excerpt . '<p><a class="btn btn-primary understrap-read-more-link" href="' . esc_url( $url ) . '">' . __( 'Have a Look',
    'misfist' ) . '</a></p>';

  endif;

  return $post_excerpt;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api', '/random', array(
        'methods'   =>  'GET',
        'callback'  =>  'get_random',
    ) );
});
function get_random() {
  $args = array(
    'orderby'         => 'rand',
    'posts_per_page'  => 1,
    'category_name'   => 'oscar-quotes',
  );
  $query = new WP_Query( $args );
  $posts = [];

  foreach( $query->get_posts() as $post ) {
    $posts[] = $post;
    $posts->post_content = apply_filters( 'post_content', $posts->post_content );
  }

  return rest_ensure_response( $posts );
}
