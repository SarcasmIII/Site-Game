<?php
require_once 'admin/login.php';
require_once 'header.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
	echo <<<_END
			<div class="game-container section" id="game">
				<div class="container">
_END;
$gamequery = "SELECT * FROM game";
$gameresult = $conn->query($gamequery);
if (!$gameresult) die ("Database access failed: " . $conn->error);

$gamerows = $gameresult->num_rows;
for ($j = 0; $j < $gamerows; ++$j)
{
$gameresult->data_seek($j);
$gamerow = $gameresult->fetch_array(MYSQLI_ASSOC);
echo <<<_END
				  <div class="game ml">
					<div class="game-logo"><a href="game-hero.php?game=$gamerow[game_slug]"><img src="$gamerow[game_image]"></a></div>
					<p> $gamerow[game_name] - $gamerow[game_description]</p>
				  </div>
_END;
}
$query  = "SELECT * FROM heroes";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;
$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);
/*echo "lalal";
var_dump($row);*/
echo <<<_END
</div>
</div>
			<div class="example-container section" id="description">
				<div class="container">
				  <div class="hero-example">
					<div class="bar-wrap">
						<div class="control-bar">
						</div>
						<div class="wrap-control-line draggable"><div class="control-line"></div></div>
					</div>
					<img src="$row[3]">
				  </div>
				  <div class="hero-description">
				  <p class="description-head">$row[1] — это $row[4]</p>
				<div class="all-skill">
_END;
$subquery = "SELECT * FROM skills WHERE hero_id='$row[0]'";
$subresult = $conn->query($subquery);
if (!$subresult) die ("Database access failed: " . $conn->error);

$subrows = $subresult->num_rows;
for ($j = 1; $j <= $subrows; ++$j)
{
	$subresult->data_seek($j-1);
	$subrow = $subresult->fetch_array(MYSQLI_ASSOC);
	echo <<<_END
					  <div class="skill skill$j">
						<img src="$subrow[skill_image]">
						<p>$subrow[skill_name] - $subrow[skill_description]</p>
					  </div>
_END;
}
echo <<<_END
					</div>
				  </div>
				</div>
			</div>
			<div class="container-our section" id="us">
			<div class="container">
			  <div class="photo photokr"><img src="image/our1.jpg"></div>
			  <div class="text-our"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Suspendisse potenti. Suspendisse lacinia tristique leo id molestie. Mauris lacinia sem sem, non gravida metus ultrices vel. Sed dui mauris, molestie scelerisque laoreet id, laoreet vitae sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Suspendisse potenti. Suspendisse lacinia tristique leo id molestie. Mauris lacinia sem sem, non gravida metus ultrices vel. Sed dui mauris, molestie scelerisque laoreet id, laoreet vitae sapien.</p></div>
			  <div class="photo photosi"><img src="image/our2.jpg"></div>
			</div>
		</div>
		</div>
	  <div class="loginBlock hidden">
		<div class="registration">
		  <div class="login">
			<input class="login-confirm" type="email" name="login" value="login">
		  </div>
		  <div class="password">
			<input class="password-confirm" type="password" name="password" value="password">
		  </div>
		  <div class="confirm">
			<p>confirm</p>
		  </div>
		  <div class="backstep">
			<p>back</p>
		  </div>
		</div>
	  </div>
	  </body>
	</html>
_END;
?>
