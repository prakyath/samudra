<?php /* Theme Customizer For Trope Theme */
   
function trope_customize_register ( $wp_customize ) {
      
	
	// Theme Colors
 
	$colors = array();
    $colors[] = array( 'slug'=>'bg_color', 'default' => '#1D1D1D',
    'label' => __( 'Header Color', 'trope' ) );
    $colors[] = array( 'slug'=>'primary_color', 'default' => '#141412',
    'label' => __( 'Headings Color ', 'trope' ) );
    $colors[] = array( 'slug'=>'secondary_color', 'default' => '#63676e',
    'label' => __( 'Text Color', 'trope' ) );
    $colors[] = array( 'slug'=>'tertiary_color', 'default' => '#7ac9ed',
    'label' => __( 'Links Color', 'trope' ) );
	
	foreach($colors as $color)
  	{	
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'],
    'type' => 'theme_mod', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
     $color['slug'], array( 'label' => $color['label'], 'section' => 'colors',
     'settings' => $color['slug'] )));
  	}
	// Theme Colors Ends
	
	// Logo Uploader
	
	$wp_customize->add_section( 'trope_logo_fav_section' , array(
    'title'       => __( 'Site Logo', 'trope' ),
    'priority'    => 30,
    'description' =>  __('Upload a logo to replace the default site name and description in the header','trope'),) );
	
   $wp_customize->add_setting( 'trope_logo', array(
		'sanitize_callback' => 'esc_url_raw') );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'trope_logo', array(
    'label'    => __( 'Site Logo ( Max height - 60px)', 'trope' ),
    'section'  => 'trope_logo_fav_section',
    'settings' => 'trope_logo',
    ) ) );
	function trope_check_header_video($file){
  return validate_file($file, array('', 'mp4'));
    }
	// Logo  Uploader Ends
	// Social Links
	
	$wp_customize->add_section( 'sociallinks', array(
        'title' => __('Social Links','trope'), // The title of section
        'description' => __('Add Your Social Links Here.','trope'), // The description of section
        'priority' => '900',
	) );
	
	$wp_customize->add_setting( 'trope_facebooklink', array('default' => '#','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_facebooklink', array('label' => __('Facebook URL','trope'), 'section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'trope_twitterlink', array('default' => '#','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_twitterlink', array('label' => __('Twitter Handle','trope'), 'section' => 'sociallinks', ) );
    $wp_customize->add_setting( 'trope_googlelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_googlelink', array('label' => __('Google Plus URL','trope'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'trope_pinterestlink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_pinterestlink', array('label' => __('Pinterest URL','trope'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'trope_youtubelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_youtubelink', array('label' => __('Youtube URL','trope'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'trope_stumblelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_stumblelink', array('label' => __('Stumbleupon Link','trope'),'section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'trope_rsslink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'trope_rsslink', array('label' => __('RSS Feeds URL','trope'),'section' => 'sociallinks',) );

	// Social Links Ends
 	// Footer Copyright Section
	
	$wp_customize->add_section( 'fcopyright', array(
        'title' => __('Footer Copyright','trope'), // The title of section
        'description' => __('Add Your Copyright Notes Here.','trope'), // The description of section
        'priority' => '900',
	) );
 
	$wp_customize->add_setting( 'trope_footer_top', array('default' => __('Any Text Here','trope'),'sanitize_callback' => 'trope_sanitize_footer_text',) );
    $wp_customize->add_control( 'trope_footer_top', array('label' => __('Footer Text','trope'),'section' => 'fcopyright',) );
	$wp_customize->add_setting( 'trope_footer_cr_left', array('default' => __('Your Copyright Here.','trope'),'sanitize_callback' => 'trope_sanitize_footer_text',) );
	$wp_customize->add_control( 'trope_footer_cr_left', array('label' => __('Copyright Note Left','trope'),'section' => 'fcopyright',) );

	function trope_sanitize_footer_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );}
}
    
	// Footer Copyright Section Ends
	
    // This will output the custom WordPress settings to the live theme's WP head. */
   
   function trope_header_output() {
     $sidebar_pos = get_theme_mod('sidebar_position_option');
     $bgcolor = get_theme_mod('bg_color');
	 $primarycolor = get_theme_mod('primary_color');
	 $secondarycolor = get_theme_mod('secondary_color');
	 $tertiarycolor = get_theme_mod('tertiary_color');
	 
	 
	 
	 ?><?php 
      if ( ($sidebar_pos == 'sidebar_display_left') || ( ! empty( $bgcolor )) || (!empty($primarycolor)) || (!empty($secondarycolor)) || (!empty($tertiarycolor))){
?>	  <!--Customizer CSS--> 
      
	  <style type="text/css">
	       

		    <?php if($bgcolor) { ?>
		      #header{background-color: <?php echo esc_attr($bgcolor); ?>}
			  .primary-navigation ul li:hover li a, .primary-navigation ul li.iehover li a{ background-color: <?php echo esc_attr($bgcolor); ?>}
		   	<?php } ?>
            <?php if($primarycolor) { ?>

             h1, h2, h3, h4, h5, h6, .related-article h5 a:hover, .entry-title h2, .entry-title a, .pagenavi a,
			  h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, a:hover, a:visited:hover, a:focus, a:visited:focus,
			  .widget_tag_cloud a {color: <?php echo esc_attr($primarycolor); ?>;}
			  			  
		   	<?php } ?>
			<?php if($secondarycolor) { ?> p, .entry-summary ul li, .entry-content ul li, entry-summary ol li, entry-content ol li, dd
					  			{color:<?php echo esc_attr($secondarycolor); ?>;}
		      		  <?php } ?>

			<?php if($tertiarycolor) { ?>
		      .catbox a, .hcat a:visited, #main-nav  #main-menu li:hover, #main-nav #main-menu li.current-menu-item, 
  .entry-summary a, .entry-meta a, .entry-title h3 a:hover, .entry-title h2 a:hover,
ul.popular-posts-sdr li a, .widget_recent_entries ul li a, .widget_categories ul li a, .widget_archive li a, .widget_meta li a,
			  a, .cdetail h3 a:hover, .cdetail h2 a:hover, .trope-category-posts li p, .widget_recent_entries li a, .nav-links a,
			  .entry-content a, .comment-content a{color:<?php echo esc_attr($tertiarycolor); ?>;} 
			
			<?php } ?>
			
			
	  </style>
      <!--/Customizer CSS-->
	<?php } ?>
	<?php } 
	
	  

add_action( 'customize_register', 'trope_customize_register', 11 );
add_action( 'wp_head', 'trope_header_output', 11 );