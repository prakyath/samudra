<?php

/*
 * The template for displaying Archive pages
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, trope
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */

get_header(); ?>


	
	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
			<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title"><?php

					if ( is_day() ) :

						printf( __( 'Daily Archives: %s', 'trope' ), get_the_date() );

					elseif ( is_month() ) :

						printf( __( 'Monthly Archives: %s', 'trope' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'trope' ) ) );

					elseif ( is_year() ) :

						printf( __( 'Yearly Archives: %s', 'trope' ), get_the_date( _x( 'Y', 'yearly archives date format', 'trope' ) ) );

					else :

						_e( 'Archives', 'trope' );

					endif;

				?></h1>

			</header><!-- .archive-header -->



			<?php /* The loop */ ?>


				<?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile; ?>

    

                <?php trope_paging_nav(); ?>

    

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>

		</div><!-- #content -->
        <?php get_sidebar();?>
	</div>



<?php get_footer(); ?>