<?php
// Blog Post Preview Shortcode
function blogpost_preview_shortcode($atts) {
  $options = shortcode_atts( array(
    'id'              => null,
    'name'            => null,
    'category'        => null,
    'source'          => null,
    'style'           => null,   /*image, heavy, small*/
    'classes'         => null,   /*box shadow-box*/
    'buttonclasses'   => null,   /*rounded solid-bg*/
    'buttoncolor'     => orange  /*orange, green, blue, darkgray*/
  ), $atts );

  $blogpostpreview_posts = getRemotePosts( $options['source'], null, $options['id'], $options['category'], 1 );
  switch ( $options['style'] ) {
    case 'small':
      if ( count( $blogpostpreview_posts ) > 0 ) {
        foreach( $blogpostpreview_posts as $post) {
          // get variables
          $content_shortcode = '
                      <div class="blog-wrapper small">
                        <div class="heading">
                          <h4>From The Blog</h4>
                        </div>
                        <h5 class="title-header sub-header">'.substr( $post->title, 0, 24 );
                        if ( strlen( $post->title ) > 24 ) {
                          $content_shortcode .='...</h5>';
                        } else {
                          $content_shortcode .='</h5>';
                        }

          $content_shortcode .='
                        <div class="grid-row">
                          <div class="col small-col-12 large-col-9">
                            <div class="text">
                              <p>'.substr( $post->excerpt, 0, 75 ).' ...</p>
                            </div>
                          </div>';
                          if( $post->link ){
                          $content_shortcode .='<div class="col small-col-12 large-col-3">
                            <div class="bottom-button">
                              <a href="'.$post->link.'" class="button-box '.$options['buttoncolor'].' '.$options['buttonclasses'].' equilateral65"><i class="icon ion-arrow-right-c"></i></a>
                            </div>
                          </div>';
                          }
          $content_shortcode .='</div>
                      </div>
                    ';
        }
      } else {
        // fallback for having no ask-feed posts
        $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
      }
      break;
    case 'image':
      if ( count( $blogpostpreview_posts ) > 0 ) {
        $blogPost = $blogpostpreview_posts[0];
        $content_shortcode = '<div class="blog-wrapper image-wrapper '.$blogPost->ID.'">';
        if ( $blogPost->featured_image != null ) {
        $post_thumbnail_url = $blogPost->featured_image->guid;
        $content_shortcode .= '<div class="blog-image with-thumbnail" style="display: block; position: relative; background-image: url('.$post_thumbnail_url.'); background-position: center; background-size: cover;">
            <a href="'.$blogPost->link.'" style="display: inline-block; position: relative; overflow: hidden;">
              <img class="image full" src="'.$post_thumbnail_url.'" alt="'.$blogPost->title.'" />
            </a>
          </div>';
        } else {
        $content_shortcode .= '<div class="blog-image no-thumbnail '.$options['source'].'" style="display: block; position: relative; background-position: center; background-size: cover;">
            <a href="<?php'.$blogPost->link.'">
              <img class="image full" src="http://placehold.it/725x483&text=Image%20Missing" alt="'.$blogPost->title.'" />
            </a>
          </div>';
        }
        $content_shortcode .= '<h6 class="date gray">'.mysql2date('M j Y',$blogPost->date).'</h6>';
        $postTitle = strlen( $blogPost->title ) > 65 ? substr( $blogPost->title, 0, 62 ).'...' : $blogPost->title;
        $content_shortcode .= '<h5 class="title-header sub-header"><a href="'.$blogPost->link.'">'.$postTitle.'</a></h5>';
        $content_shortcode .= '<div class="grid-row">'.
              '<div class="col small-col-12 no-padding">
                <div class="read-now-wrapper">
                  <a class="read-now" href="<?php echo $blogPost->link; ?>">Read Now</a>
                </div>';
        $content_shortcode .= '<!--<a class="save-btn ion-heart" href="#"><h6>Save</h6></a>-->
              </div>
            </div>
          </div>
        </div>';
      } else {
        // fallback for having no ask-feed posts
        $content_shortcode = '<h3>Error. No blog preview posts.</h3>';
      }
      break;
    case 'heavy':
      if ( count( $blogpostpreview_posts ) > 0 ) {
        foreach( $blogpostpreview_posts as $post) {

          $content_shortcode = '<div class="blog-wrapper heavy '.$post->ID.'">';
          if ( $post->meta->youtube_id ) {
          $content_shortcode .= '<div class="blog-image youtube" style="display: block; position: relative; background-position: center; background-size: cover;">
                          <a href="'.$post->link.'" style="display: inline-block; position: relative; overflow: hidden;">
                            <img class="youtubevideo" src="http://img.youtube.com/vi/'.$post->meta->youtube_id.'/0.jpg">
                          </a>
                        </div>';
          } else if ( $post->featured_image != null ) {
            $post_thumbnail_url = $post->featured_image->guid;
          $content_shortcode .= '<div class="blog-image with-thumbnail" style="display: block; position: relative; background-image: url('.$post_thumbnail_url.'); background-position: center; background-size: cover;">
                          <a href="'.$post->link.'" style="display: inline-block; position: relative; overflow: hidden;">
                            <img class="image full" style="min-height: 210px; visibility: hidden;" src="'.$post_thumbnail_url.'" alt="'.$post->title.'" />
                          </a>
                        </div>';
          } else {
          $content_shortcode .= '<div class="blog-image no-thumbnail '.$options['source'].'" style="display: block; position: relative; background-position: center; background-size: cover;">
                          <a href="'.$post->link.'" style="display: inline-block; position: relative; overflow: hidden;">
                            <img class="image full" style="min-height: 210px; visibility: hidden;" src="http://placehold.it/725x483&text=Image%20Missing" alt="'.$post->title.'" />
                          </a>
                        </div>';
          }
          $content_shortcode .= '<div class="grid-row">
                          <div class="col small-col-12 no-padding">';
          // set up custom colors for category
          $defaultBkgColor = get_field('default_category_color', 'options');
          $defaultTextColor = get_field('default_text_color', 'options');
          $categoriesWithColors = get_field('category_color_assignments', 'options');
          $categoryMatchFound = false;
          $categories = $post->terms->category;
          $mainCategory = $categories[0]->name;
          // assigning variable we'll use below
          $thisCategoryBkgColor = $defaultBkgColor;
          $thisCategoryTxtColor = $defaultTextColor;
          foreach( $categoriesWithColors as $assignedColorCategory ) {
            if ( $mainCategory == $assignedColorCategory['category']->name ) {
              $thisCategoryBkgColor = $assignedColorCategory['color_to_display'];
              $thisCategoryTxtColor = $assignedColorCategory['text_color'];
            }
          }
          $content_shortcode .= '<div class="categories" style="background-color: '.$thisCategoryBkgColor.';">';
          $c = 1;
          foreach( $categories as $category ) {
            $content_shortcode .= '<a href="'.$category->link.'" style="display: inline-block; width: auto; margin-right: 1rem; color: '.$thisCategoryTxtColor.';"><h6 style="display: inline-block;">'.$category->name;
            if ( count( $categories ) > 0 && $c < count( $categories ) ) {
              //$content_shortcode .= ',</h6></a>';
              $content_shortcode .= '</h6></a>';
            } else {
              $content_shortcode .= '</h6></a>';
            }
            $c++;
            break;
          }
          $content_shortcode .= '</div>
                          </div>
                        </div>
                        <h6 class="date gray">'.mysql2date('M j Y',$post->date).'</h6>
                        <div class="grid-row">
                          <div class="col small-col-12">';
          $postTitle = ( strlen( $post->title ) > 24) ? substr( $post->title, 0, 24 ).'...' : substr( $post->title, 0, 24 );
          $content_shortcode .= '<h5 class="title-header sub-header"><a href="'.$post->link.'">'.$postTitle.'</a></h5>
                            <div class="text">';
          $postExcerpt = ( strlen( $post->excerpt ) > 115) ? substr( $post->excerpt, 0, 115 ).'...' : substr( $post->excerpt, 0, 115 );
          $content_shortcode .= '<p>'.$postExcerpt.'</p>
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
    default:
    // do nothing
      break;
  }
  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;

}
add_shortcode('blogpostpreview', 'blogpost_preview_shortcode');
?>