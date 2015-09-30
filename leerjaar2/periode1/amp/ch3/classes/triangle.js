function Triangle () {
  this.x = 0;
  this.y = 0;
  this.xLeft = 0;
  this.yLeft = 0;
  this.colorFill = "#000000";
  this.colorLine = "#ffff00";
}

Triangle.prototype.draw = function (context) {
  context.save();
  context.lineWidth = 2;
  context.fillStyle = this.colorFill;
  context.strokeStyle = this.colorLine
  context.beginPath();
  context.moveTo(this.xLeft, this.yLeft);  // A start triangle
  context.lineTo(this.x, this.yLeft); // B
  context.lineTo(this.x , this.y); // C follow mouse
  context.closePath();
  context.fill();
  context.stroke();
  context.restore();
};