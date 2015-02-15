<?php
//Sister Banner Sites Shortcode
function sisterbannersites_shortcode($atts, $content) {
  $options = shortcode_atts(array(
    'imageurl' => null,
    'link'     => null,
    'title'    => null,
    'target'   => '_blank'
  ), $atts);

  $content_shortcode = '
  <div class="outside-heading">'.$options['title'].'</div>
  <div class="box shadow-box article-snapshot">
    <a target="'.$options['target'].'" href="'.$options['link'].'"><img class="full" src="'.$options['imageurl'].'" /></a>
    <div class="content">
      '.$content.'
    </div>';
    if($options['link']) {
      $content_shortcode .='<a target="'.$options['target'].'" class="button-box darkgray read-more" href="'.$options['link'].'">Read More</a>';
    }
  $content_shortcode .= '
  </div>';

  // reset for multiple loop usage
  wp_reset_postdata();

  return $content_shortcode;
}

add_shortcode('sisterbannersites', 'sisterbannersites_shortcode');
?>