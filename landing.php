<?php
     session_start();
     $_SESSION['error'] = '';
     $urlContents = @file_get_contents("https://api.covid19api.com/world/total");
     $weatherArray = json_decode($urlContents, true);


?>
<html lang="en">
    <head>
        <style media="screen">
          header.masthead{
            background-image: url("Images/codid-dashboard-head.jpg");
          }
          #contact{
            background-image: url("Images/map-image.png");
          }

        </style>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>COVID-Tracker App</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="CSS/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
              <h2 style="color:white;">COVID-19 Tracker</h2>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#stats">stats</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#function">Functions</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase" style="font-size:50px; color: white;">Track The Pandemic <br> In Real Time</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#stats">Tell Me More</a>
            </div>
        </header>

        <!-- Stats-->
        <section class="page-section" id="stats">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"> the Corona virus</h2>
                    <h3 class="section-subheading text-muted">World-wide Count</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                      <img style="height:140px;"src="Images/cases.JPG" alt="">
                      <br>
                      <br>
                      <h1 class="num"><?php echo number_format(@$weatherArray['TotalConfirmed']); ?></h1>
                      <h5>Total World Wide <br>Cases</h5>
                    </div>

                    <div class="col-md-4">
                      <img style="height:140px;"src="Images/cured.JPG" alt="">
                      <br>
                      <br>
                      <h1 class="num"><?php echo number_format(@$weatherArray['TotalRecovered']); ?></h1>
                      <h5>Total Recoveries</h5>
                    </div>
                    <div class="col-md-4">
                      <img style="height:140px;"src="Images/death.JPG" alt="">
                      <br>
                      <br>
                      <h1 class="num" ><?php echo number_format(@$weatherArray['TotalDeaths']); ?></h1>
                      <h5>Total Deaths</h5>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              $(".num").counterUp({delay:10,time:2000});
            </script>
        </section>
        <!-- about-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"> the Corona virus</h2>
                    <br>
                    <h4>What is the Corona Virus?</h4>

                    <p class="text-muted">Coronaviruses are a large family of viruses which may
                      cause illness in animals or humans.  In humans, several coronaviruses are known to cause
                      respiratory infections ranging from the common cold to more severe diseases such as
                      Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory Syndrome (SARS).
                      The most recently discovered coronavirus causes coronavirus disease COVID-19.</p>
                      <br>
                    <h4>What are the Symptoms?</h4>
                    <p class="text-muted">The most common symptoms of COVID-19 are fever, dry cough, and tiredness.
                      Other symptoms that are less common and may affect some patients include aches and pains, nasal congestion,
                      headache, conjunctivitis, sore throat, diarrhea, loss of taste or smell or a rash on skin or discoloration
                       of fingers or toes. These symptoms are usually mild and begin gradually.
                       Some people become infected but only have very mild symptoms.</p>
                       <br>
                    <h4>How does it Spread?</h4>
                    <p class="text-muted">People can catch COVID-19 from others who have the virus.
                       The disease spreads primarily from person to person through small droplets from the nose or mouth,
                        which are expelled when a person with COVID-19 coughs, sneezes, or speaks.
                        These droplets are relatively heavy, do not travel far and quickly sink to the ground.
                         People can catch COVID-19 if they breathe in these droplets from a person infected with the virus.
                          This is why it is important to stay at least 1 meter) away from others.</p>
                          <h3 class="section-subheading text-muted"> <strong>It's not about how but when? -mikel </strong> </h3
              </div>
            </div>
        </section>

        <!-- -->
        <section class="page-section" id="function">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"> functions of the covid tracker</h2>
                    <br>

                    <p class="text-muted">COVID-19 Tracker is a web based application that uses a Rest Api that provides the user
                      <br>with the necessary count and idea on the number of cases that have been detected <br>by various medical facilities all
                      over the world.The data present on the site is quite reliable  as it is provided<br> by the WHO themselves. This app is able to provide a
                      number of various counts like Total cases, Daily Cases, Live Cases etc.</p>
                      <br>
                      <a class="btn btn-success btn-xl text-uppercase js-scroll-trigger" href="global_home.php">Start Search</a>
              </div>
            </div>
        </section>


        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted"> <strong>It's not how but when? -mikel </strong> </h3>
                </div>
                <form >
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © &nbsp Arafat 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/who?lang=en"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/WHO/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/organization-guest/company/world-health-organization?challengeId=AQE0vkyTBZRK6wAAAXN641teux59etMgZxGGb-3XWNcFcDVPDmv0JUGSC2zEqPLqst4Khra4mrbhoMobctU81oUm_H5Z89rwrA&submissionId=583dfc9b-df55-2416-f22c-32739f254314"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="JS/scripts.js"></script>
    </body>
</html>
