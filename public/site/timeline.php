<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>timeline</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/timeline.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="timeline.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id = "div1" class="container">
      <div class="page-header" style="clear: both;">
        <h1 id="timeline">Timeline <button id="newstory" type = "button" class = "btn btn-default right" onclick=newStory()><i class="glyphicon glyphicon-pencil"></i> New Story</button></h1>
      </div>
      
      <ul id = "stories" class="timeline">
        <?php
        // include config.php file, this contains our DB connection
        include_once( 'config.php' );
        $sql = "SELECT id, content, date_posted FROM story order by `id` DESC";
        $res = mysql_query($sql);
        
        if ($res) {
          while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
            $classtype = $row["id"] % 2 != 0 ? "timeline-inverted" : "normal";
            $symbols = array("glyphicon glyphicon-heart", "glyphicon glyphicon-envelope", "glyphicon glyphicon-globe");
            $colors = array("danger", "success", "warning");
            $num = $row["id"] % 3;

            echo '
            <li class="'. $classtype .'">
              <div class="timeline-badge '. $colors[$num] .'"><i class="'. $symbols[$num] .'"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'. $row['date_posted'] .'</small></p>
                </div>
                <div class="timeline-body">
                  <p>'. nl2br($row["content"]) .'</p>
              </div>
            </sli>
            ';
          }
        }
        ?>

        <li class="normal">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Ice break</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2015-01-01</small></p>
            </div>
            <div class="timeline-body">
              <p>This is the first Story</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>