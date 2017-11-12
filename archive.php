<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootstrap_to_Wordpress
 */

get_header(); ?>

		<?php
		if ( have_posts() ) : ?>
			<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2">
				<h1>
					<?php
						// the_archive_title( '<h1 class="page-title">', '</h1>' );
						// the_archive_description( '<div class="archive-description">', '</div>' );

						 // Get the archived type name
						   echo get_queried_object()->name;  

						   // Show an optional term description.
						   $term_description = term_description();
						   if ( !empty( $term_description ) ) :
						      printf( '<small class="taxonomy-description">' . $term_description . '</small>' );
						   endif;
					?>
				</h1>
			</section>

			<div class="container">
				<div id="primary" class="row">
					<main id="content" class="col-sm-8">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

					</main>

					<!-- Sidebar -->
					<aside class="col-sm-4">
						<?php get_sidebar(); ?>
					</aside>

				</div>
			</div>

<?php
get_footer(); ?>
