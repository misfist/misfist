<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 * @subpackage Misfist
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<?php
		$args = array(
			'post_type' 		=> array( 'post' ),
			'order' 				=> 'ASC',
			'orderby' 			=> 'menu_order',
			'category_name'	=> 'project',
			'posts_per_page' => get_option( 'posts_per_page' ),
		);

		$projects = new WP_Query( $args );
		?>

		<?php if( $projects->have_posts() ) : ?>

			<section id="projects" class="col-md-12 project-list">

				<?php while( $projects->have_posts() ) : ?>
					<?php $projects->the_post(); ?>

					<?php if( has_post_thumbnail() ) : ?>

						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

					<?php endif; ?>

				<?php endwhile; ?>

			</section>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
