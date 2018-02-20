<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap
 * @subpackage misfist
 */

?>

<article id="project-<?php echo $post->post_name; ?>" <?php post_class( 'project' ); ?>>

	<div class="hovereffect">

		<?php the_post_thumbnail( 'thumbnail', [ 'class' => 'img-responsive responsive--full', 'title' => esc_attr( get_the_title() ) ] ); ?>

		<div class="overlay">

			<?php if( $url = get_post_meta( $post->ID, 'link', true ) ) : ?>

				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( $url ) . '" title="' . esc_attr( get_the_title() ) . '" target="_blank">', '</a></h2>' ); ?>

			<?php else : ?>

				<?php the_title( '<h2 class="entry-title"><span>', '</span></h2>' ); ?>

			<?php endif; ?>

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

		</div>

	</div><!-- .hovereffect -->

</article>
