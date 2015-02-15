<?php
//Recent Question
function recentcommunityquestion_shortcode($atts) {
  $options = shortcode_atts(array(
    'qty' => '6',
    'posts' => null
  ), $atts);

  // get the latest ask feed posts
  $args = array(
    'post_type'  => 'ask-feed',
    'posts_per_page' =>  $options['qty']
  );
  if ( $options['posts'] != null ) {
    $args['post__in'] = explode(",",$options['posts']);
    $args['orderby'] = 'post__in';
  }
  if ( count($args['post__in']) > 0 ) {
    $content_shortcode = '<div class="recent-question">';

    foreach ( $args['post__in'] as $post_id ) {
      $askfeed_posts = getRemotePosts( 'askdrkathleenhall', $args['post_type'], $post_id, null, $options['qty'], null );
      // iterate over the qty of the included posts
      foreach ($askfeed_posts as $post) {

        // get variables
        $askerTwitterHandle = $post->meta->askers_twitter_handle;
        $askerName = $post->meta->askers_name;
        $askerQuestion = $post->meta->askers_question;
        $response = $post->meta->dr_kathleens_response;
        $externalLink = $post->meta->external_link; // we'll need to actually store some reference to the article later...

        // generate the markup
        $content_shortcode .='
          <div class="question-wrapper">
            <div class="date">
              <h6 class="gray">'.mysql2date('M j, Y',$post->date).'</h6>
            </div>
            <div class="question-entry">
              <div class="icon">
                <a href="http://twitter.com/'.$askerTwitterHandle.'" target="_blank"><img src="'.get_stylesheet_directory_uri().'/wp-content/themes/mindfulliving/images/homepage-twitter-icon.jpg" /></a>
              </div>
              <div class="question">
                <p>'.$askerQuestion.'</p>
                <a href="http://twitter.com/'.$askerTwitterHandle.'" target="_blank"><h6 class="name blue">@'.$askerTwitterHandle.'</h6></a>
              </div>
            </div>
            <div class="answer-entry">
              <div class="icon">
                <img src="/wp-content/themes/mindfulliving/images/homepage-kathleen-twitter-photo-icon.jpg" />
              </div>
              <div class="answer">
                <p>'.$response.'</p>
              </div>';
              if ( $externalLink ) {
                $content_shortcode .='
                  <a href="'.$post->link.'" class="read-more button button-box gray">Read More</a>';
              }
              $content_shortcode .='
            </div>
          </div>';
      }
    }
    $content_shortcode .='<!--<a href="#" class="show-more button">Read More On Twitter >></a>--></div>';
  } else {
    $askfeed_posts = getRemotePosts( 'askdrkathleenhall', $args['post_type'], null, null, $options['qty'], null );
     if ( count( $askfeed_posts ) > 0 ) {
        $content_shortcode = '<div class="recent-question">';

        // iterate over the qty of the included posts
        foreach ($askfeed_posts as $post) {

        // get variables
        $askerTwitterHandle = $post->meta->askers_twitter_handle;
        $askerName = $post->meta->askers_name;
        $askerQuestion = $post->meta->askers_question;
        $response = $post->meta->dr_kathleens_response;
        $externalLink = $post->meta->external_link; // we'll need to actually store some reference to the article later...

        // generate the markup
        $content_shortcode .='
          <div class="question-wrapper">
            <div class="date">
              <h6 class="gray">'.mysql2date('M j, Y',$post->date).'</h6>
            </div>
            <div class="question-entry">
              <div class="icon">
                <a href="http://twitter.com/'.$askerTwitterHandle.'" target="_blank"><img src="/wp-content/themes/mindfulliving/images/homepage-twitter-icon.jpg" /></a>
              </div>
              <div class="question">
                <p>'.$askerQuestion.'</p>
                <a href="http://twitter.com/'.$askerTwitterHandle.'" target="_blank"><h6 class="name blue">@'.$askerTwitterHandle.'</h6></a>
              </div>
            </div>
            <div class="answer-entry">
              <div class="icon">
                <img src="/wp-content/themes/mindfulliving/images/homepage-kathleen-twitter-photo-icon.jpg" />
              </div>
              <div class="answer">
                <p>'.$response.'</p>
              </div>';
              if ( $externalLink ) {
                $content_shortcode .='
                  <a href="'.$post->link.'" class="read-more button button-box gray">Read More</a>';
              }
              $content_shortcode .='
            </div>
          </div>';
      }
      $content_shortcode .='<!--<a href="#" class="show-more button">Read More On Twitter >></a>--></div>';
    } else {
      // fallback for having no ask-feed posts
      $content_shortcode = '<h3>Error. No Ask Feed posts.</h3>';
    }
  }
  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;
}
add_shortcode('recentcommunityquestion', 'recentcommunityquestion_shortcode');
?>