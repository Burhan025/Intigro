<?php
/*
Template Name: Book Page Template

*/
?>
<?php get_header(); ?>

<div id="core">
  <div class="container">
    <div class="row">
      <div class="twelvecol"  style="margin-top:20px;">
    
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
  
      <div id="our-book" class="body3">
       
     <div class="container">
      <div class="row" id="book">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><?php if(get_field('book_page_section_header')) {the_field('book_page_section_header'); } else { echo 'Sample Chapters';} ?></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="book-content">
        <div class="twelvecol">
        <?php if(get_field('book_page_section_content')) {the_field('book_page_section_content'); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->
<div class="clear"></div>
  
  
  <div id="reviews-section" class="body3">
       
     <div class="container">
      <div class="row" id="reviews">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><?php if(get_field('book_page_reviews_header')) {the_field('book_page_reviews_header'); } else { echo 'Reviews';} ?></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="book-content">
        <div class="twelvecol">
        <?php if(get_field('book_page_reviews_content')) {the_field('book_page_reviews_content'); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->


  <div id="author-section" class="body3">
       
     <div class="container">
      <div class="row" id="author">
        	<div class="twelvecol">
				<h2 class="fullwidth"><span><?php if(get_field('book_page_author_header')) {the_field('book_page_author_header'); } else { echo 'Author';} ?></span></h2>
            	
               
        </div><!--end #slider.row-->
     </div><!--end #slider.container-->
     
     <div class="row" id="book-content">
        <div class="twelvecol">
        <?php if(get_field('book_page_author_content')) {the_field('book_page_author_content'); } ?>
        </div>
      </div>
     
	</div>
</div><!-- end Book -->

<div class="clear"></div>

<?php get_footer(); ?>
