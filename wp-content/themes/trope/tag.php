<?php

/**
 * The template for displaying Tag pages
 * Used to display archive-type pages for posts in a tag.
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */

get_header(); ?>

	<div class="main clearfix content_begin">
		<div id="content" class="col-md-7" role="main">
			<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'trope' ), single_tag_title( '', false ) ); ?></h1>



				<?php if ( tag_description() ) : // Show an optional tag description ?>

				<div class="archive-meta"><?php echo tag_description(); ?></div>

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