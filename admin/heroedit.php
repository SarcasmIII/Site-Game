<?php
require_once 'login.php';
require_once 'header-admin.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>
<?php

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
<div class="os">
    <div class="edithero-container">
        <div class="block-hero">
            <div class="edithero-image"><img src="../$row[hero_image]"></div>
            <div class="edithero-des">
                <p>name: $row[hero_name]</p>
                <p>game: $row[game_name]</p>
                <p>description: $row[hero_description]</p>
            </div>
        </div>
				  
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
					  <div>
						<img src="../$subrow[skill_image]">
						<p>$subrow[skill_name] - $subrow[skill_description]</p>
					  </div>
_END;
}
echo <<<_END
					</div>
			</div>
	  </body>
	</html>
_END;
?>