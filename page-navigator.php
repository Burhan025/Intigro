<?php
/*
Template Name: Build your navigator

*/
?>
<?php get_header(); ?>

<link href='//fonts.googleapis.com/css?family=Merriweather:400,900italic,900,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!--Navigator 1 Starts here-->
    <div id="navigator" class="body3">
    	<div class="container">
        	
            <div class="row" id="process-header" style="max-width: 1090px !important;">
            	<div class="twelvecol">
                	<h2 class="fullwidth-navigator grey"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/fire-icon.png" /><span><?php the_field('title_ready'); ?></span></h2>
                </div>
            </div>
            
            <div class="row" style="max-width: 1090px !important;">
            	<div class="twelvecol newbook-content">
                <div class="colpadding">
                	<div class="sixcol">
                    	<div class="nav-product" valign="top">
                        	<div class="nav-tagline" valign="top">
                            	<h3 style="margin-bottom: 10px;"><?php the_field('heading_ready'); ?></h3>
								<h5><?php the_field('sub_heading_ready'); ?></h5>
                            	<a target="_blank" href="<?php the_field('button_link_ready'); ?>" class="navigator-btn"><?php the_field('button_text_ready'); ?></a>
                            </div>
                            <div class="nav-productimg">
								<?php $image = get_field('upload_book_cover_ready'); if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" />
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="sixcol last">
                        <div class="nav-product">
                        
                        	<?php the_field('description_ready'); ?>
                            
                            <a href="<?php the_field('learn_more_link_ready'); ?>" class="learnmore">Learn More &raquo;</a>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="clear"></div>
	 <!--Navigator 1 ends here-->
	
	
    <!--Navigator 2 starts here-->
    <div id="navigator" class="body3">
    	<div class="container">
        	
            <div class="row" id="process-header" style="max-width: 1090px !important;">
            	<div class="twelvecol">
                	<h2 class="fullwidth-navigator redish"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/plant-icon.png" /><span><?php the_field('title_set_left'); ?></span></h2>
                </div>
            </div>
            
            <div class="row" style="max-width: 1090px !important;">
            	<div class="twelvecol newbook-content">
                <div class="colpadding">
                	<div class="sixcol">
                    	<div class="nav-product" valign="top">
                        	<div class="nav-tagline" valign="top">
                            	<h3><?php the_field('heading_set_left'); ?></h3>
                            	<a href="<?php the_field('button_link_set_left'); ?>" class="navigator-btn">PURCHASE NOW</a>
                            </div>
                            <div class="nav-productimg">
                            	<?php $image = get_field('upload_book_image_set_left'); if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" />
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="nav-product">
                        
                        	<?php the_field('description_set_left'); ?>
                            
                            <a href="<?php the_field('learn_more_link_set_left'); ?>" class="learnmore">Learn More &raquo;</a>
                            
                        </div>
                    </div>
                    <div class="sixcol last">
                    	<div class="nav-product" valign="top">
                        	<div class="nav-tagline" valign="top">
                            	<h3><?php the_field('heading_set_right'); ?></h3>
                            	<a href="<?php the_field('button_link_set_right'); ?>" class="navigator-btn">PURCHASE NOW</a>
                            </div>
                            <div class="nav-productimg">
                            	<?php $image = get_field('upload_book_image_set_right'); if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" />
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="nav-product">
                        
                        	<?php the_field('description_set_right'); ?>
                            
                            <a href="<?php the_field('learn_more_link_set_right'); ?>" class="learnmore">Learn More &raquo;</a>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="clear"></div>
	 <!--Navigator 2 ends here-->
	 
	 
	 
	 <!--Navigator 3 Starts here-->
    <div id="navigator" class="body3">
    	<div class="container">
        	
            <div class="row" id="process-header" style="max-width: 1090px !important;">
            	<div class="twelvecol">
                	<h2 class="fullwidth-navigator green"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/grow-icon.png" /><span><?php the_field('title_grow'); ?></span></h2>
                </div>
            </div>
            
            <div class="row" style="max-width: 1090px !important;">
            	<div class="twelvecol newbook-content">
                <div class="colpadding">
                	<div class="sixcol">
                    	<div class="nav-product" valign="top">
                        	<div class="nav-tagline" valign="top">
                            	<h3 style="margin-bottom: 10px;"><?php the_field('heading_grow'); ?></h3>
								<h5 style="color:#9d9143; margin-bottom:30px;"><?php the_field('sub_heading_grow'); ?></h5>
                            	<a href="<?php the_field('button_link_grow'); ?>" class="navigator-btn"><?php the_field('button_text_grow'); ?></a>
                            </div>
                            <div class="nav-productimg">
                            	<?php $image = get_field('upload_book_cover_grow'); if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" />
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="sixcol last">
                        <div class="nav-product">
                        
                        	<?php the_field('description_grow'); ?>
                            
                            <a href="<?php the_field('learn_more_link_grow'); ?>" class="learnmore">Learn More &raquo;</a>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="clear"></div>
	 <!--Navigator 3 ends here-->

<?php get_footer(); ?>
