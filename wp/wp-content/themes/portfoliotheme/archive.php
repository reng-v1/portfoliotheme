<?php
/*
Template Name: Way I see It Page Template
*/

get_header(); ?>

<div class="grid-row">
  <div class="col small-col-12">
  	<h4 class="title-header sub-header">Overview:</h4>
    <p>This is our TWIST on PROGRAMMING – Take your shot and turn the camera around and show us your point of view – uncut and unedit- ed. There has never been a forum quite like this to share your vision on how you would change the world. You‘re the director or star of this show as you make your statement in “The Way I See iT!” Email your 1-2 minute personal vision to info@mindfullivingnetwork.com, philosophy or story on how to help others transform their lives or change the world. If your shot does not make the cut, try again next week. The world can‘t wait to hear from you. Mindful Living Network® accepts only files of appropriate size and length.</p>
	</div>
</div>

<?php $currentCat = get_category( $cat ); ?>

<?php

$blogpostpage_query = getRemotePosts( 'askdrkathleenhall', null, null, $currentCat->slug, 9, null, true);
$blogposts = $blogpostpage_query['posts'];
if ( count( $blogposts ) > 0 ) {
?>
<div class="blog-roll-wrapper">
<div class="grid-row">
<?php
  $i = 1;
  foreach( $blogposts as $post) {
    foreach ( $post->terms->category as $category ) { $postCategory = $category->slug;  } //grab categery name
    $youtubeID = $post->meta->youtube_id;
    $categoryMatchFound = false;
?>
	<div class="col small-col-12 medium-col-4">
    <div class="blog-wrapper heavy <?php echo $post->ID; ?> recent-twist">
      <?php if ( $post->meta->youtube_id ) { ?>
      <div class="blog-image youtube" style="display: block; position: relative; background-position: center; background-size: cover; background-image: url('http://img.youtube.com/vi/<?php echo $post->meta->youtube_id; ?>/0.jpg'); ">
        <a href="<?php echo $post->link; ?>" style="display: inline-block; position: relative; overflow: hidden;">
          <img class="youtubevideo" src="http://img.youtube.com/vi/<?php echo $post->meta->youtube_id; ?>/0.jpg">
        </a>
      </div>
      <?php } else if ( $post->featured_image->guid ) {
        $post_thumbnail_url = $post->featured_image->guid;
      ?>
      <div class="blog-image with-thumbnail" style="display: block; position: relative; background-image: url('<?php echo $post_thumbnail_url; ?>'); background-position: center; background-size: cover;">
        <a href="<?php echo $post->link; ?>" style="display: inline-block; position: relative; overflow: hidden;">
          <img class="image full" style="min-height: 210px; visibility: hidden;" src="<?php echo $post_thumbnail_url; ?>" alt="<?php $post->title; ?>" />
        </a>
      </div>
      <?php } else { ?>
      <div class="blog-image no-thumbnail askdrkathleenhall" style="display: block; position: relative; background-position: center; background-size: cover;">
        <a href="<?php echo $post->link; ?>" style="display: inline-block; position: relative; overflow: hidden;">
          <img class="image full" style="min-height: 210px; visibility: hidden;" src="http://placehold.it/725x483&text=Image%20Missing" alt="<?php $post->title; ?>" />
        </a>
      </div>
      <?php } ?>
      <div class="grid-row">
        <div class="col small-col-12 no-padding">
          <?php
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
          ?>
          <div class="categories" style="background-color: <?php echo $thisCategoryBkgColor; ?>;">
            <?php $c = 1;
              foreach( $categories as $category ) { ?>
            <a href="<?php echo $category->link; ?>" style="display: inline-block; width: auto; margin-right: 1rem; color: <?php echo $thisCategoryTxtColor; ?>;"><h6 style="display: inline-block;"><?php echo $category->name; ?><?php if ( count( $categories ) > 0 && $c < count( $categories ) ) {
              //echo ',';
              } ?></h6></a>
            <?php $c++;
              break;
              } ?>
          </div>
        </div>
      </div>
      <h6 class="date gray"><?php echo mysql2date('M j Y',$post->date); ?></h6>
      <div class="grid-row">
        <div class="col small-col-12">
          <?php $postTitle = ( strlen( $post->title ) > 24) ? substr( $post->title, 0, 24 ).'...' : substr( $post->title, 0, 24 ); ?>
          <h5 class="title-header sub-header"><a href="<?php echo $post->link; ?>"><?php echo $postTitle ?></a></h5>
          <div class="text">
            <?php $postExcerpt = ( strlen( $post->excerpt ) > 115) ? substr( $post->excerpt, 0, 115 ).'...' : substr( $post->excerpt, 0, 115 ); ?>
            <p><?php echo $postExcerpt; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php if ( $i % 3 == 0 && $i != count($blogposts) ) { ?>
</div><div class="grid-row"> <!-- close grid-row and start a new one -->
<?php } else if ( $i == count($blogposts) ) { ?>
</div> <!-- close grid-row -->
<?php } ?>
<?php
	 $i++;
}
?>
</div>
  <?php if ( $blogpostpage_query['totalPages'] > 1 ) { ?>
  <div class="grid-row">
    <div class="col small-col-12 medium-col-4">&nbsp;</div>
  	<div class="col small-col-12 medium-col-4">
  		<a class="button-box green load-more" data-current-page="1" data-total-pages="<?php echo $blogpostpage_query['totalPages']; ?>" data-total-posts="<?php echo $blogpostpage_query['totalPosts']; ?>" href="#">Load More</a>
  	</div>
  	<div class="col small-col-12 medium-col-4">&nbsp;</div>
  </div>
  <?php } ?>
<?php } else { ?>
  <div class="grid-row ">
    <div class="col small-col-12">
      <div class="page-builder wysiwyg">
        <div class="outside-heading">Sorry, no posts found.</div>
      </div>
    </div>
  </div><?php } ?>
<?php
  $drkathleenhallURL = get_field('drkathleenhall_source_url', 'option');
  $askdrkathleenhallURL = get_field('askdrkathleenhall_source_url', 'option');
  $thestressinstituteURL = get_field('thestressinstitute_source_url', 'option');
  $mindfullivingnetworkURL = get_field('mindfullivingnetwork_source_url', 'option');
  // map them to an array for reference
  $networkURLs = array(
    'drkathleenhall' => $drkathleenhallURL,
    'askdrkathleenhall' => $askdrkathleenhallURL,
    'thestressinstitute' => $thestressinstituteURL,
    'mindfullivingnetwork' => $mindfullivingnetworkURL
  );
  // store our current site nickname, and we'll use it as the reference index
  $thisSiteURL = get_field('this_site', 'option');
?>
<script>
var colorInformation = {
  <?php
  $defaultBkgColor = get_field('default_category_color', 'options');
  $defaultTextColor = get_field('default_text_color', 'options');
  $categoriesWithColors = get_field('category_color_assignments', 'options');
  $i = 0;
  echo "'default' : {";
  echo   "'background_color' : '".$defaultBkgColor."',";
  echo   "'color' : '".$defaultTextColor."'";
  echo "},";
  foreach( $categoriesWithColors as $assignedColorCategory ) {
    echo "'".$assignedColorCategory['category']->name."' : {";
    echo   "'background_color' : '".$assignedColorCategory['color_to_display']."',";
    echo   "'color' : '".$assignedColorCategory['text_color']."'";
    echo "}";
    if ( $i+1 != count( $categoriesWithColors ) ) {
      echo ',';
    }
    $i++;
  }
  ?>
}
function customFormatDate( date ) {
  console.log( )
  var m_names = new Array("Jan", "Feb", "Mar",
  "Apr", "May", "Jun", "Jul", "Aug", "Sep",
  "Oct", "Nov", "Dec");

  var d = new Date(date);
  var curr_date = d.getDate();
  var curr_month = d.getMonth();
  var curr_year = d.getFullYear();
  return  m_names[curr_month] + ' ' + curr_date + ' ' + curr_year;
}
$(document).ready( function(){
  // load-more button functionality
  if ( $('a.load-more').length > 0 && ('.blog-roll-wrapper').length > 0 ) {
    $loadMore = $('a.load-more');
    $('a.load-more').on( 'click', function(e){
      e.preventDefault();
      var nextPage = $loadMore.data('current-page')+1;
      var lastPage = ( $loadMore.data('total-pages') === nextPage );
      $loadMore.after('<img class="loading-gif" style="display: block; margin: 0 auto;" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ajax-loader.gif" />');
      $.ajax({
        url: '<?php echo $networkURLS[$thisSiteURL] ?>/wp-json/posts?page='+nextPage+'&filter[posts_per_page]=9&filter[category_name]=<?php echo $currentCat->slug ?>'
      })
        .done(function( data ) {
          var allHTML = '';
          for ( var i=1; i<data.length+1; i++ ) {

            var htmlString = ( i === 1 ) ? '<div class="grid-row">' : '';
            // prepare variables
            var postID      = data[i-1]['ID'],
                postTitle   = data[i-1]['title'],
                postLink    = data[i-1]['link'],
                youtubeID   = data[i-1]['meta']['youtube_id'],
                featImage   = data[i-1]['featured_image'] ? data[i-1]['featured_image']['guid'] : false,
                postDate    = data[i-1]['date'],
                postExcerpt = data[i-1]['excerpt'],
                categories  = data[i-1]['terms']['category'];
                categoryslug =
            // prepare an html string
            htmlString += '<div class="col small-col-12 medium-col-4">'+
                            '<div class="blog-wrapper heavy '+postID+'">';
            if ( youtubeID ) {
            htmlString +=       '<div class="blog-image youtube" style="display: block; position: relative; background-position: center; background-size: cover; background-image: url("http://img.youtube.com/vi/'+youtubeID+'/0.jpg");">'+
                                  '<a href="'+postLink+'" style="display: inline-block; position: relative; overflow: hidden;">'+
                                    '<img class="image full" style="min-height: 210px; visibility: hidden;" src="http://img.youtube.com/vi/'+youtubeID+'/0.jpg");" alt="" />'+
                                  '</a>'+
                                '</div>';
            } else if ( featImage ) {
            htmlString +=       '<div class="blog-image with-thumbnail askdrkathleenhall" style="display: block; position: relative; background-position: center; background-size: cover; background-image: url('+featImage+');" >'+
                                  '<a href="'+postLink+'" style="display: inline-block; position: relative; overflow: hidden;">'+
                                    '<img class="image full" style="min-height: 210px; visibility: hidden;" src="'+featImage+'" alt="" />'+
                                  '</a>'+
                                '</div>';
            } else {
            htmlString +=       '<div class="blog-image no-thumbnail askdrkathleenhall" style="display: block; position: relative; background-position: center; background-size: cover;">'+
                                  '<a href="'+postLink+'" style="display: inline-block; position: relative; overflow: hidden;">'+
                                    '<img class="image full" style="min-height: 210px; visibility: hidden;" src="http://placehold.it/725x483&amp;text=Image%20Missing" alt="" />'+
                                  '</a>'+
                                '</div>';
            }
            var catName       = categories[0]['name'],
                colorSettings = ( typeof colorInformation[catName] != 'undefined' ) ? colorInformation[catName] : colorInformation['default'],
                catSlug       = categories[0]['link'];
            htmlString +=       '<div class="grid-row">'+
                                  '<div class="col small-col-12 no-padding">'+
                                    '<div class="categories" style="background-color: '+colorSettings.background_color+';">';
            /*
            for ( var c = 0; c<categories.length; c++ ) {
              var catName = ( c === categories.length ) ? categories[c]['name'] : categories[c]['name']+',';
              htmlString +=       '<a href="category/'+catName+'/" style="display: inline-block; width: auto; margin-right: 1rem; color: #000000;"><h6 style="display: inline-block;">'+catName+'</h6></a>';
            }
            */
              htmlString +=       '<a href="'+catSlug+'" style="display: inline-block; width: auto; margin-right: 1rem; color:'+colorSettings.color+';"><h6 style="display: inline-block;">'+catName+'</h6></a>';
            htmlString +=           '</div>'+
                                  '</div>'+
                                '</div>'+
                                '<h6 class="date gray">'+customFormatDate(postDate)+'</h6>'+
                                '<div class="grid-row">'+
                                  '<div class="col small-col-12">'+
                                    '<h5 class="title-header sub-header"><a href="'+postLink+'">'+postTitle.substring( 0, 24 )+'...</a></h5>'+
                                    '<div class="text">'+
                                      '<p>'+postExcerpt.substring( 0, 115 )+'...</p>'+
                                    '</div>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>';
            // generate scaffolding for these posts
            if ( data.length+1 === i ) {
              htmlString += '</div><!--data.length -->';
            } else if ( i % 3 === 0 ) {
              htmlString += '</div><!-- divisible by 3 --><div class="grid-row">';
            }
            allHTML += htmlString;
          }
          $('.blog-roll-wrapper').append(allHTML);
          $loadMore.data('current-page', nextPage);
          $loadMore.siblings('.loading-gif').remove();
          if ( lastPage ) {
            $loadMore.remove();
          }
        });
    })
  }
});
</script>

<?php get_footer(); ?>