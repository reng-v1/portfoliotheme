<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post();
  	
  	$projectName = get_field('project_name');
		$projectLink = get_field('wild_url');
		$projectImages = get_field('screenshots');
	
	?>
	<div class="grid-row">
		<div class="col small-col-12">
	    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	      
	      <h1 class="entry-title"><?php echo $projectName; ?></h1>
	
	      <div class="entry-content">
					<div class="fade-gallery">
						<div class="image-wrapper">
							<?php
							$i =1;
							foreach($projectImages as $screenshots) {
								$image = $screenshots['image'];
								$ismobile = $screenshots['mobile_image'];
							?>
							<img class="image image-<?php echo $i; ?>" src="<?php echo $image; ?>" style="<?php if($ismobile) {echo 'width: auto;';}else {echo 'width:100%;';} ?>" />
							<?php 
							$i++;
							} ?>
						</div>
						<div class="thumbnail-wrapper">
							<?php
							$j =1;
							foreach($projectImages as $screenshots) {
								$image = $screenshots['image'];
							?>
							<div class="thumbnail thumbnail-<?php echo $j; ?>">
								<div class="overlay"></div>
								<img src="<?php echo $image; ?>" />
							</div>
							<?php 
							$j++; 
							} ?>
						</div>
						<div class="text-wrapper">
							<?php
							$k =1;
							foreach($projectImages as $screenshots) {
								$description = $screenshots['description'];
							?>
							<div class="text text-<?php echo $k; ?>">
								<p><?php echo $description; ?></p>
							</div>
							<?php 
							$k++; 
							} ?>
						</div>
					</div>
					<div class="grid-row">
    				<div class="col small-col-12 medium-col-6">
    					<div class="category-title">
					    	<p>Category:</p>
					    </div>
					    <div class="category-list">
					    	<!--<p><a href="#">Responsive Design</a>, <a href="#">Wordpress</a>, <a href="#">SCSS</a>, <a href="#">PHP</a></p>-->
					    	<p>
					    		<?php
									$categories = get_the_category();
									$separator = ' ';
									$output = '';
									if($categories){
										foreach($categories as $category) {
											$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
										}
									echo trim($output, $separator);
									}
								?>
					    	</p>
					  	</div>
    				</div>
    				<div class="col small-col-12 medium-col-6">
    					<?php if($projectLink) { ?>
    					<div class="button-wrapper">
    						<div class="button-hover button-hover-top"></div>
    						<a href="<?php echo $projectLink; ?>" class="site-btn" target="_blank">Live Site</a>
    						<div class="button-hover button-hover-bottom"></div>
    					</div>
    					<?php } ?>
    				</div>
    			</div> 
	       <!-- <?php the_content(); ?>
	
	        <?php wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>
	        
	        <?php the_tags( __('Tags: ','html5reset'), ', ', ''); ?>
	      
	        <?php posted_on(); ?>-->
	
	      </div>
	      
	      <!--<?php edit_post_link(__('Edit this entry','html5reset'),'','.'); ?>-->
	      
	    </article>
		</div>
	</div>
	
	<div class="grid-row">
		<div class="col small-col-12">
			<h3 class="related-header">Related Projects</h3>
		</div>
		<div class="col small-col-12">
			<div class="related-project-wrapper">
			<?php
				$categories = get_the_category($post->ID);
				if ($categories) {
					$category_ids = array();
					foreach($categories as $individual_category) {$category_ids[] = $individual_category->term_id;}
					$args2 = array(
						'post_type' => 'project',
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> 6, // Number of related posts that will be displayed.
						'caller_get_posts'=>1,
						'orderby'=>'rand' // Randomize the posts
					);
					$related_query = new WP_Query( $args2 );
					if( $related_query->have_posts() ) { 
					?>
				<div class="grid-row">
					<?php	while( $related_query->have_posts() ) {
									$related_query->the_post();
									$relatedProjectTitle = get_field('project_name');
									$rows = get_field('screenshots');
									$firstrow = $rows[0];
									$relatedProjectImage = $firstrow['image'];
					?>
					<div class="col small-col-12 medium-col-4">
					  <div class="related-project">
					  	<div class="project-image-wrapper">
						    <img src="<?php echo $relatedProjectImage; ?>" />
						    <div class="related-overlay show-for-medium-up hide-device"></div>
						    <h5 class="show-for-medium-up hide-device"><?php echo $relatedProjectTitle; ?></h5>
							</div>
							<h5 class="show-for-small-only show-device"><?php echo $relatedProjectTitle; ?></h5>
							<a href="<?php echo get_permalink(); ?>"></a>
					  </div>
					</div>
					<?php } ?>
				</div>
				<?php
					} 
				} ?>
			</div>
		</div>
	</div>

  <!--<?php comments_template(); ?>-->

  <?php endwhile; endif; ?>

<!--<?php post_navigation(); ?>-->
  
<!--<?php get_sidebar(); ?>-->

<?php get_footer(); ?>