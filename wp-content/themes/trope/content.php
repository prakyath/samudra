<?php

/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 * @package WordPress
 * @subpackage Trope
 * @since Trope 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="col-md-11">

        <header class="entry-header">

            <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>

            <div class="entry-thumbnail">

                <?php the_post_thumbnail('medium'); ?>

				<div class="entry-meta">
              <?php _e('By ', 'trope'); ?> <?php if ( 'post' == get_post_type() ) {

                    printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

                        esc_attr( sprintf( __( 'View all posts by %s', 'trope' ), get_the_author() ) ),

                        get_the_author()

                    );

                } ?>, <?php trope_entry_date(); ?>

            </div><!-- .entry-meta -->
				
            </div>

            <?php endif; ?>

    

            <?php if ( is_single() ) : ?>

            <h1 class="entry-title"><?php the_title(); ?></h1>

            <?php else : ?>

            <h2 class="entry-title">

                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

            </h2>

            <?php endif; // is_single() ?>

    
<div class="clr"></div>
            

        </header><!-- .entry-header -->
<div class="clr"></div>


		<?php if ( is_single() ) : // Only display Excerpts for Search ?>

        <div class="entry-summary">

            <?php the_content(); ?>
            

        </div><!-- .entry-summary -->

        <?php else : ?>

        <div class="entry-content">

            <?php the_excerpt('Read Full Post...'); ?>

        </div><!-- .entry-content -->

        <?php endif; ?>

        
        <?php if ( is_single() ) : // Only display Excerpts for Search ?>
        
        <div class="more-link">
            <?php trope_post_nav(); ?>
         </div>    
        <?php endif; ?>

       

    </div>

</article><!-- #post -->

