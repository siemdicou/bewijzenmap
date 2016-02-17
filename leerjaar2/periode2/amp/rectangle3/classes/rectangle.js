function Rectangle(){
	this.x = 0;
	this.y = 0;
	this.rectWidth = 0;
	this.rectHeight = 0; 
	this.colorFill = "#000000";
	this.colorLine = "#fff";
	this.rotation = 0;
}

Rectangle.prototype.draw = function(context){
	context.save();
	//boekhouding
	context.lineWidth = 2;
	context.globalAlpha=1; // opacity 
	context.fillStyle = this.colorFill;
	context.strokeStyle = this.colorLine;
	//rotatie
	context.translate(this.x, this.y); 
	context.rotate(this.rotation);
	//teken de rechthoek
	 context.beginPath();
	 //syntax: context.rect(x,y,width,height); => x upperleft corner, y upperleft corner
	 context.rect(-this.rectWidth/2 ,-this.rectHeight/2 ,  this.rectWidth,  this.rectHeight); 
	 context.closePath();
	 context.fill();
	 context.stroke();
	
	context.restore();
}