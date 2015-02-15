<?php
// Product Snapshot Shortcode
function productsnapshot_shortcode() {

  // get the latest ask feed posts
  $args = array(
    'post_type'  => 'product',
    'posts_per_page' =>  3,
    'order' => 'category',
    'category_name' => 'featured',
    'order' => 'desc'
  );

  $productsnapshot_posts = getRemotePosts( 'drkathleenhall', $args['post_type'], null, $args['category_name'], $args['posts_per_page'] );

  if ( count( $productsnapshot_posts ) > 0 ) {
    $content_shortcode = '
    <div class="product-snapshots">
      <div class="outside-heading">Mindful Living Market &reg;</div>
        <div class="box shadow-box">
          <div class="product-snapshot-wrapper grid-row">';
    foreach ($productsnapshot_posts as $post) {
      $productName = $post->title;
      $productImage = $post->meta->product_image;
      $productDescription = $post->meta->product_description;
      $ProductPrice = $post->meta->product_price;
      $producturl = $post->meta->product_url;

      $content_shortcode .='

          <div class="col small-col-12 medium-col-4">
            <div class="product">
              <h5 class="sub-header">'.$post->title.'</h5>
              <a href="'.$producturl.'" target="_blank"><img class="full" src="'.$productImage.'" /></a>
              <div class="content">
                <h6 class="price">Price: <span class="blue">$'.$ProductPrice.'</span></h6>
                <div class="text white-fade">
                  <p>'.$productDescription.'</p>
                </div>
                <a class="more-info button blue" href="'.$producturl.'" target="_blank">More Info >></a>
              </div>
            </div>
          </div>';
      }
      $content_shortcode .='
        </div>
      </div>
    </div>';
    } else {
    // fallback for having no product posts
    $content_shortcode = '<h3>Error. No product posts.</h3>';
  }

  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;

}
add_shortcode('productsnapshot', 'productsnapshot_shortcode');
?>