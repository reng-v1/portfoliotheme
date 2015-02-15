<?php
// Mindful Moment Preview Shortcode
function mindfulmoment_preview_shortcode($atts) {
  $options = shortcode_atts(array(
    'qty'           => '1',
    'id'            => null,
    'name'          => null,
    'category'      => null,
    'style'         => null,  /*small, detailed*/
    'classes'       => null,  /*box shadow-box*/
    'buttonclasses' => null,  /*rounded solid-bg*/
    'buttoncolor'   => orange, /*orange, green, blue, darkgray*/
    'logourl'       => null
  ), $atts);


  // get the latest mindful moment posts
  $args = array(
    'post_type'      => 'mindful-moment',
    'posts_per_page' =>  $options['qty'],
    'p'              => $options['id'],
    'name'           => $options['name'],
    'category_name'  => $options['category']
  );

   //$blogpostpreview_query = new WP_Query( $args );

  $mindfulmomentpreview_posts = getRemotePosts( 'drkathleenhall', $args['post_type'], $options['id'], $options['category'], 1 );

    switch( $options['style'] ) {
      case 'small':
      if ( count( $mindfulmomentpreview_posts ) > 0 ) {
        foreach($mindfulmomentpreview_posts as $post){
        // get variables
        $mindfulmomentLink = $post->meta->soundcloud_link;
        $mindfulmomentDuration = $post->meta->duration;
        $mindfulmomentDescription = $post->meta->description;

        $content_shortcode = '<div class="'.$options['classes'].'">
              <div class="mindful-wrapper small">
                <div class="heading">
                  <h4>Mindful Moment <span style="text-transform: lowercase; font-weight: 300;">on</span> WTOP</h4>
                </div>
                <div class="grid-row">
                  <div class="col small-col-8 medium-col-9">
                    <h4 class="title-header sub-header">'.$post->title.'</h4>
                    <div class="text">
                      <p><span class="gray">Duration:</span> '.$mindfulmomentDuration.'</p>
                    </div>
                  </div>
                  <div class="col small-col-4 medium-col-3">
                    <div class="date">
                      <h6 class="gray">'.mysql2date('M j, Y',$post->date).'</h6>
                    </div>
                    <div class="bottom-button">
                      <a target="_blank" href="'.$mindfulmomentLink.'" class="button-box '.$options['buttoncolor'].' '.$options['buttonclasses'].' equilateral65"><i class="icon ion-volume-medium"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
        }
      } else {
      // fallback for having no ask-feed posts
      $content_shortcode = '<h3>Error. No Mindful Moment posts.</h3>';
      }
        break;
      case 'detailed':
        if ( count( $mindfulmomentpreview_posts ) > 0 ) {
          foreach($mindfulmomentpreview_posts as $post){
          // get variables
          $mindfulmomentLink = $post->meta->soundcloud_link;
          $mindfulmomentDuration = $post->meta->duration;
          $mindfulmomentDescription = $post->meta->description;

          $content_shortcode = '<div class="'.$options['classes'].'">
                <div class="mindful-wrapper detailed">
                  <div class="grid-row">
                    <div class="col small-col-3 medium-col-2">
                      <div class="wtop-logo">
                        <img src="'.$options['logourl'].'" />
                      </div>
                    </div>
                    <div class="col small-col-6 medium-col-8">
                      <h4 class="title-header sub-header">'.$post->title.'</h4>
                      <div class="text">
                        <p>'.$mindfulmomentDescription.'</p>
                      </div>
                    </div>
                    <div class="col small-col-3 medium-col-2">
                      <div class="date">
                        <h6 class="gray">'.$post->date.'</h6>
                      </div>
                      <div class="bottom-button">
                        <a target="_blank" href="'.$mindfulmomentLink.'" class="button-box '.$options['buttoncolor'].' '.$options['buttonclasses'].' equilateral65"><i class="icon ion-volume-medium"></i></a>
                      </div>
                      <div class="duration">
                        <p><span class="gray">Duration:</span> '.$mindfulmomentDuration.'</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';
        }
      } else {
      // fallback for having no ask-feed posts
      $content_shortcode = '<h3>Error. No Mindful Moment posts.</h3>';
      }
      break;
    default:
      break;
  }
  // reset for multiple loop usage
  wp_reset_postdata();
  return $content_shortcode;

}
add_shortcode('mindfulmoment', 'mindfulmoment_preview_shortcode');
?>