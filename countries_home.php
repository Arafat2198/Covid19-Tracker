<?php
session_start();
    if( $_SESSION['error'] != '')
      {   echo '<div class="alert alert-danger" style="font-size:25px;" role="alert">'.'<strong>Invalid Country Name</strog>'.'</div>'; }
      $_SESSION['error'] = '';
    if(isset($_GET['country']))
      {
        $country = @$_GET['country'];
        $urlContents = @file_get_contents("https://api.covid19api.com/summary");
        $array = json_decode($urlContents, true);
        for ($i=0; $i < 187; $i++)
        {
            if(@$country == @$array['Countries'][$i]['Country'] || strtolower(@$array['Countries'][$i]['Country']) == @strtolower($country))
            {
              $_SESSION['error'] = '';
              $slug = @$array['Countries'][$i]['Slug'];
              break;
            }
            else if($i==186) {
              $_SESSION['error'] = 'error';
              header("location:countries_home.php");
              break;
            }
        }


      $url2 = @file_get_contents("https://api.covid19api.com/dayone/country/".urlencode($slug));
      $arr2 = json_decode($url2, true);

      for ($i=0; $i < 200; $i++)
      {
          if($country== @$array['Countries'][$i]['Country'] || $country== @strtolower($array['Countries'][$i]['Country']))
          {
            $value = $i;
            break;
          }
          else if($i==200) {
            echo " <script>alert('Error No Such Country Found !!');</script>";
          }
      }
    }

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

  <title>Covid-19 Country Tracker</title>

  <!-- Bootstrap core CSS -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
  <link href="CSS/simple-sidebar.css" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales'],
        <?php for ($i=0; $i < count($arr2); $i++) {
         ?>
        ['<?php echo "Day".$i;?>',  <?php echo $arr2[$i]['Confirmed']; ?> ],
        <?php } ?>
      ]);

      var options = {
        title: 'The Growth of total number of Cases since Day 0',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Draw the Line chart for Total Cases
    google.charts.setOnLoadCallback(drawChart1);

    // Draw the Line chart for Total Cases
    google.charts.setOnLoadCallback(drawChart2);

    // Draw the Line chart for Total Cases
    google.charts.setOnLoadCallback(drawChart3);

    // Draw the Line chart for New Cases Everyday
    google.charts.setOnLoadCallback(drawChart4);

    // Callback that draws the Line chart for Total Cases
    function drawChart1() {
      // Create the data table for Total cases
      var data = google.visualization.arrayToDataTable([
        ['Count', 'Duration'],
        <?php for ($i=0; $i < count($arr2); $i++) {
         ?>
        ['<?php echo "Day".$i;?>',  <?php echo $arr2[$i]['Confirmed']; ?> ],
        <?php } ?>
      ]);

      var options = {
        title: 'The Growth of total number of Cases since Day 0',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart1'));

      chart.draw(data, options);
    }

    // Callback that draws the Line chart for Recovered Cases
    function drawChart2() {
      // Create the data table for Total cases
      var data = google.visualization.arrayToDataTable([
        ['Count', 'Duration'],
        <?php for ($i=0; $i < count($arr2); $i++) {
          if (!$arr2[$i]['Recovered']==0) {
         ?>
        ['<?php echo "Day".$i;?>',  <?php echo $arr2[$i]['Recovered']; ?> ],
        <?php }} ?>
      ]);

      var options = {
        title: 'The Growth of Recovered Cases since Day 0',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart2'));

      chart.draw(data, options);
    }

    // Callback that draws the Line chart for Dead Cases
    function drawChart3() {
      // Create the data table for Total cases
      var data = google.visualization.arrayToDataTable([
        ['Count', 'Duration'],
        <?php for ($i=0; $i < count($arr2); $i++) {
          if (!$arr2[$i]['Deaths']==0) {
         ?>
        ['<?php echo "Day".$i;?>',  <?php echo $arr2[$i]['Deaths']; ?> ],
        <?php }} ?>
      ]);

      var options = {
        title: 'The Growth of Casualties since Day 0',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart3'));

      chart.draw(data, options);
    }

    // Callback that draws the Line chart for New Cases Everyday
    function drawChart4() {
          // Create the data table for New Cases Everyday
          var data = google.visualization.arrayToDataTable([
            ['Count', 'Duration'],
            <?php for ($i=1; $i < count($arr2); $i++) {
             ?>
            ['<?php echo "Day".$i;?>',  <?php echo $arr2[$i]['Confirmed']-$arr2[$i-1]['Confirmed']; ?> ],
            <?php } ?>
          ]);

      var options = {
        title: 'The Growth of New Cases Everyday since Day 0',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart4'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
       google.charts.load('current', {'packages':['bar']});
       google.charts.setOnLoadCallback(drawStuff);

       function drawStuff() {
         var data = new google.visualization.arrayToDataTable([
           ['Case Type', 'Count',{ role: 'style' }],
           ["Total Cases Confirmed", <?php echo $array['Countries'][$value]['TotalConfirmed'];?>,'color: gray'],
           ["Total Recovered", <?php echo $array['Countries'][$value]['TotalRecovered'];?>,'color: gray'],
           ["Total Dead", <?php echo $array['Countries'][$value]['TotalDeaths'];?>,'color: gray']
         ]);

         var options = {
           width: 600,
           legend: { position: 'none' },
           chart: {
             title: ' ', },
           axes: {
             x: {
               0: { side: 'top', label: 'Count Of Various Cases All over the country '} // Top x-axis.
             }
           },
           bar: { groupWidth: "90%" }
         };

         var chart = new google.charts.Bar(document.getElementById('top_x_div'));
         // Convert the Classic options to Material options.
         chart.draw(data, google.charts.Bar.convertOptions(options));
       };
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
              <form class="form-inline"  method="get">
                <h3 style="color:white;" >Search for Country: &nbsp&nbsp&nbsp&nbsp</h3>
                <input class="form-control form-control-lg " type="text" name="country" placeholder="Country Name">
                <p>&nbsp&nbsp&nbsp&nbsp</p>
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </li>
          </ul>
        </div>
      </nav>


<?php
        if(isset($_GET['country']))
            {
 ?>
      <div class="container-fluid">
        <br>
        <h1>Country Name: <?php echo  @$array['Countries'][$value]['Country']; ?></h1>
        <p class="text-muted" >&nbsp&nbsp&nbspLast Updated: <?php
              for ($i=0; $i < 19; $i++) {
                if ($i==10) {
                  echo "&nbsp&nbsp&nbsp&nbspTime: ";
                }
                else {
                  echo @$array['Date'][$i];
                }
              }
        ?>
        <h2 >&nbsp&nbsp Recovery Rate:  <?php echo number_format((($array['Countries'][$value]['TotalRecovered']/$array['Countries'][$value]['TotalConfirmed'])*100),1)?>% &nbsp&nbsp&nbsp
        &nbsp&nbsp Fatality Rate:  <?php echo number_format((($array['Countries'][$value]['TotalDeaths']/$array['Countries'][$value]['TotalConfirmed'])*100),1)?>%</h2>
      </p>
        <br>
          <div class="card-deck">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>Total Cases &nbsp&nbsp<i class="fas fa-viruses"></i></h5> </div>
              <div class="card-body text-warning">
                <h2 class="card-title num"><?php echo number_format(@$array['Countries'][$value]['TotalConfirmed']); ?></h2>
              </div>
            </div>
            <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header "> <h5>Total Recoveries &nbsp&nbsp<i class="fas fa-walking"></i></h5> </div>
              <div class="card-body text-success">
                <h2 class="card-title num"><?php echo number_format(@$array['Countries'][$value]['TotalRecovered']); ?></h2>
              </div>
            </div>
            <div class="card border-danger mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>Total Death's &nbsp&nbsp<i class="fas fa-skull-crossbones"></i></h5> </div>
              <div class="card-body text-danger">
                <h2 class="card-title num"><?php echo number_format(@$array['Countries'][$value]['TotalDeaths']); ?></h2>
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
                <h2 class="card-title num"><?php echo number_format(@$array['Countries'][$value]['NewConfirmed']); ?></h2>
              </div>
            </div>
            <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header "> <h5>New Recoveries &nbsp&nbsp<i class="fas fa-walking"></i></h5> </div>
              <div class="card-body text-success">
                <h2 class="card-title num "><?php echo number_format(@$array['Countries'][$value]['NewRecovered']); ?></h2>
              </div>
            </div>
            <div class="card border-danger mb-3" style="max-width: 18rem;">
              <div class="card-header"> <h5>New Death's &nbsp&nbsp<i class="fas fa-skull-crossbones"></i></h5> </div>
              <div class="card-body text-danger">
                <h2 class="card-title num"><?php echo number_format(@$array['Countries'][$value]['NewDeaths']); ?></h2>
              </div>
            </div>
          </div>
      </div>
      <br>
      <br>

      <div style="padding-left:100px;" class="container-fluid">
        <div class="card " style="width: 40rem;">
          <div id="top_x_div" style="width: 800px; height: 600px;"></div>
            <div class="card-body ">
              <h3 class="card-title">Various Count all over the Country Since March</h3>
            </div>
        </div>
      </div>
      <br>
      <br>
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card " style="width: 57rem;">
          <div id="chart1" style="width: 900px; height: 500px"></div>
            <div class="card-body ">
              <h3 class="card-title">Various Count all over the Country Since March <br> <strong>Day 0</strong> Represents 5th of March 2020</h3>
            </div>
        </div>
      </div>
      <br>
      <br>
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card " style="width: 60rem;">
          <div id="chart4" style="width: 950px; height: 550px"></div>
            <div class="card-body ">
              <h3 class="card-title">Various Count of <strong>New Cases Everyday </strong>all over the Country Since March, <br> <strong>Day 0</strong> Represents 5th of March 2020</h3>
            </div>
        </div>
      </div>
      <br>
      <br>
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card " style="width: 57rem;">
          <div id="chart2" style="width: 900px; height: 500px"></div>
            <div class="card-body ">
              <h3 class="card-title">Various Count of <strong>Recovered Cases </strong>all over the Country Since March, <br> <strong>Day 0</strong> Represents 5th of March 2020</h3>
            </div>
        </div>
      </div>
      <br>
      <br>
      <div style="padding-left:100px;" class="container-fluid">
        <div class="card " style="width: 57rem;">
          <div id="chart3" style="width: 900px; height: 500px"></div>
            <div class="card-body ">
              <h3 class="card-title">Various Count of <strong>Casualties </strong>all over the Country Since March, <br> <strong>Day 0</strong> is Represents 5th of March 2020</h3>
            </div>
        </div>
      </div>
      <br>
      <br>
      <?php
            }
            else
            {
       ?>
        <br>
        <br>
        <div style="padding-left:100px;" class="container-fluid">
          <div class="card" style="width: 30rem;">
            <div class="card-body" >
              <h4  class="card-title">The Country Search Feature will give Power to the User to Investigate
                the extent of the Infection in any desired Country. All they have to do is to Input the
                <strong>Country Name</strong> <i class="far fa-flag"></i></h4>
            </div>
          </div>
        </div>
       <?php
            }
        ?>
      </div>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $(".num").counterUp({delay:10,time:1000});
  </script>


</body>

</html>
