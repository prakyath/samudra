<?php

/**
 * The template for displaying all single posts
 * @package WordPress
 * @subpackage trope
 * @since trope 1.0
 */

get_header(); ?>

	<div class="main clearfix content_begin">

		<div id="content" class="col-md-7" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
                
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->

        	<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>