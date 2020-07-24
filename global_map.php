<?php
    $urlContents2 = @file_get_contents("https://api.covid19api.com/summary");
    $array2 = json_decode($urlContents2, true);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>

  <title>Covid-19 Global Tracker</title>

  <!-- Bootstrap core CSS -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
  <link href="CSS/simple-sidebar.css" rel="stylesheet">

  <!-- World Map Starts here -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages':['geochart'],
      'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    });
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country Code','Country Name','Case Count'],
        <?php for ($i=0; $i < 186; $i++) {
            if ($i!=45) {
          ?>
        ['<?php echo $array2['Countries'][$i]['CountryCode']; ?>','<?php echo $array2['Countries'][$i]['Country'];?>',<?php echo $array2['Countries'][$i]['TotalConfirmed']; ?>],
        <?php }} ?>
      ]);

      var options = {
         colorAxis: {colors: ['#f5f5f5', '#e31b23', '#e31b23']},
         backgroundColor: '#81d4fa',
       };

      var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

      chart.draw(data, options);
    }
  </script>
</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
      <a href="index.php" style="text-decoration: none;"><div class="sidebar-heading bg-info" style="height:98px;color:white;"><h3>&nbsp&nbspCOVID-19 &nbsp&nbspTracker <i class="fas fa-biohazard"></i></h3> </div></a>
      <div class="list-group list-group-flush">
        <a href="global_home.php" class="list-group-item list-group-item-action bg-light"> <h4>Global Stats &nbsp<i class="fas fa-globe"></i></h4> </a>
        <a href="countries_home.php" class="list-group-item list-group-item-action bg-light"><h4>Country <br>Search&nbsp&nbsp&nbsp<i class="fas fa-flag-usa"></i></h4> </a>
        <a href="global_map.php" class="list-group-item list-group-item-action bg-light"> <h4>World Heat Map &nbsp<i class="fas fa-map-marked-alt"></i>
</h4> </a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active ">
              <h2 style="font-family:Arial;color:white;" >Global Status  </h2>
              <h6 class="text" style="color:white;"> &nbsp&nbspLast Updated : <?php
                    for ($i=0; $i < 19; $i++) {
                      if ($i==10) {
                        echo "&nbsp&nbspTime: ";
                      }
                      else {
                        echo $array2['Date'][$i];
                      }
                    }
              ?></h6>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <br>
          <div class="card-deck">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
              <div class="card-header text-center"> <h5>Total Cases &nbsp&nbsp<i class="fas fa-viruses"></i></h5> </div>
              <div class="card-body text-warning align-items-center d-flex justify-content-center">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalConfirmed']); ?></h2>
              </div>
            </div>
            <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header text-center"> <h5>Total Recoveries &nbsp&nbsp<i class="fas fa-walking"></i></h5> </div>
              <div class="card-body text-success align-items-center d-flex justify-content-center">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalRecovered']); ?></h2>
              </div>
            </div>
            <div class="card border-danger mb-3" style="max-width: 18rem;">
              <div class="card-header text-center"> <h5>Total Death's &nbsp&nbsp<i class="fas fa-skull-crossbones"></i></h5> </div>
              <div class="card-body text-danger align-items-center d-flex justify-content-center">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalDeaths']); ?></h2>
              </div>
            </div>
          </div>
      </div>
      <br>
      <br>
      <!-- Card for the World Map  -->
      <div style="padding-left:10px;" class="container">
        <div class="card" style="width: 60rem;">
          <div id="regions_div" style="width: 900px; height: 500px;padding-left:50px;padding-top:50px;"></div>
           <div class="card-body align-items-center d-flex justify-content-center">
              <h3 class="card-title">World Heat Map Of The Virus</h3>
           </div>
        </div>
      </div>
      <br>
      <br>
      <br>
    </div>
    <script type="text/javascript">
      $(".num").counterUp({delay:10,time:1000});
    </script>
    </div>


    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->


</body>

</html>
