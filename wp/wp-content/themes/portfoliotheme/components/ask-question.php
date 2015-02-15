<?php
//Ask Question Shortcode
function askquestion_shortcode($atts) {
  $options = shortcode_atts( array(),$atts);

  $content_shortcode = '
    <div class="askdrkathleen-wrapper box shadow-box" style="background-image: url('.'/wp-content/themes/mindfulliving/images/askkathleen-banner.png'.'); min-height: 434px;">
      <div class="offwhite content">
        <h1 class="sub-header ion-social-twitter forty">#<i><strong>ask</strong></i>drkathleen</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec purus in ante pretium blandit. Aliquam erat volutpat. Nulla libero lectus?</p>
        <form>
          <textarea class="textbox"></textarea>
          <label>140 Characters Max</label>
          <input class="ask-btn offwhite button button-box" type="button" name="submit" value="Ask a Question">
        </form>
      </div>
    </div>
  ';

  return $content_shortcode;
}
add_shortcode('askquestion', 'askquestion_shortcode');
?>