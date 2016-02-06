<?php

/**
 * The template for displaying Category pages
 * @link http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */
get_header(); ?>
	
	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
		
		<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'trope' ), single_cat_title( '', false ) ); ?></h1>

				<?php if ( category_description() ) : // Show an optional category description ?>

				<div class="archive-meta"><?php echo category_description(); ?></div>

				<?php endif; ?>

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