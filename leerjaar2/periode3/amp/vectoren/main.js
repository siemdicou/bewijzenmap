    window.onload = function () {
      var canvas = document.getElementById('canvas'),
          context = canvas.getContext('2d');

          ball = new Ball();
          ball2 = new Ball();
          ball.x= 40;
          ball.y = 40;
          ball2.x= 760;
          ball2.y = 40;
          speed = 6;
          radius = 20;
          aceleretion= -0.05;

        

      (function drawFrame (){
        window.requestAnimationFrame(drawFrame, canvas);
        context.clearRect(0, 0, canvas.width, canvas.height);
          speed = speed + aceleretion;
          ball.draw(context);

          ball.x= ball.x +speed;
            if (ball.x  < 40) {
              ball.x= ball.x -speed;

              
            };
            ball.y= ball.y +speed;
            if (ball.y  < 40) {
              ball.y= ball.y -speed;
            };


            ball2.draw(context);
            ball2.x= ball2.x -speed;
            if (ball2.x  > 760) {
              ball2.x= ball2.x +speed;              
            };
            ball2.y= ball2.y +speed;
            if (ball2.y  < 40) {
              ball2.y= ball2.y -speed;
              
              
            };


          
      
      }());
    };