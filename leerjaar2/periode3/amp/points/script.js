window.addEventListener("load",function(){ 
	var canvas = document.getElementById("canvas");
    var context = canvas.getContext('2d');
    
    
    
    var P = new Point(100,200,20,"100,33,33,1");
    console.log (P.x);
    console.log (P.y);
    console.log (P.r);
    // var Q = new Point(380,330,20,"green");
    // var D = new Point(530,250,20,"green");
    // var R = new Point(100,100,20,"blue");
    
//     var v = new Vector(Q.x-P.x,Q.y-P.y);
//     var distance = new Vector(0,0);

//     console.log(v);
//     v.normalize();
//     console.log(v);

    
    P.draw(context);
//     Q.draw(context);
//     R.draw(context);
//     D.draw(context);
    


//     R.x=P.x;
//     R.y= P.y;

//     distance.dx= P.x  - R.x;
//     distance.dy= P.y  - R.y;

//     function animate(){
//     context.clearRect(0,0,800,450);
//      distance.dx= P.x  - R.x;
//     distance.dy= P.y  - R.y; 
//      R.x += v.dx;
//     R.y += v.dy;
//     P.draw(context);
//     Q.draw(context);
//     R.draw(context);
//     D.draw(context);
//     console.log(distance.r);
//     }
    
//     setInterval(animate,10);
    
    
    
})
