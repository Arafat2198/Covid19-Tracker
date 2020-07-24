<?php
    $urlContents1 = @file_get_contents("https://pkgstore.datahub.io/JohnSnowLabs/country-and-continent-codes-list/country-and-continent-codes-list-csv_json/data/c218eebbf2f8545f3db9051ac893d69c/country-and-continent-codes-list-csv_json.json");
    $array1 = json_decode($urlContents1, true);

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


  <!-- PIE Chart Starts here -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
   google.charts.setOnLoadCallback(drawChart);
   <?php
   // php script for the PIE Chart starts here

         $asia=0;
         $europe=0;
         $africa=0;
         $oceania=0;
         $north_america=0;
         $south_africa=0;

         for ($i=0; $i < 300; $i++) {
             for ($j=0; $j < 200; $j++) {
                 if(@$array1[$i]['Two_Letter_Country_Code']==@$array2['Countries'][$j]['CountryCode']){
                   @$array2['Countries'][$j]['Slug']= @$array1[$i]['Continent_Name'];
                 }
                 else if ($j==199) {
                   break;
                 }
             }
         }

       for ($i=0; $i < 200; $i++) {
           if ($array2['Countries'][$i]['Slug']=="Asia") {
             $asia=$asia+$array2['Countries'][$i]['TotalConfirmed'];
           }
           else if ($array2['Countries'][$i]['Slug']=="Europe") {
             $europe=$europe+$array2['Countries'][$i]['TotalConfirmed'];
           }
           elseif ($array2['Countries'][$i]['Slug']=="Africa") {
             $africa=$africa+$array2['Countries'][$i]['TotalConfirmed'];
           }
           elseif ($array2['Countries'][$i]['Slug']=="North America") {
             $north_america=$north_america+$array2['Countries'][$i]['TotalConfirmed'];
           }
           elseif ($array2['Countries'][$i]['Slug']=="South America") {
             $south_africa=$south_africa+$array2['Countries'][$i]['TotalConfirmed'];
           }
           elseif ($array2['Countries'][$i]['Slug']=="Oceania") {
             $oceania=$oceania+$array2['Countries'][$i]['TotalConfirmed'];
           }
        }

  // php script for the PIE Chart ends here
    ?>
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Country', 'Count'],
       ['Asia',     <?php echo $asia; ?>],
       ['Europe',      <?php echo $europe; ?>],
       ['North america',  <?php echo $north_america; ?>],
       ['Oceania', <?php echo $oceania; ?>],
       ['South america',    <?php echo $south_africa; ?>]
     ]);

     var options = {
       title: 'Continent Wise Contribution',
       is3D: true,
     };

     var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
     chart.draw(data, options);
   }
  </script>
  <!-- PIE Chart Ends here -->



  <!-- BAR Graph Starts here -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        <?php
        // php script for the BAR Graph starts here

                for ($i=0; $i < 186; $i++) {
                  $arr[$i] = $i;
                }

                for ($i=0; $i < 186; $i++) {
                  $arr1[$i] = $array2['Countries'][$i]['TotalConfirmed'];
                }


                for($i = 0; $i < 186; $i++)
                {
                        for ($j = 0; $j < 186 - $i - 1; $j++)
                        {
                            if ($arr1[$j] > $arr1[$j+1])
                            {
                                $t = $arr[$j];
                                $arr[$j] = $arr[$j+1];
                                $arr[$j+1] = $t;

                                $t = $arr1[$j];
                                $arr1[$j] = $arr1[$j+1];
                                $arr1[$j+1] = $t;
                            }
                        }
                }
                    $p = $arr1[185];

                    // Required Info for max country 1
                      $cnt1 = @$array2['Countries'][$arr[185]]['Country'];
                      $max1 = @$array2['Countries'][$arr[185]]['TotalConfirmed'];
                      $max2 = @$array2['Countries'][$arr[185]]['TotalRecovered'];
                      $max3 = @$array2['Countries'][$arr[185]]['TotalDeaths'];

                    // Required Info for max country 2
                      $cnt2 = @$array2['Countries'][$arr[184]]['Country'];
                      $max4 = @$array2['Countries'][$arr[184]]['TotalConfirmed'];
                      $max5 = @$array2['Countries'][$arr[184]]['TotalRecovered'];
                      $max6 = @$array2['Countries'][$arr[184]]['TotalDeaths'];

                    // Required Info for max country 3
                      $cnt3 = @$array2['Countries'][$arr[183]]['Country'];
                      $max7 = @$array2['Countries'][$arr[183]]['TotalConfirmed'];
                      $max8 = @$array2['Countries'][$arr[183]]['TotalRecovered'];
                      $max9 = @$array2['Countries'][$arr[183]]['TotalDeaths'];

                    // Required Info for max country 4
                      $cnt4 = @$array2['Countries'][$arr[182]]['Country'];
                      $max10 = @$array2['Countries'][$arr[182]]['TotalConfirmed'];
                      $max11 = @$array2['Countries'][$arr[182]]['TotalRecovered'];
                      $max12 = @$array2['Countries'][$arr[182]]['TotalDeaths'];

          // php script for the BAR Graph ends here

         ?>
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Countries', 'Total Cases', 'Total Recovered', 'Total Dead'],
            ['<?php echo $cnt1; ?>', <?php echo $max1; ?>, <?php echo $max2; ?>, <?php echo $max3; ?>],
            ['<?php echo $cnt2; ?>', <?php echo $max4; ?>, <?php echo $max5; ?>, <?php echo $max6; ?>],
            ['<?php echo $cnt3; ?>', <?php echo $max7; ?>, <?php echo $max8; ?>, <?php echo $max9; ?>],
            ['<?php echo $cnt4; ?>', <?php echo $max10; ?>, <?php echo $max11; ?>, <?php echo $max12; ?>]
          ]);

          var options = {
            chart: {
              title: ' ',
            },
            bars: 'horizontal' // Required for Material Bar Charts.
          };

          var chart = new google.charts.Bar(document.getElementById('barchart_material'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>
      <!-- BAR Graph Ends here -->



</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
      <a href="index.php" style="text-decoration: none;"><div class="sidebar-heading bg-info" style="height:98px;color:white;"><h3>&nbsp&nbspCOVID-19 &nbsp&nbspTracker <i class="fas fa-biohazard"></i></h3> </div></a>
      <div class="list-group list-group-flush">
        <a href="global_home.php" class="list-group-item list-group-item-action bg-light"> <h4>Global Stats &nbsp<i class="fas fa-globe"></i></h4> </a>
        <a href="countries_home.php" class="list-group-item list-group-item-action bg-light"><h4>Country <br>Search&nbsp&nbsp&nbsp<i class="fas fa-flag-usa"></i></h4> </a>
        <a href="global_map.php" class="list-group-item list-group-item-action bg-light"> <h4>World Heat Map &nbsp<i class="fas fa-map-marked-alt"></i></h4> </a>
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
              <div class="card-header"> <h5>Total Cases &nbsp&nbsp<i class="fas fa-viruses"></i></h5> </div>
              <div class="card-body text-warning">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalConfirmed']); ?></h2>
              </div>
            </div>
            <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header "> <h5>Total Recoveries &nbsp&nbsp<i class="fas fa-walking"></i></h5> </div>
              <div class="card-body text-success">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalRecovered']); ?></h2>
              </div>
            </div>
            <div class="card border-danger mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>Total Death's &nbsp&nbsp<i class="fas fa-skull-crossbones"></i></h5> </div>
              <div class="card-body text-danger">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['TotalDeaths']); ?></h2>
              </div>
            </div>
          </div>
      </div>
      <div class="container-fluid">
        <br>
          <div class="card-deck">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>New Cases &nbsp&nbsp<i class="fas fa-viruses"></i></h5> </div>
              <div class="card-body text-warning">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['NewConfirmed']); ?></h2>
              </div>
            </div>
            <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header "> <h5>New Recoveries &nbsp&nbsp<i class="fas fa-walking"></i></h5> </div>
              <div class="card-body text-success">
                <h2 class="card-title num "><?php echo number_format(@$array2['Global']['NewRecovered']); ?></h2>
              </div>
            </div>
            <div class="card border-danger mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>New Death's &nbsp&nbsp<i class="fas fa-skull-crossbones"></i></h5> </div>
              <div class="card-body text-danger">
                <h2 class="card-title num"><?php echo number_format(@$array2['Global']['NewDeaths']); ?></h2>
              </div>
            </div>
          </div>
      </div>
      <!-- Card for the Bar Chart -->
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card" style="width: 60rem;">
          <div id="barchart_material" style="width: 900px; height: 500px;"></div>
           <div class="card-body">
              <h3 class="card-title">Top 4 Worst Hit Countries </h3>
           </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <!-- Card for the Pie Chart -->
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card" style="width: 57rem;">
          <div id="piechart_3d" style="width: 900px; height: 400px;"></div>
            <div class="card-body">
              <h3 class="card-title">Contribution Of Each Region to the Total Cases</h3>
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
