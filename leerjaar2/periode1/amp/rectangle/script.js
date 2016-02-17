window.addEventListener("load", function () {
	var canvas = document.getElementById('rectangle');
    var context = canvas.getContext('2d');
console.log("hi");


function Rectangle(){

  this.x = 0;
  this.y = 0;
  this.rectWidth = 300;
  this.rectHeigth = 300;
  this.colorFill = "#000000";
  this.colorLine = "#ffff00";
  this.lineWidth =2;
  this.rotation = 0;
  console.log("het werkt");

};

  Rectangle.prototype.draw = function (context) {
    context.save();
    context.lineWidth = 2;
    context.globalAlpha=1;
    context.fillStyle = this.colorFill;
    context.strokeStyle = this.colorLine;
    context.translate(this.x, this.y);
    context.rotate(this.rotation)
    context.beginPath();
  	  context.rect(this.x-this.rectWidth/2,
  	  				this.y- this.rectHeigth/2,
  	  				this.rectWidth,
  	  				this.rectHeigth);
    context.closePath();
    context.fill();
    context.stroke();
    context.restore();
  };
});