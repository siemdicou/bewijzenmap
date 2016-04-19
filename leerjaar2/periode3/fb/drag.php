<!DOCTYPE HTML>
<html>
<head>
<style>
#div1 {width:70px;height:70px;padding:10px;}
#drag1{ margin-left:33%;
        position: absolute; }
#drag2{ margin-left:5%;
        position: absolute; }
#drag3{ margin-left:66%;
        position: absolute; }
#dragframe{width: 100%; height: 500px;
border: 2px solid;
}
</style>
<script>

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
var	removes = 0;
var self = this;
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var test= ev.target.appendChild(document.getElementById(data));
    test.remove();
    self.removes++;
    console.log(removes);
    if (removes == 3) {
    	window.alert("yay de tuin is schoon")
    }

}
function dropAll(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
// console.log(removes);


</script>
</head>
<body>

<div  id="dragframe" ondrop="dropAll(event)" ondragover="allowDrop(event)">

    <img src="http://www.fancyicons.com/free-icons/125/miscellaneous/png/256/trash_empty_256.png" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
    <br>

    <img id="drag1" src="http://vignette1.wikia.nocookie.net/joke-battles/images/c/ce/Doritos-nacho-cheese.png/revision/latest?cb=20160304034035" draggable="true" ondragstart="drag(event)" width="40">
    <img id="drag2" src="http://www.joomlaworks.net/images/demos/galleries/abstract/7.jpg" draggable="true" ondragstart="drag(event)" width="336" height="69">
    <img id="drag3" src="http://www.joomlaworks.net/images/demos/galleries/abstract/7.jpg" draggable="true" ondragstart="drag(event)" width="336" height="69">

</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.5&appId=103896890009687";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
<div class="fb-like" data-href="https://apps.facebook.com/1689105558004265/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</html>
