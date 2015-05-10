<?php
// include config.php file, this contains our DB connection
include_once( 'config.php' );
 
if( isset($_POST['story']) ) 
{
	$story = addslashes(trim($_POST['story']));
	// $comment = htmlentities(addslashes(trim($_POST['message'])));
	date_default_timezone_set("America/New_York");
	$date = date("F j, Y");
	$sql = "select count(*) as total from story";
	$result = mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$count = $data['total'] + 1;

	$classtype = $count % 2 != 0 ? "timeline-inverted" : "normal";
    $symbols = array("glyphicon glyphicon-heart", "glyphicon glyphicon-envelope", "glyphicon glyphicon-globe");
    $colors = array("danger", "success", "warning");
    $num = $count % 3;
	
	if ($story == "") {
		echo '0';
	} else {
		$sql=mysql_query("INSERT INTO story(content, date_posted) VALUES ('$story', '$date')");
		if($sql) {
		echo '
			<li class="'. $classtype .'">
          		<div class="timeline-badge '. $colors[$num] .'"><i class="'. $symbols[$num] .'"></i>
          		</div>
          		<div class="timeline-panel">
            		<div class="timeline-heading">
              			<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'. $date .'</small></p>
            		</div>
            		<div class="timeline-body">
              			<p>'. nl2br($story) .'</p>
            		</div>
          		</div>
        	</li>
		';
		}
	}
 
}
?>