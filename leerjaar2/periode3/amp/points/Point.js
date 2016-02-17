function Point(x,y,r,color_rgba){
    var self = this;
    this.x = x;
    this.y = y;
    this.r = r;
    this.color = "rgba("+color_rgba+")";
    var rect = canvas.getBoundingClientRect();
    var drag = false;
    var mouseX,mouseY;  

    function dist(x1,x2,y1,y2) {
        var dx= x2-x1;
        var dy= y2-y1;
        return Math.sqrt(dx*dx + dy*dy);
    }
    
    addEventListener("click", function(e) {
        
        mouseX =  e.clientX-rect.left;
        mouseY = e.clientY-rect.top;
        console.log(dist(mouseX,mouseY,self.x,self.y));
        console.log (drag); 
        if (dist(mouseX,mouseY,self.x,self.y)){
            drag=true;
        }
        addEventListener("mouseup",function() {
            drag=false;
        })
        addEventListener("mousemove",function(e) {
            if (drag){

            }
        })
    })

    this.draw = function(context){
        context.beginPath();
        context.fillStyle = this.color;
        context.arc(this.x,this.y,this.r,0,2*Math.PI);
        context.stroke();
        context.fill();
        context.closePath();
    }
}