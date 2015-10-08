window.addEventListener("load", function(){

    var imageGallery = new ImageGallery('#imageGallery'),
        imageURLs = ["images/01.jpg", "images/02.jpg", "images/03.jpg", "images/04.jpg"];

    imageGallery.setData(imageURLs);

    // wat mogen jullie mogelijk maken:
    imageGallery.loadData("http://sdlfkjsdflksdfj.nl/gallery.php");




});