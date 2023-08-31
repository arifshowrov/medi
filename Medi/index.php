<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>MediSheba</title>

</head>

<body>
<!-- nav -->
    <div>
        <?php require 'partials/_nav.php'?>

        <hr>
<!-- slider -->

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/ulab.jpg" class="d-block w-100 silde-img" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img  src="img/ulab2.jpg" class="d-block w-100 silde-img" alt="...">
      <div class="carousel-caption d-none d-md-block">

      
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/ulab3.jpg" class="d-block w-100 silde-img" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <!-- welcome -->






        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100 vh">
            <div class="card" style="width: 150 rem ;" style="height:150 rem;">
                <div class="card-body">
                    <div class="container">
                        <center>
                            <h1>Welcome to MediSheba!</h1>
                        </center>
                        <h3>Medisheba is an online medical appointment system for both doctors and patient. </h3>
                        <br>
                        <br>
                        <center>
                            <h2 class="heading-text">Avoid Hassles & Delays.</h2>
                        </center>
                        <br>
                        <center>
                            <h4 class="sub-text2">How is health today, Sounds like not good!<br>Don't worry. Find your
                                doctor
                                online Book as you wish with Medisheba. <br>
                                We offer you a free doctor channeling service, Make your appointment now.</h4>
                        </center>
                        <center>
                            <a href="login.php">
                                <input type="button" value="Make Appointment / Log In"
                                    class="login-btn btn-primary btn">
                            </a>
                            <a href="signup.php"><input type="button" value="Register Now"
                                    class="login-btn btn-primary btn"></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- map -->



    <div class="container text-center">
  <div class="row">
    
    
    <div class="col">
    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=612&amp;height=400&amp;hl=en&amp;q=ulab&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://gachanox.io/">Gacha Nox APK</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
    </div>
  </div>
</div>

<!-- footer -->
<?php require 'partials/footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>