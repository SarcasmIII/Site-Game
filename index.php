<?php
require_once 'admin/login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
	echo <<<_END
	<!DOCTYPE html>
	<html lang="ru" dir="ltr">
	  <head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/jquery.snow.js"></script>
		<script src="js/draggabilly.pkgd.min.js"></script>
		<script src="js/main.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
		<title></title>
	  </head>
	  <body>
		<div class="main">
			<div class="header">
			  <div class="logo-header">
				<img src="image/logo.svg">
			  </div>
			  <div id="menu" class="menu-header">
				<ul>
				  <li><a href="#">Главная</a></li>
				  <li><a href="#">Игры</a></li>
				  <li><a class="scroll-description" href="#description">Пример</a></li>
				  <li><a href="#">О нас</a></li>
				</ul>
			  </div>
			  <div class="search-header">
				<input type="search">
			  </div>
		  <div class="loginButton">
		   <p>Login</p>

		  </div>
			</div>
			<div class="game-container section">
				<div class="container">
				  <div class="game ml">
					<div class="game-logo"><img src="image/logo-ml.png"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Suspendisse potenti. Suspendisse lacinia tristique leo id molestie. Mauris lacinia sem sem, non gravida metus ultrices vel. Sed dui mauris, molestie scelerisque laoreet id, laoreet vitae sapien.</p>
				  </div>
				  <div class="game dota">
					<div class="game-logo"><a href="index02.html"><img src="image/logo-ml.png"></a></div>
					<p>Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Lorem ipsum Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus.Suspendisse potenti. Suspendisse lacinia tristique leo id molestie. Mauris lacinia sem sem, non gravida metus ultrices vel. Sed dui mauris, molestie scelerisque laoreet id, laoreet vitae sapien.</p>
				  </div>
				  <div class="game lol">
					<div class="game-logo"><img src="image/logo-ml.png"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean semper felis eu dictum tristique. In vel diam magna. Suspendisse aliquet nibh et nunc finibus maximus. Suspendisse potenti. Suspendisse lacinia tristique leo id molestie. Mauris lacinia sem sem, non gravida metus ultrices vel. Sed dui mauris, molestie scelerisque laoreet id, laoreet vitae sapien.</p>
				  </div>
				</div>
			</div>
_END;
$query  = "SELECT * FROM heroes";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;
$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);
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
for ($j = 0; $j < $subrows; ++$j)
{
	$subresult->data_seek($j);
	$subrow = $subresult->fetch_array(MYSQLI_ASSOC);
	echo <<<_END
					  <div class="skill skill1">
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
			<div class="container-our section">
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
