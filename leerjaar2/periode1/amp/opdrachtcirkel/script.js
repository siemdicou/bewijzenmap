window.addEventListener('load',function () {
	// console.log("hoi");
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	
for (i = 0; i < 101; i++, y++, r++;) { 
	var a = new Circle(context,i,y,r);
})
}
	function Circle(context,x,y,r){
	context.beginPath();
	context.arc(x,y,r,0,2*Math.PI);
	context.stroke();
	context.closePath();
	 }