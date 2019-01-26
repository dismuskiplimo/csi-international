<?php
/**
 * The template for displaying search results pages.
 *
 * @package Total
 */

get_header(); ?>

<header class="ht-main-header">
	<div class="ht-container">
		<h1 class="ht-main-title"><?php printf( esc_html__( 'Search Results for: %s', 'total' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php do_action( 'total_breadcrumbs' ); ?>
	</div>
</header><!-- .entry-header -->

<div class="ht-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php 
            the_posts_pagination( 
            	array(
				    'prev_text' => __( 'Prev', 'total' ),
				    'next_text' => __( 'Next', 'total' ),
					)
            ); 
            ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php get_footer(); 
