<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="modern" lang="en"> <!--<![endif]-->
<head>

<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php wp_title(''); ?></title>
    <?php
	$home_url = get_bloginfo('url'); 
	$template_url = get_bloginfo('template_url');
	$child_url = get_stylesheet_directory_uri();
	?>
    

	
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- WP head -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="body1">

<!--[if lt IE 8]><p class=chromeframe>Woah! Your browser is <em>old school</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!-- Top Bar-->
<?php if ( is_active_sidebar( 'top-bar' ) ) : ?>
<div id="top-bar">
    <div class="row">
		<?php dynamic_sidebar( 'top-bar' ); ?>
    </div>
</div>
<div class="clear"></div>
<?php endif; ?>

<div id="header">
  <div class="container">
	<div class="row" style="over">
		<div class="twelvecol">
            <div id="header-left"><?php if ( is_active_sidebar( 'header-left' ) ) : ?><?php dynamic_sidebar( 'header-left' ); ?><?php endif; ?></div><!--end #header-left -->
            <div id="header-right"><?php if ( is_active_sidebar( 'header-right' ) ) : ?><?php dynamic_sidebar( 'header-right' ); ?><?php endif; ?></div><!--end #header-right-->
		</div><!--end .twelvecol .last-->
    </div><!--end .row -->
  </div><!--end .container -->


<!-- Subheader-->
<?php if ( is_active_sidebar( 'subheader' ) ) : ?>
<div id="subheader">
  <div class="container">
	<div class="row">
		<?php dynamic_sidebar( 'subheader' ); ?>
	</div><!--end #header .row-->
   <div class="clear"></div>
  </div><!--end .container -->
</div><!--end #subheader-->
<?php  endif;  ?>


<?php if(is_front_page()) {?>
<!-- Testimonials -->
<div id="testimonials" class="body3">
	<div class="container">
        <div class="row">
        	<div class="twelvecol">
				<h2><?php if(get_field('testimonials_header',2)) {the_field('testimonials_header',2); } else { echo 'Engineering businesses to achieve their Next Level.';} ?> </h2>
                <?php the_field('featured_testimonials_home'); ?>
            	<?php /*?><?php echo do_shortcode('[home_testimonials num="3" excerpt="false"]');  ?><?php */?>
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="scroll">
        <div class="twelvecol">
        <span>Scroll to learn more</span>
        </div>
      </div>
     
	</div>
</div><!-- end Testimonials -->
<div class="clear"></div>
<?php } ?>


	
<!-- Slider-->
<?php if(is_front_page()) {?>

<div id="slider" class="body3">
	<div class="container">
        <div class="row">
        <!--<div class="twelvecol">-->
        <?php if (get_option('thrive_slider_dis') <> "true") {
            main_slider();
			
            } ?>
            
            
           <!-- </div>-->
 		</div><!--end #slider.row-->
        
     </div><!--end #slider.container-->
</div><!--end #slider-->

	<?php } else {  
	
	 function thrive_page_title() {
		 
		$blogtitle = get_field('blog_sub_title', 2);
		 
		$post_type = get_post_type();
		if ($post_type == "tribe_events") { 
			$post_type = "Events"; 
		}
		if ($post_type == "testimonial") {
			$post_type = "Testimonials";
		}
	
		$term=$wp_query->queried_object;
		$term_name == $term->name;

		if ($term_name == "tribe_events_cat") { 
		    $term_name == "Events";
		
		} elseif (is_tax()) { echo $term_name;
		} elseif ($post_type == "tribe_events") { echo "Events";
		} elseif (is_tax('tribe_events_cat')) { echo "Events";
		} elseif (is_post_type_archive( 'directory' )) { echo 'Directory';
		} elseif (is_post_type_archive( 'testimonial' )) { echo 'Testimonials';
		} elseif (is_404()) { echo'Page Not Found';
		} elseif (is_category()) { echo 'The Success Labs<br /><span>' . $blogtitle . '</span>';  
		} elseif (is_archive()) { echo 'The Success Labs<br /><span>' . $blogtitle . '</span>';
		} elseif (is_single()) { echo 'The Success Labs<br /><span>' . $blogtitle . '</span>'; 
		} elseif (is_home()) {  echo 'The Success Labs<br /><span>' . $blogtitle . '</span>';
		} elseif (is_search()) { echo 'Search for "' . get_search_query() . '"';
		} elseif (is_page()) { 
	
				global $wp_query;
				$thePostID = $wp_query->post->ID;
			
				//$page_header = get_the_subheading($thePostID);
			
				$page_header = apply_filters( 'plugins/wp_subtitle/get_subtitle', '', array(
				    'before'  => '',
				    'after'   => '',
				    'post_id' => get_the_ID()
				) );

				if ($page_header) {
					echo $page_header;
				} 
				else { 
					echo the_title();
				}
				if (!$post_type == "Post" || !$post_type == "Page") { 
					echo $post_type;
				}

			} else { the_title(); }
		} 
	 
	 if (get_option('thrive_subpage_image') == "true") { ?>
        
            <div id="slider" class="body3">
                <div class="row fi-index">
                    
                <?php if (!is_front_page() && has_post_thumbnail() && !is_single() && !is_archive() && !is_category() && !is_home()) { 
                    $header_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    $header_url = $header_image['0'];
					} else {
					$header_url = $home_url. "/files/subpage-header.jpg";
					}
                ?>
                       <div id="page-featured-image">
                        <div class="twelvecol">
                        	<div id="title-wrap">
                            	<img src="<?= $url?>" />
                        		<h1 id="title"><?php  thrive_page_title(); ?></h1><!-- End .title -->
							</div><!-- End #title-wrap -->             
                        </div><!-- End #twelvecol -->   
                    </div><!--end .page-featured-image-->
                    
                </div><!--end .row .fi-index-->
    		</div><!--end #slider-->
            
		<?php } else { ?>
              <div id="slider" class="body3">
                 <div class="container">
                    <div class="row">
                        <div class="twelvecol">
                            <h1 class="pagetitle"><?php  thrive_page_title(); ?></h1>
                         </div><!--end .twelvecol-->
               </div><!--end .row-->
               
               <?php if (is_home() || is_archive() || is_single() ) { 
			   
			   	$args = array(
   //  'orderby'               => 'term_group',
    'title_li'              =>  NULL,
    'order'                 => 'ASC',
    'hide_empty'            => 1,
    'use_desc_for_title'    => 0,
    //'feed'                  => '',
    'hierarchical'          => 1,
    'echo'                  => 1,
   // 'current_category'      => 1
   //  'taxonomy'              => 'categories'
);
echo '<ul id="blog-menu">';
 wp_list_categories($args); 
		echo '</ul>';		 
			   }
				 
				  ?>
       </div><!--end .container-->
     </div><!--end .slider-->
	<?php }
	 } ?>
     
<div class="clear"></div>
</div><!--end #header -->
<div class="clear"></div>
<?php if(is_front_page()) {?>
   <!-- passion -->
<div id="passion" class="body3">
	
     <div class="container">
	 
      <div class="row" id="process-header">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span>Our Passion</span></h2>	
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" >
        <div class="twelvecol">
			<div class="passion-brief">
       <p>We <i>love</i>  to come alongside, equip, and renew entrepreneurs and their companies:</p>
	<div class="passion-slogan">to make their lives <span>easier</span> and companies more <span>profitable</span>, so that they can impact their world for good!</div>
			</div>
        </div>
      </div>
     
	</div>
</div><!-- end passion -->
<div class="clear"></div>

<!-- Process -->
<div id="process" class="body3">
     <div class="container">
	 
      <div class="row" id="process-header">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span>Our Process</span></h2>
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" >
        <div class="twelvecol">
		  <div class="sixcol circle"><p>We have identified <br/>4 key elements of business</p></div>
		  <div class="sixcol last triangle"><p>used in our unique, core process<br/><span><a href="/processes/the-next-level-navigator/">The Next Level Navigator <sup>TM</sup></a></span></p></div>
		</div>
		<div class="twelvecol">
			<a href="/processes/the-next-level-navigator/"><img class="intrigo-diagram" src="<?php echo get_stylesheet_directory_uri(); ?>/images/process-diagram-2016.png" alt="Intigro's Next Level Navigator"/></a>
			<p class="diagram-brief">By applying our financial insights, strategic mindset and people discernment</p>
		</div>
		
        </div>
      </div>
	</div>
</div><!-- end process -->
<div class="clear"></div>

<!-- actionline -->
<div id="actionline" class="body3">
     <div class="container">
     <div class="row" >
        <div class="twelvecol">
			<div class="actionline-brief">
           		<p>We grow entrepreneurs and their companies from <br/> the inside out to reach new heights!</p>
			</div>
        </div>
      </div>
	</div>
</div><!-- end actionline -->
<div class="clear"></div>
	<?php } ?>

<?php if(is_front_page()) {?>
<!-- Services -->
<div id="services" class="body3">
	<div class="overlay">
       
     <div class="container">
      <div class="row" id="services-header">
        	<div class="twelvecol">
				<h2><?php if(get_field('services_section_header',2)) {the_field('services_section_header',2); } else { echo 'Our Services';} ?></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" >
        <div class="twelvecol">
        <h3><?php if(get_field('service_section_subheader',2)) {the_field('service_section_subheader',2); } ?></h3>
        <div class="fourcol-one" id="service-1"><?php if(get_field('service_section_box_1',2)) {the_field('service_section_box_1',2); } ?></div>
         <div class="twocol-one" id="service-2"><?php if(get_field('service_section_box_2',2)) {the_field('service_section_box_2',2); } ?></div>
        <div class="fourcol-one last" id="service-3"><?php if(get_field('service_section_box_3',2)) {the_field('service_section_box_3',2); } ?></div>
         <?php /*?><div class="fourcol-one last" id="service-4"><?php if(get_field('service_section_box_4',2)) {the_field('service_section_box_4',2); } ?>	</div><?php */?>
        </div>
      </div>
     
	</div>
    </div>
</div><!-- end Testimonials -->
<div class="clear"></div>
<?php } ?>	
    
    <?php if(is_front_page()) {?>
<!-- Book -->
<div id="our-book" class="body3">
       
     <div class="container">
      <div class="row" id="book">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><a style="color:#607a88;" href="//www.intigro.com/book/"><?php if(get_field('book_section_header',2)) {the_field('book_section_header',2); } else { echo 'Our Book';} ?></a></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="book-content">
        <div class="twelvecol">
        <?php if(get_field('book_section_content',2)) {the_field('book_section_content',2); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->
<div class="clear"></div>	
<?php } ?>

<!-- Core Top -->
<?php if ( is_active_sidebar( 'core-top' ) ) : ?>
<div id="core-top">
	<div class="container">
		<div class="row">
            <div class="twelvecol">
        		<?php dynamic_sidebar( 'core-top' ); ?>
             </div><!-- end twelvecol -->
        </div><!-- end row -->
    </div><!-- /#core top .container  -->
</div><!--end #core-top-->
<div class="clear"></div>
<?php endif; ?>
