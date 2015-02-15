<?php
  // Product Preview Shorcode
  function productpreview_shortcode($atts, $content) {
    $options = shortcode_atts( array(
      'justtext'    => false,
      'titlecolor'  => orange, /*orange, blue, green, pink, black*/
      'titletext'   => null,
      'textalign'   => null, /*left-top, left-middle, left-bottom, right-top, right-middle right-bottom*/
      'style'        => null, /*dark, light*/
      'classes'      => null, /*box shadow-box*/
      'id'           => null,
      'name'         => null,
      'category'     => null,
      'target'      => '_blank'
    ), $atts );

    if($options['justtext'] == false) {
      // get the products post
      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 1,
        'p'              => $options['id'],
        'name'           => $options['name'],
        'category_name'  => $options['category']
      );

      $productpreview_query = getRemotePosts( 'drkathleenhall', $args['post_type'], $options['id'], $options['category'], 1 );

      if ( count( $productpreview_query ) > 0 ) {
        foreach ( $productpreview_query as $post ) {
          // get variables
          $productName       = $post->title;
          $productImage      = $post->meta->product_image;
          $productPrice      = $post->meta->product_price;
          $productButtonText = $post->meta->product_price_text;
          $producturl        = $post->meta->product_url;

          $content_shortcode = '
            <div class="'.$options['classes'].' shop-products" style="background-image: url('.$productImage.')">
              <a href="'.$producturl.'" target="_blank"><img src="'.$productImage.'" /></a>
            </div>
            <div class="shop-product-content">
              <h2 class="sub-header">'.$productName.'</h2>
              <a class="button-box center-align darkgray" target="'.$options['target'].'" href="'.$producturl.'">'.$productButtonText.' $'.$productPrice.'</a>
            </div>';
        }
      }
    }else {
      $content_shortcode = '
      <div class="shop-products">
        <h2 class="sub-header just-text"><span class="'.$options['titlecolor'].'">'.$options['titletext'].'</span>'.do_shortcode($content).'</h2>
      </div>';
    }
    // reset for multiple loop usage
    wp_reset_postdata();

    return $content_shortcode;
  }
  add_shortcode('productpreview', 'productpreview_shortcode');
?>