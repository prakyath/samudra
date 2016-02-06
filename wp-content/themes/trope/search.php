<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */

get_header(); ?>

	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'trope' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php trope_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>