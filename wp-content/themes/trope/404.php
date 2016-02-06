<?php

/**
 * The template for displaying 404 pages (Not Found)
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */
get_header(); ?>



	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
			<header class="page-header">

				<h1 class="page-title"><?php _e( 'Not Found', 'trope' ); ?></h1>

			</header>



			<div class="page-wrapper">

				<div class="page-content">

					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'trope' ); ?></h2>

					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'trope' ); ?></p>



					<?php get_search_form(); ?>

				</div><!-- .page-content -->

			</div><!-- .page-wrapper -->

		</div><!-- #content -->
        <?php get_sidebar();?>
	</div>
<?php get_footer(); ?>