window.addEventListener("load",function () {
	var canvas = document.getElementById("canvas");
	var context =  canvas.getContext(canvas)
	var l = Object.create(linVerg);
	l.offset = 0;
	l.helling = 1;

    for (x = 0; x < 800; x+=20) {
        var P = new Point (x,l.y(x),5,0.1);
        P.draw(context);
    }
})
