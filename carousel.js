$(document).ready(function () {
	var currentIndex = 0;
	var images = $('#carrousel li');
	var imageCount = images.length;

	function showImage(index) {
		var newTransform = -index * 100 + '%';
		$('#carrousel ul').css('transform', 'translateX(' + newTransform + ')');
	}

	function cycleImages() {
		currentIndex = (currentIndex + 1) % imageCount;
		showImage(currentIndex);
	}

	$('.btn-prev').click(function () {
		currentIndex = (currentIndex - 1 + imageCount) % imageCount;
		showImage(currentIndex);
	});

	$('.btn-next').click(function () {
		cycleImages();
	});

	setInterval(cycleImages, 5000); //ttes les 5 sec on change image
});
