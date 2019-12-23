<?php
require_once 'login.php';
require_once 'header-admin.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>
<?php
echo <<<_END
<!DOCTYPE html>
	<html lang="ru" dir="ltr">
	  <head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/draggabilly.pkgd.min.js"></script>
		<script src="../js/main.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
		<title></title>
	  </head>
	  <body>
        <div class="os">
_END;
if (isset($_GET['hero_id'])){
   $id  = sanitizeString($_GET['hero_id']);
}
$query  = "SELECT * FROM heroes WHERE hero_id = '$id'";
$result = $conn->query($query);
/*var_dump($result);*/
if (!$result) die ("Database access failed: " . $conn->error);
$row = $result->fetch_array(MYSQLI_ASSOC);
/*echo "lalal";
var_dump($row);*/
echo <<<_END
			<div class="example-container section" id="description">
				<div class="container">
				  <div class="hero-example">
					<div class="bar-wrap">
						<div class="control-bar">
						</div>
						<div class="wrap-control-line draggable"><div class="control-line"></div></div>
					</div>
					<img src="../$row[hero_image]">
				  </div>
				  <div class="hero-description">
				  <p class="description-head">$row[hero_name] — это $row[hero_description]</p>
				<div class="all-skill">
_END;
$subquery = "SELECT * FROM skills WHERE hero_id='$row[hero_id]'";
$subresult = $conn->query($subquery);
if (!$subresult) die ("Database access failed: " . $conn->error);

$subrows = $subresult->num_rows;
for ($j = 1; $j < $subrows+1; ++$j)
{
    $subresult->data_seek($j-1);
    $subrow = $subresult->fetch_array(MYSQLI_ASSOC);
    echo <<<_END
					  <div class="skill skill$j">
						<img src="../$subrow[skill_image]">
						<p>$subrow[skill_name] - $subrow[skill_description]</p>
					  </div>
_END;
}
echo <<<_END
					</div>
				  </div>
				</div>
			</div>
		</div>
	  </body>
	</html>
_END;
?>