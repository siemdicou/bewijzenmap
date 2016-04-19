window.addEventListener("load",function(){ 
	var canvas = document.getElementById("canvas");
    var context = canvas.getContext("2d");
    
    var rooster = new Rooster(400,400,20,20,100,100);
    
    var A = new Punt(100,100,10,"orange");
    var B = new Punt(300,300,10,"orange");
    var C = new Punt(300,200,10,"orange");
    var D = new Punt(100,300,10,"orange");
    var S = new Punt(200,300,5,"green");
    var l = new Lijn();
    var m = new Lijn();
    var ray = new Lijn();
    
    
    var r = new Vector(200,200);
    var v = new Vector(3,2);
        
    var bal1 = new Bal(r.x,r.y,10,"red");
    
    v.teken(100,100,1,"yellow",context);
    
    !function animate(){
        context.clearRect(0,0,800,800);
        window.requestAnimationFrame(animate);
        rooster.draw(context);
        A.update();
        B.update();
        C.update();
        D.update();
        LijnOperaties.LijnDoorTweePunten(l,A,B);
        LijnOperaties.LijnDoorTweePunten(m,C,D);
        A.draw(context);
        B.draw(context);
        C.draw(context);
        D.draw(context);
        LijnOperaties.tekenLijnStuk(0,l.y(0),800,l.y(800),context,"blue");
        LijnOperaties.tekenLijnStuk(0,m.y(0),800,m.y(800),context,"blue");
        S.x = LijnOperaties.snijpunt(l,m).x;
        S.y = LijnOperaties.snijpunt(l,m).y;
        S.draw(context);
        r.dx += v.dx;
        r.dy += v.dy;
        r = VectorOperaties.som(r,v);
        if(r.dx<0 || r.dx > 800)v.dx = - v.dx;
        if(r.dy<0 || r.dy > 800)v.dy = - v.dy;
        bal1.x = r.dx;
        bal1.y = r.dy;
        
        
        LijnOperaties.LijnDoorVectorEnPunt(ray,v,r.dx,r.dy);
        LijnOperaties.tekenLijnStuk(0,ray.y(0),800,ray.y(800),context,"green");
        bal1.teken(context);
        v.teken(r.dx,r.dy,10,"yellow",context);
    }();                                 
});


