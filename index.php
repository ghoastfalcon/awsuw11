<?php
  // mobile detection. This class allows for much more robust mobile testing if time it taken to impliment
  require('Mobile_Detect.php');
  $detect = new Mobile_Detect;
  if ($detect->isMobile()) {
    $hasGPS = 'TRUE';
  }
  else {
    $hasGPS = 'false';
  }

  // for development. Set the protocol (http:// or https://) and domain of the static assets
  $assetProto = '';
  $assetDomain = 'assets';


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>United Way Team 11!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?=$assetProto.$assetDomain?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      body, html {
        height: 100%;
        margin: 0px;
        padding: 0px;
      }
        .full {
          height: 100%
        }
        #ux-bar {
          background-color: rgb(85, 92, 164);
        }
        #map-canvas {
          width: 100%;
          height: 100%;
        }
    </style>
  </head>
  <body>
    <div class="row full">
        <div class="col-md-2 full" id="ux-bar">
<?php
  include('uxbar.php');
?>
        </div>
        <div class="col-md-10 full">
          <div id="map-canvas"></div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=$assetProto.$assetDomain?>/jquery-2.0.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$assetProto.$assetDomain?>/bootstrap/js/bootstrap.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPNqNLrWRSdshfgppSteYx_8qmO6lqtk4&sensor=<?=$hasGPS?>" type="text/javascript"></script>
    <script src="<?=$assetProto.$assetDomain?>/verse.js" type="text/javascript">
      

    
  </script>
  </body>
</html>