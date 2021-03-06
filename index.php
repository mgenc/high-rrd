<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>High RRD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pablo RUTH">

    <!-- Le styles -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">High RRD</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Dashboard</a></li>
              <li><a href="#about">Config</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">

      <div class="row-fluid">
        <div id="selector">
          <select id="hosts">
            <option value="none">Select host</option>
          </select>
          <select id="plugins">
            <option value="all">All plugins</option>
          </select>
          <button id="btn_display" class="btn btn-success" type="button">Display</button>
        </div>
      </div>

      <div id="charts" class="row-fluid">
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap/bootstrap.js"></script>
    <script src="js/highcharts/highcharts.js" type="text/javascript"></script>
    <script src="js/jquery-rrd/jquery.rrd.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </body>
</html>
