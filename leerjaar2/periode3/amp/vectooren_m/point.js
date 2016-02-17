function Point (x, y , r, color) {
  this.x = x;
  this.y = y;
  this.r = r;
  this.color = color;

  this.draw = function (context) {
    context.beginPath();
    context.fillStyle = this.color;
    context.arc(this.x, this.y, this.r, 0, (Math.PI * 2));
    context.stroke();
    context.fill();
    context.closePath();
  }
}

// Ball.prototype.draw = function (context) {
//   context.save();
//   context.translate(this.x, this.y);
//   context.rotate(this.rotation);
//   context.scale(this.scaleX, this.scaleY);
  
//   context.lineWidth = this.lineWidth;
//   context.fillStyle = this.color;
//   context.beginPath();
//   //x, y, radius, start_angle, end_angle, anti-clockwise
//   context.arc(0, 0, this.radius, 0, (Math.PI * 2), true);
//   context.closePath();
//   context.fill();
//   if (this.lineWidth > 0) {
//     context.stroke();
//   }
//   context.restore();
// };
