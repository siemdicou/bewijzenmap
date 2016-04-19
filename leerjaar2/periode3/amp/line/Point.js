function Point(x,y,r,color_RGBA){
    var rect = canvas.getBoundingClientRect();
    var drag = false;
    var self = this;
    var mouseX,mouseY;
    this.x = x;
    this.y = y;
    this.r = r;
    this.color = "rgba(" + color_RGBA + ")";
    
    addEventListener("mousedown",function(e){
        mouseX = e.clientX-rect.left
        mouseY = e.clientY-rect.top;
        if(dist(mouseX,mouseY,self.x,self.y) < self.r){
            drag = true;
        }
    });
    
    
    addEventListener("mouseup",function(){
        drag = false;
    })
    

    addEventListener("mousemove",function(e){ 
        mouseX = e.clientX-rect.left
        mouseY = e.clientY-rect.top;
        if(dist(mouseX,mouseY,self.x,self.y) < self.r){
           canvas.style.cursor = "pointer"
        } else{
            canvas.style.cursor = "auto"
        };
    });
    
    this.update =function(){
        if(drag){
            this.x = mouseX;
            this.y = mouseY;
        }
    };
    
    this.draw = function(context){
        context.beginPath();
        context.fillStyle = this.color;
        context.arc(this.x,this.y,this.r,0,2*Math.PI);
        context.stroke();
        context.fill();
        context.closePath();
    };
    
    function dist(x1,y1,x2,y2){
        var dx = x2-x1;
        var dy = y2 - y1;
        return Math.sqrt(dx*dx + dy*dy);
    }
}