<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stribble</title>
    <meta name="description" content="Stribble is een website die mensen met alle leeftijden helpt met hun beperking door middel van een assistieve app.">
    <meta name="keywords" content="stribble, hulp, ouderen, autisme, alzheimer, digitaal hulp, onafhankelijker worden, makkelijker, *nog meer verzinnen!!*">
    

    <!-- Favicons ################################ -->
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet ############################## -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    
    <!-- Slider ################################ -->
    <link rel="stylesheet" href="css/unslider.css?v=1.2">
    <link rel="stylesheet" href="css/unslider-dots.css">
    
    <!-- Fonts ################################ -->
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- JS ############################ -->
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>



  </head>
  <body>
  
    <!-- Navigation ############################# -->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
            <div class="language">
                
                    <select id="select" >
                        <option id="english" value="index.php?lang=english"  data-imagesrc="img/en.png"></option>
                        <option id="dutch" value="index.php?lang=dutch" data-imagesrc="img/nl.png"></option>
                    </select>
                
            </div>  
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="img/logoblank.png">stribble</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-home" class="page-scroll">Home</a></li>
            <li><a href="#tf-about" class="page-scroll">Why</a></li>
            <li><a href="#tf-we" class="page-scroll">Who are we</a></li> 
            <li><a href="#tf-information" class="page-scroll">Info Disabilities</a></li>
            <!-- <li><a href="#tf-#" class="page-scroll">Registreren</a></li> -->
            <li><a href="#tf-contact" class="page-scroll"><div class="regist"><FONT COLOR="#fa9927">Register</FONT></div></a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->

    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <span class="color"><h1>Welcome to <strong>Stribble</span></strong></h1>
                <p class="lead">It only gets easier</p>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

    <!-- About Us Page
    ==========================================-->
    <div id="tf-about" class="text-center">
        <div class="container">
            <div class="row wiestribble" >
                <div class="col-md-6">
                    <img src="img/<?php echo$result_eng[0]['image']?>" class="img-responsive">
                    <a href="#"><img  src="img/apple.jpg" class="apple"></a>
                    <a href="#"><img  src="img/google.jpg" class="playstore"></a>
                    
                    
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php   echo $result_eng[0]['pageTitle']; ?></h2>
                           <div class="clearfix"></div>
                            <hr>
                        </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <p class="waaromstrible">
                            <?php   echo $result_eng[0]['pageCont']; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
                    

    </div>
    

     <!-- wie zijn wij
    ==========================================-->
    <div id="tf-we" class="text-center">
        <div class="overlay">
            <div class="container">
                <h1 class="wiezijnwij"><?php   echo $result_eng[5]['pageTitle']; ?></h1>
                <Br>
                <p class="wiezijnwij2">
                    <?php   echo $result_eng[5]['pageCont']; ?>
                </p>
                
            </div>
            
        </div>
        <a href="#tf-information" class="fa fa-angle-down page-scroll"></a>
    </div>

    <!-- desices information section
    ==========================================-->
    <div id="tf-information" class="text-center">
        <!-- <div class="container"> -->
            <!-- <div class="section-title center"> -->
                <div class="my-slider">
                    <ul>
                    <li class="img1" style="background: url(img/<?php echo$result_eng[1]['image']?>) no-repeat center center; height: 600px; background-size: cover;">
                            <h1><?php   echo $result_eng[1]['pageTitle']; ?></h1>
                            <p><?php   echo $result_eng[1]['pageCont']; ?></p>
                        </li>
                        <li class="img2" style="background: url(img/<?php echo$result_eng[2]['image']?>) no-repeat center center; height: 600px; background-size: cover;">
                            <h1><?php   echo $result_eng[2]['pageTitle']; ?></h1>
                            <p><?php   echo $result_eng[2]['pageCont']; ?></p>
                        </li>
<!--
                        <li class="img3" style="background: url(img/<?php echo$result_eng[3]['image']?>) no-repeat center center; height: 600px; background-size: cover;">
                            <h1><?php   echo $result_eng[3]['pageTitle']; ?></h1>
                            <p><?php   echo $result_eng[3]['pageCont']; ?></p>
                        </li>
-->
<!--
                         <li class="img4" style="background: url(img/<?php echo$result_eng[4]['image']?>) no-repeat center center; height: 600px; background-size: cover;">
                            <h1><?php   echo $result_eng[4]['pageTitle']; ?></h1>
                            <p><?php   echo $result_eng[4]['pageCont']; ?></p>
                        </li>
-->
                    </ul>
                </div>
            <!-- </div> -->
        <!-- </div> -->
        
    </div>

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Feel free to <strong><FONT COLOR="#fa9927">register!</FONT></strong></h2>
                        <div class="line">
                        </div>
                        <div class="clearfix"></div>
                        <small><em></em></small>            
                    </div>

                    <form>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Name..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sirname</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Sirname..">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Emailadres</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Emailadres again</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email again..">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password again</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password again..">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn tf-btn btn-default">Send</button>
                    </form>

                </div>
            </div>

        </div>
    </div>



 
    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav"> 
            <p>&copy Bemika Software &#124; All Rights Reserved</p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li>
<form href="#contact" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="paypal">
        <button class="paypal"><i class="fa fa-paypal fa-fw"></i><p style="color: white; float: right; margin-left: 9px; line-height: 0.9em; font-size: 0.8em;">Donate!</p></button>
        <input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="DENLACM55ECZS">
<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1"></form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>

    <!--<script type="text/javascript" src="js/jquery.1.11.1.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <!-- Javascripts
    ================================================== -->

    <script>
        jQuery(document).ready(function($) {
            var $slider = $('.my-slider').unslider({
            infinite: true
            });
                $slider.on('mouseover', function() {
        $slider.data('unslider').stop();
    }).on('mouseout', function() {
        $slider.data('unslider').start();
    });
        });
    </script>

 
    <script type="text/javascript" src="js/unslider.js"></script>  
    <script type="text/javascript" src="js/main.js"></script>
   
<script type="text/javascript" src="js/ddslick.js"></script>

<script>
        $('#select').ddslick({
    onSelected: function(selectedData){
    }   
});
</script>
<script>
$(document).ready( function() {
        $('#select .dd-option').click ( function(e) {
        e.preventDefault();
        location.href = ($(this).children('.dd-option-value').val());
        });
});
</script>
    
  </body>
</html>