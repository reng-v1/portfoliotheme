$(document).ready(function(){
	if( $('.fade-gallery').length > 0 ) {
		var fadeGalleries = $('.fade-gallery');
		$(fadeGalleries).each(function() {
			var fadeGallery = new FadeGallery($(this));
			fadeGallery.init();
		});
	}
});

var FadeGallery = function(sel) {
	var images = $(sel).find('.image');
	var thumbnails = $(sel).find('.thumbnail');
	var texts = $(sel).find('.text');

	var reset = function() {
		TweenMax.set(images, {autoAlpha: 0});
		TweenMax.set(texts, {autoAlpha: 0, y: 200});
		$(thumbnails).removeClass('active');
		$(images).removeClass('active');
		$(texts).removeClass('active');
	};

	var initialSetup = function() {
		TweenMax.set(images[0], {autoAlpha: 1});
		TweenMax.set(texts[0], {autoAlpha: 1, y: 0});
		$(thumbnails[0]).addClass('active');
		$(images[0]).addClass('active');
		$(texts[0]).addClass('active');
	};

	var fadeAnim = function(index) {
		for(var i = 0; i < thumbnails.length; i++) {
			$(thumbnails[i]).removeClass('active');
		}
		for(var i = 0; i < texts.length; i++) {
			if($(texts[i]).hasClass('active')) {
				var activeText = $(texts[i]);
				TweenMax.to(activeText, 0.75, {autoAlpha: 0, y: -200, delay: 0.1, onComplete: function() {
					TweenMax.set(activeText, {y: 200});
				}});
				$(activeText).removeClass('active');
			}
		}

		TweenMax.to(images, 0.75, {autoAlpha: 0, delay: 0.1});
		$(images).removeClass('active');

		$(thumbnails[index]).addClass('active');
		$(texts[index]).addClass('active');
		$(images[index]).addClass('active');
		TweenMax.to(images[index], 0.75, {autoAlpha: 1, delay: 0.1});
		TweenMax.to(texts[index], 0.75, {autoAlpha: 1, y: 0, delay: 0.1});
	};

	var init = function() {
		reset();
		initialSetup();

		$(thumbnails).each(function(i) {
			$(this).on('click', function(e){
				e.preventDefault();
				fadeAnim(i);
			});
		});
	};

	return {
		init: function() {
			init();
		}
	};
}; 
