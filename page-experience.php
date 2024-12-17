<?php
/*
Template Name: Experience Page Template

*/
?>
<?php get_header(); ?>

<div id="core">
  <div class="container">
    <div class="row">
      <div class="twelvecol" style="margin-top:20px;">
    
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
            <div class="post">
              <div class="entry">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','thrive') . '</span>', 'after' => '</div>' ) ); ?>
                <?php the_tags( '<p>' . __( 'Tags: ','thrive') . '', ', ', '</p>'); ?>
                <?php comments_template(); ?>
              </div><!-- end .entry -->
            </div><!-- end .post -->
        
        

        
        
        
        
		<?php endwhile; else: ?>
           <p>
           	 <?php _e('Sorry, no posts matched your criteria','thrive');?>.
           </p>
        <?php endif; ?>
        
        
        
      </div><!-- end #core .twelvecol -->
      
    </div><!--end #core .row-->
    
    <div class="clear"></div>
  </div><!-- end #core #container --> 
  
  </div><!--end #core-->
  
  
      <div id="integrations" class="body3">
       
     <div class="container">
      <div class="row" id="industries">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><?php if(get_field('indutries_header')) {the_field('industries_header'); } else { echo 'Industries';} ?></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="industries-content">
        <div class="twelvecol">
         <h3><?php if(get_field('industries_sub_header')) {the_field('industries_sub_header'); } ?></h3>
        <?php if(get_field('industries_content')) {the_field('industries_content'); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->
<div class="clear"></div>
  
  
  <div id="success-stories-section" class="body3">
       
     <div class="container">
      <div class="row" id="stories">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><?php if(get_field('success_stories_header')) {the_field('success_stories_header'); } else { echo 'Success Stories';} ?></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="stories-content">
        <div class="twelvecol">
        <?php if(get_field('success_stories_content')) {the_field('success_stories_content'); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->
<div class="clear"></div>

<?php get_footer(); ?>
