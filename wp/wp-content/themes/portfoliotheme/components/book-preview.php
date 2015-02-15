<?php
  // Book Preview Shorcode
  function bookpreview_shortcode($atts) {
    $options = shortcode_atts( array(
      'style'           => null, // full-left, full-right, rotate-gallery, one-third
      'qty'             => 1,
      'id'              => null,
      'name'            => null,
      'category'        => null,
      'target'          => '_blank'
    ), $atts );

    // get the latest blog post previews
    $args = array(
      'post_type'      => 'books',
      'posts_per_page' => $options['qty'],
      'p'              => $options['id'],
      'name'           => $options['name'],
      'category_name'  => $options['category']
    );

    $bookpreview_query = getRemotePosts( 'drkathleenhall', $args['post_type'], $options['id'], $options['category'], $options['qty'] );

        switch($options['style']){
          case 'full-left':
            if ( count( $bookpreview_query ) > 0 ) {
              foreach ( $bookpreview_query as $post ) {
                // get variables
                $bookSubHeader   = $post->meta->subtitle;
                $bookDescription = $post->meta->description;
                $bookCover       = $post->meta->cover_image->url;
                $bookPrice       = $post->meta->price;
                $bookURL         = $post->meta->shop_url;

                $content_shortcode = '
                  <div class="full-book-preview">
                    <div class="grid-row">
                      <div class="col small-col-12 medium-col-4">
                        <a href="'.$bookURL.'" target="_blank"><div class="image"><img src="'.$bookCover.'" /></div></a>
                      </div>
                      <div class="col small-col-12 medium-col-8">
                        <div class="content">
                          <h5 class="sub-header">'.$post->title.'</h5>
                          <h6 class="sub-header">'.$bookSubHeader.'</h6>
                          <div class="text white-fade">'.substr( $bookDescription, 0, 300 ).'</div>';
                          if($bookURL) {
                          $content_shortcode .= '
                          <a class="button-box gray right" target="'.$options['target'].'" href="'.$bookURL.'">More Info</a>';
                          }
                          $content_shortcode .='
                        </div>
                      </div>
                    </div>
                  </div>';
              }
            } else {
              // fallback for having no ask-feed posts
              $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
            }
            break;
          case 'full-right':
            if ( count( $bookpreview_query ) > 0 ) {
              foreach ( $bookpreview_query as $post ) {
                // get variables
                $bookSubHeader   = $post->meta->subtitle;
                $bookDescription = $post->meta->description;
                $bookCover       = $post->meta->cover_image->url;
                $bookPrice       = $post->meta->price;
                $bookURL         = $post->meta->shop_url;

                $content_shortcode = '
                  <div class="full-book-preview">
                    <div class="grid-row">
                      <div class="col small-col-12 show-for-small-only">
                        <a href="'.$bookURL.'" target="_blank"><div class="image"><img src="'.$bookCover.'" /></div></a>
                      </div>
                      <div class="col small-col-12 medium-col-8">
                        <div class="content">
                          <h5 class="sub-header">'.$post->title.'</h5>
                          <h6 class="sub-header">'.$bookSubHeader.'</h6>
                          <div class="text white-fade">'.substr( $bookDescription, 0, 300 ).'</div>';
                          if($bookURL) {
                          $content_shortcode .= '
                          <a class="button-box gray left" target="'.$options['target'].'" href="'.$bookURL.'">More Info</a>';
                          }
                          $content_shortcode .='
                        </div>
                      </div>
                      <div class="col small-col-12 medium-col-4 hide-for-small-only">
                        <a href="'.$bookURL.'" target="_blank"><div class="image"><img src="'.$bookCover.'" /></div></a>
                      </div>
                    </div>
                  </div>';
              }
            } else {
              // fallback for having no ask-feed posts
              $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
            }
            break;
          case 'one-third':
            if ( count( $bookpreview_query ) > 0 ) {
              foreach ( $bookpreview_query as $post ) {
                // get variables
                $bookSubHeader   = $post->meta->subtitle;
                $bookDescription = $post->meta->description;
                $bookCover       = $post->meta->cover_image->url;
                $bookPrice       = $post->meta->price;
                $bookURL         = $post->meta->shop_url;

                $content_shortcode = '
                <div class="book-previews">
                  <div class="book-preview long">
                    <a href="'.$bookURL.'" target="_blank"><img class="full" src="'.$bookCover.'" /></a>
                    <div class="text white-fade">
                      <div class="content">
                        <h5 class="sub-header">'.$post->title.'</h5>
                        <p>'.$bookSubHeader.'</p>
                        '.substr( $bookDescription, 0, 500 ).'
                      </div>
                    </div>';
                    if($bookURL) {
                    $content_shortcode .= '
                    <a class="button-box darkgray" target="'.$options['target'].'" href="'.$bookURL.'">More Info</a>';
                    }
                    $content_shortcode .='
                  </div>
                </div>';
              }
            } else {
              // fallback for having no ask-feed posts
              $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
            }
            break;
          case 'rotate-gallery':
            if ( count( $bookpreview_query ) > 0 ) {

                $content_shortcode = '
                <div class="book-preview-coverflow">
                  <div class="outside-heading">Books From Dr. Kathleen</div>
                  <div class="box shadow-box padding">
                    <div class="book-carousel">
                      <div class="rotate-gallery">';
                        $i = 0;
                        foreach ( $bookpreview_query as $post ) {
                          // get variables
                          $bookCover       = $post->meta->cover_image->url;
                          $bookURL         = $post->meta->shop_url;

                          $content_shortcode .='
                          <div class="book index-'.$i.'"><a href="'.$bookURL.'" target="_blank"><img src="'.$bookCover.'" alt="'.$post->title.'" /></a></div>';
                          $i++;
                        }
                        $content_shortcode .='
                              <a class="arrow-left" href="#"></a>
                              <a class="arrow-right" href="#"></a>
                            </div>
                            <div class="slide-gallery swipe">
                              <div class="swipe-wrapper">';
                        $j = 0;
                        foreach ( $bookpreview_query as $post ) {
                          // get variables
                          $bookSubHeader   = $post->meta->subtitle;
                          $bookDescription = $post->meta->description;
                          $bookURL         = $post->meta->shop_url;

                          $content_shortcode .='
                              <div class="text index-'.$j.' current">
                                <div class="content">
                                  <h5 class="sub-header"><strong>'.$post->title.'</strong></h5>
                                  <h6 class="sub-header">'.$bookSubHeader.'</h6>
                                  <p>'.substr( $bookDescription, 0, 200 ).'</p>';
                                  if($bookURL) {
                                  $content_shortcode .= '
                                  <a class="button" target="'.$options['target'].'" href="'.$bookURL.'">More Info >></a>';
                                  }
                                  $content_shortcode .='
                                </div>
                              </div>';
                          $j++;
                        }
                        $content_shortcode .='
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';
            } else {
              // fallback for having no ask-feed posts
              $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
            }
            break;
          default:
            break;
    }
    // reset for multiple loop usage
    wp_reset_postdata();

    return $content_shortcode;
  }
  add_shortcode('bookpreview', 'bookpreview_shortcode');
?>