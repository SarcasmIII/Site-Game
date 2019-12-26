<?php
function sanitizeString($var){
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
require_once 'admin/login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET['game_id'])){
    $gg  = sanitizeString($_GET['game_id']);
}
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
                <li><a href="index.php">Главная</a></li>
            </ul>
        </div>
        <div class="search-header">
            <input type="search">
        </div>
        <div class="loginButton">
            <p>Login</p>

        </div>
    </div>
    <div class="header-choose-hero">
_END;

$query  = "SELECT * FROM heroes WHERE game_id='$gg'";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo <<<_END
        <div class="image-choose-hero"><a class="scroll-description" href="#$row[hero_id]"><img src="$row[hero_image]"></a></div>
_END;
}
echo <<<_END
    </div> <!--header-choose-hero-->
_END;
$query  = "SELECT * FROM heroes WHERE game_id='$gg'";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;
/*var_dump($rows);*/
for ($i = 0; $i < $rows; ++$i)
{
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    /*var_dump($row);*/
    $subquery = "SELECT * FROM skills WHERE hero_id='$row[hero_id]'";
    $subresult = $conn->query($subquery);
    if (!$subresult) die ("Database access failed: " . $conn->error);
    /*echo "lalal";
    var_dump($row);*/
    echo <<<_END
    <div class="example-container section" id="$row[hero_id]">
        <div class="container">
            <div class="hero-example">
                <img src="$row[hero_image]">
            </div>
            <div class="hero-description">
                <p class="description-head">$row[hero_name] — это $row[hero_description]</p>
                <div class="all-skill">
_END;
    $subrows = $subresult->num_rows;
    for ($j = 1; $j <= $subrows; ++$j) {
        $subresult->data_seek($j - 1);
        $subrow = $subresult->fetch_array(MYSQLI_ASSOC);
        echo <<<_END
                    <div class="skill skill$j">
                        <img src="$subrow[skill_image]">
                        <p>$subrow[skill_name] - $subrow[skill_description]</p>
                    </div>

_END;
    }
    echo <<<_END
</div> <!--skill-->
</div> <!--description-->
        </div><!--container-->
    </div><!--example-->
_END;
}
echo <<<_END
</div> <!--main-->
</body>
</html>
_END;
$result->close();
$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>
