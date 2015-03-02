<?php
/*
Template Name: Archives
*/

get_header(); ?>

<?php 
	$args3 = array( 
		'post_type' => 'project',
		'posts_per_page' => -1 
	);

	$allProject_query = new WP_Query ( $args3 );
?>

<?php if( $allProject_query->have_posts() ) { ?>
<div class="grid-row">
	<div class="col small-col-12">
		<h3 class="related-header">All Projects</h3>
	</div>
	<div class="col small-col-12">
		<div class="related-project-wrapper">
			<div class="grid-row">
				<?php	while( $allProject_query->have_posts() ) {
								$allProject_query->the_post();
								$projectTitle = get_field('project_name');
								$rows = get_field('screenshots');
								$firstrow = $rows[0];
								$projectImage = $firstrow['image'];
				?>
				<div class="col small-col-12 medium-col-4">
				  <div class="related-project">
				  	<div class="project-image-wrapper">
					    <img src="<?php echo $projectImage; ?>" />
					    <div class="related-overlay show-for-medium-up hide-device"></div>
					    <h5 class="show-for-medium-up hide-device"><?php echo $projectTitle; ?></h5>
						</div>
						<h5 class="show-for-small-only show-device"><?php echo $projectTitle; ?></h5>
						<a href="<?php echo get_permalink(); ?>"></a>
				  </div>
				</div>
				<?php
				wp_reset_query();
				} ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php get_footer(); ?>