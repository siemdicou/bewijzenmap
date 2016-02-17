window.addEventListener("load", function () {
	var canvas = document.getElementById('canvas');
	var context =  canvas.getContext("2d");

	var v = new Vector();
	var p = new Point(200 ,200, 10, "#000");
	var y = new Point(100 ,200, 10, "#588FA1");
	var x = new Point(400 ,200, 10, "#45E330");

	v.normalize();



	p.draw(context);
	y.draw(context);
	x.draw(context);

	function animation() {
		
	}
})	