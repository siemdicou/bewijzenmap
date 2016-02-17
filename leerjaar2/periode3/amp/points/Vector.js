function Vector(dx,dy){
    this.dx = dx;
    this.dy=dy;
    
    this.r = Math.sqrt(this.dx*this.dx + this.dy*this.dy);
    
    this.normalize = function(){
        this.dx = this.dx / this.r;
        this.dy = this.dy/this.r;
        this.r = this.r/this.r;
    }
}