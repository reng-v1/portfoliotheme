<?php
//Client Showcase Shortcode
function clientshowcase_shortcode($atts) {
  $options = shortcode_atts(array(
    'qtyperpage' => 8
  ), $atts);

  // get the latest client posts
  $args = array(
    'post_type'      => 'client',
    'posts_per_page' => '-1'
  );

  // 1. Get all posts type 'client'
  $client_query = getRemotePosts( 'drkathleenhall', $args['post_type'], null, null, -1, null);

  // 2. Sort them into groups based on category
  //variables to group the post
  $mediaPosts = array();
  $spokespersonPosts = array();
  $clientPosts = array();
  if( count( $client_query ) > 0 ) {
    foreach($client_query as $post) {
      if ( is_array($post->terms->category) ) {
        foreach ( $post->terms->category as $category ) {
      	$clientCategory = $category->slug;
          if ( $clientCategory === 'media' ) {
            array_push($mediaPosts, $post);
          }
          if ( $clientCategory === 'spokesperson' ) {
            array_push($spokespersonPosts, $post);
          }
          if ( $clientCategory === 'client' ) {
            array_push($clientPosts, $post);
          }
        }
      }
    }
  }

  // 3. Start slideshow markup
  $content_shortcode =
    '<div class="client-showcase">
        <div id="client-slider" class="swipe">
          <div class="swipe-wrapper">';
  // 4. Loop through the category groups and place them into slides as needed
  //interview slides
  if( count($clientPosts) > 0 ) {
    $content_shortcode .= '<div class="slide interviews"><h4 class="title-header center-align darkgray">Clients</h4>';
    $currentIndex = 1;
    foreach($clientPosts as $post) {
      $clientName = $post->meta->client_name;
      $clientLogo = $post->meta->client_image->url;

      $content_shortcode .= '<div class="client-logo image-'.$currentIndex.'" style="background-image:url('.$clientLogo.');"></div>';
        if ( ($currentIndex % $options['qtyperpage']) == 0 && $currentIndex != count( $clientPosts ) ) {
          $content_shortcode .= '</div><div class="slide interviews"><h4 class="title-header center-align darkgray">Clients</h4>';
        } elseif ( $currentIndex == count( $clientPosts ) ) {
          $content_shortcode .= '</div>';
        }
        $currentIndex++;
    }
  }

  //media slides
  if( count($mediaPosts) > 0 ) {
    $content_shortcode .= '<div class="slide media"><h4 class="title-header center-align darkgray">Media</h4>';
    $currentIndex = 1;
    foreach($mediaPosts as $post) {
      $clientName = $post->meta->client_name;
      $clientLogo = $post->meta->client_image->url;

      $content_shortcode .= '<div class="client-logo image-'.$currentIndex.'" style="background-image:url('.$clientLogo.');"></div>';
        if ( ($currentIndex % $options['qtyperpage']) == 0 && $currentIndex != count( $mediaPosts ) ) {
          $content_shortcode .= '</div><div class="slide media"><h4 class="title-header center-align darkgray">Media</h4>';
        } elseif ( $currentIndex == count( $mediaPosts ) ) {
          $content_shortcode .= '</div>';
        }
        $currentIndex++;
    }
  }

  //spokesperson slides
  if( count($spokespersonPosts) > 0 ) {
    $content_shortcode .= '<div class="slide spokesperson"><h4 class="title-header center-align darkgray">Spokesperson</h4>';
    $currentIndex = 1;
    foreach($spokespersonPosts as $post) {
      $clientName = $post->meta->client_name;
      $clientLogo = $post->meta->client_image->url;

      $content_shortcode .= '<div class="client-logo image-'.$currentIndex.'" style="background-image:url('.$clientLogo.');"></div>';
        if ( ($currentIndex % $options['qtyperpage']) == 0 && $currentIndex != count( $spokespersonPosts ) ) {
          $content_shortcode .= '</div><div class="slide spokesperson"><h4 class="title-header center-align darkgray">Spokesperson</h4>';
        } elseif ( $currentIndex == count( $spokespersonPosts ) ) {
          $content_shortcode .= '</div>';
        }
        $currentIndex++;
    }
  }


  // 5. Close slideshow markup
  $content_shortcode .=
          '</div>
        </div>
      </div>';

  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;
}

add_shortcode('clientshowcase', 'clientshowcase_shortcode');
?>