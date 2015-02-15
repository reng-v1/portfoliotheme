<?php
function askfeed_shortcode($atts) {
  $options = shortcode_atts(array(
    'qty' => '1',
    'posts' => null
  ), $atts);

  //ask site
  $askdrkathleenurl = get_field('askdrkathleenhall_source_url', 'option');

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
    $content_shortcode = '';
      // open ask-feed wrapper
      $content_shortcode .= '
          <div class="ask-kathleen-wrapper">
            <div class="grid-row">
              <div class="col small-col-12 medium-col-4 no-gutter">
                <div class="left-side">
                  <img class="photo hide-for-small-only" src="/wp-content/themes/mindfulliving/images/homepage-kathleen-photo.jpg" />
                  <img class="show-for-small-only" src="/wp-content/themes/mindfulliving/images/homepage-kathleen-photo-mobile.jpg" />
                  <div class="hash-text">
                    <p>#<span class="green">ask</span>drkathleen</p>
                  </div>
                </div>
              </div>
              <div class="col small-col-12 medium-col-8">
                <div class="right-side" style="position: relative;">
                  <div class="heading">
                    <h1 class="darkgray hide-for-small-only">Ask Dr. Kathleen</h1>
                  </div>
                  <div id="ask-kathleen-slider" class="swipe slider">
                    <div class="swipe-wrapper">';


    foreach ( $args['post__in'] as $post_id ) {
      $askfeed_posts = getRemotePosts( 'askdrkathleenhall', $args['post_type'], $post_id, null, $args['posts_per_page'] );
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
                      <div class="slide">
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
                          <a href="'.$post->link.'" class="read-more button blue">Read More >></a>';
        }
        $content_shortcode .='
                        </div>
                      </div>';
      }

    }

    // close out the ask-feed wrapper
    $content_shortcode .='
                    </div>
                  </div>
                  <a class="left-arrow"></a>
                  <a class="right-arrow"></a>
                  <a href="'.$askdrkathleenurl.'/ask" class="ask-button button-box orange">Ask A Question</a>
                </div>
              </div>
            </div>
          </div>';
  } else {
    $askfeed_posts = getRemotePosts( 'askdrkathleenhall', $args['post_type'], null, null, $args['posts_per_page'] );
     if ( count( $askfeed_posts ) > 0 ) {
      // open ask-feed wrapper
      $content_shortcode = '
        <div class="ask-kathleen-wrapper">
          <div class="grid-row">
            <div class="col small-col-12 medium-col-4 no-gutter">
              <div class="left-side">
                <img class="photo hide-for-small-only" src="/wp-content/themes/mindfulliving/images/homepage-kathleen-photo.jpg" />
                <img class="show-for-small-only" src="/wp-content/themes/mindfulliving/images/homepage-kathleen-photo-mobile.jpg" />
                <div class="hash-text">
                  <p>#<span class="green">ask</span>drkathleen</p>
                </div>
              </div>
            </div>
            <div class="col small-col-12 medium-col-8">
              <div class="right-side" style="position: relative;">
                <div class="heading">
                  <h1 class="darkgray hide-for-small-only">Ask Dr. Kathleen</h1>
                </div>
                <div id="ask-kathleen-slider" class="swipe slider">
                  <div class="swipe-wrapper">';


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
                    <div class="slide">
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
                        <a href="'.$post->link.'" class="read-more button blue">Read More >></a>';
      }
      $content_shortcode .='
                      </div>
                    </div>';
    }

    // close out the ask-feed wrapper
    $content_shortcode .='
                    </div>
                  </div>
                  <a class="left-arrow"></a>
                  <a class="right-arrow"></a>
                  <a href="'.$askdrkathleenurl.'/ask" class="ask-button button-box orange">Ask A Question</a>
                </div>
              </div>
            </div>
          </div>';

    } else {
      // fallback for having no ask-feed posts
      $content_shortcode = '<h3>Error. No Ask Feed posts.</h3>';
    }
  }
  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;
}
add_shortcode('askfeed', 'askfeed_shortcode');

?>