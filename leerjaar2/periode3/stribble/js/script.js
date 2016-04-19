$(function(){

var over = false;
var fadeInterval;
var delay = 4000;
function fadeMovies() {
    if(over){return false;}
    var current_img = $('.strook .dia').eq(0);
    var next_img = current_img.next('.dia');
    current_img.fadeOut(2000).appendTo('.strook');
    next_img.fadeIn(2000);
    }    
$('.strook .dia').each(function(){
    $(this).hide();
});
$('.strook .dia').eq(0).show();

$().hover(function(){
    over = true;
    clearInterval(fadeInterval)
    },
    function(){
    over = false;
    fadeInterval = setInterval(fadeMovies, delay);
    })
    
    fadeInterval = setInterval(fadeMovies, delay);

});