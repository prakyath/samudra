<?php
/* The Header template for our theme
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage trope
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="header" class="site-header" role="banner">
        <div class="container">
       	<div class="row clearfix">
<!--		<div class="col-md-9 clearfix primary-nav">       
            
           <nav class="primary-navigation site-navigation " role="navigation" id="menu-primary">
             <div class="menu">
                 <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'menu-primary-items' ) ); ?>
             </div>
           </nav>
           

        </div>
-->
            <div class="col-md-3 clearfix">
            

            <ul class="icon-fonts social-icons">
               <?php if ( get_theme_mod( 'trope_rsslink' ) ) : ?>
                   <li><a class="genericon genericon-feed" href="<?php  echo esc_url(get_theme_mod( 'trope_rsslink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_twitterlink' ) ) : ?>
                    <li><a class="genericon genericon-twitter" href="<?php  echo esc_url(get_theme_mod( 'trope_twitterlink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_facebooklink' ) ) : ?>
                   <li><a class="genericon genericon-facebook-alt" href="<?php  echo esc_url(get_theme_mod( 'trope_facebooklink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_pinterestlink' ) ) : ?>
                    <li><a class="genericon genericon-pinterest-alt" href="<?php  echo esc_url(get_theme_mod( 'trope_pinterestlink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_googlelink' ) ) : ?>
                    <li><a class="genericon genericon-googleplus" href="<?php  echo esc_url(get_theme_mod( 'trope_googlelink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_stumblelink' ) ) : ?>
                    <li><a class="genericon genericon-tumblr" href="<?php  echo esc_url(get_theme_mod( 'trope_googlelink' )); ?>"></a></li>
               <?php endif; ?>
               <?php if ( get_theme_mod( 'trope_youtubelink' ) ) : ?>
                    <li><a class="genericon genericon-youtube" href="<?php  echo esc_url(get_theme_mod( 'trope_googlelink' )); ?>"></a></li>
               <?php endif; ?>
             </ul></div>
			           
			
			
      </div>
      
    </div>
	<div class="header-banner">
	<div class="container">
       
		
		<div class="col-md-12">
               <?php if(is_home()) echo '<h1 id="site-title">'; else echo '<h2 id="site-title">'; ?>
                  <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                    	<?php if ( get_theme_mod( 'trope_logo' ) ) : ?>
                            <span>
                            	<img src='<?php echo esc_url( get_theme_mod( 'trope_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            </span>
                        <?php else : ?>
							<?php bloginfo( 'name' ); ?>				
						<?php endif; ?>
                        </a>
                    <?php if(is_home()) echo '</h1>'; else echo '</h2>'; ?>
             </div>
		
		
	</div>
	<div>
	
 </header><!-- #masthead -->
	<div class="container">
		<div id="main" class="site-main">
