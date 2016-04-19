window.addEventListener("load",function(){ 
	var canvas = document.getElementById("canvas");
    var context = canvas.getContext("2d");
    

    
    // animate();
    var l = new line(0.5,0);
    l.rc=0.5;
    l.offset= 0;

    var li = new line(0.5,0);
    li.rc=1;
    li.offset= 0;

    var li2 = new line(0.5,0);
    li2.rc=0.01;
    li2.offset= 0;

    for (x = 0; x < 800; x+=20) {
        var P = new Point (x,l.y(x),1,"rgba,235,235,235,0.2");
        P.draw(context);
    }
    for (x = 0; x < 800; x+=20) {
        var P = new Point (x,li.y(x),1,"rgba,235,235,235,0.2");
        P.draw(context);
    }
    for (x = 0; x < 800; x+=20) {
        var P = new Point (x,li2.y(x),1,"rgba,235,235,235,0.2");
        P.draw(context);
    }
})
