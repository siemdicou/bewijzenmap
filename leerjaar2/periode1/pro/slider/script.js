window.addEventListener("load"function()){
	createImageGallery("#imagegallery","#left","#right","#text"["img/1.jpg","img/2.jpg","img/3.jpg","img/4.jpg","img/5.jpg","img/6.jpg""img/7.jpg"])
}
	function createImageGallery (imagegallery,left, right,images) {
		var image = document.querySelector(imagegallery);
		image.src = "img/1.jpg";
	}	