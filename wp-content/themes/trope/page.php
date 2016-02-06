<?php

/**

 * The template for displaying all pages

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages and that other

 * 'pages' on your WordPress site will use a different template.

 *

 * @package WordPress

 * @subpackage Trope

 * @since Trope 1.0

 */



get_header(); ?>

	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title();?></h1>
				<?php the_content();?>
				<?php comments_template(); ?> 
			<?php endwhile; ?>
		</div><!-- #content -->
        <?php get_sidebar();?>
	</div>


<?php get_footer(); ?>