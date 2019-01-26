<?php
/**
 * The main template file.
 *
 * @package Total
 */

get_header(); ?>
<?php 
if( is_home() && 'page' == get_option( 'show_on_front' )){
	$blog_page_id = get_option('page_for_posts');
	?>
	<header class="ht-main-header">
		<div class="ht-container">
			<h1 class="ht-main-title"><?php echo get_the_title( $blog_page_id ); ?></h1>
			<?php do_action( 'total_breadcrumbs' ); ?>
		</div>
	</header><!-- .entry-header -->
	<?php
}
?>
<div class="ht-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'summary' );
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
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php get_footer();
