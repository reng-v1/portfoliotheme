<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
 <div class="grid-row">
   <div class="col small-col-12 medium-col-7">
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php
        //get the variables
        $youtubeID = get_field('youtube_id');
      ?>
    		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

    			<h1 class="entry-title"><?php the_title(); ?></h1>

    			<div class="entry-content">
    				<?php if($youtubeID) { ?>
      				  <iframe class="youtube-video" src="//www.youtube.com/embed/<?php echo $youtubeID; ?>" frameborder="0" allowfullscreen></iframe>
    				<?php } ?>

    				<?php if(has_post_thumbnail()) {
      				  the_post_thumbnail( 'full' );
            } ?>
    				<div class="date"><?php echo get_the_date(); ?></div>

    				<?php the_content(); ?>

    				<?php wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>

    				<?php the_tags( __('Tags: ','html5reset'), ', ', ''); ?>

    				<?php //posted_on(); ?>
    			</div>

    			<?php //edit_post_link(__('Edit this entry','html5reset'),'','.'); ?>

    		</article>

        <?php //comments_template(); ?>

  	<?php endwhile; endif; ?>
   </div>
   <div class="col small-col-12 medium-col-5">
      <?php //post_navigation(); ?>

      <h3 class="entry-title">Related Posts</h3>
      <?php
        // get list of related post
        $relatedPost = get_posts( array( 'category__in' => wp_get_post_categories(get_the_ID()), 'numberposts' => 5, 'post__not_in' => array(get_the_ID()) ) );
      ?>
      <div class="box shadow-box">
        <?php foreach($relatedPost as $post) {
          $youtubeID = get_field('youtube_id');
        ?>
          <div class="related-post">
            <div class="image">
              <?php if(has_post_thumbnail()) { the_post_thumbnail('thumbnail'); } ?>
              <?php if($youtubeID) { ?><img class="youtubevideo" src="http://img.youtube.com/vi/<?php echo $youtubeID; ?>/0.jpg" / ><?php } ?>
              <?php if(!has_post_thumbnail() && $youtubeID == null) { ?><img src="http://placehold.it/480x360&text=Image" /> <?php } ?>
            </div>
            <div class="content">
              <div class="white-fade"></div>
              <p><?php echo get_the_date(); ?></p>
              <p><?php echo get_the_title(); ?></p>
            </div>
            <div class="arrow"></div>
            <a href="<?php echo get_permalink(); ?>"></a>
          </div>
        <?php } ?>
      </div>
      <?php //get_sidebar(); ?>
    </div>
 </div>

<?php get_footer(); ?>