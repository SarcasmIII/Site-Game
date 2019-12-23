<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['hero_id'])          &&
    isset($_POST['hero_name'])        &&
    isset($_POST['game_name'])        &&
    isset($_POST['hero_image'])  &&
    isset($_POST['hero_description']))
{
    $id   = get_post($conn, 'hero_id');
    $name    = get_post($conn, 'hero_name');
    $game = get_post($conn, 'game_name');
    $image_hero     = get_post($conn, 'hero_image');
    $description     = get_post($conn, 'hero_description');
    $query    = "INSERT INTO heroes(hero_id, hero_name, game_name, hero_image, hero_description) VALUES" .
        "('$id', '$name', '$game', '$image_hero', '$description')";
    $result   = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
}
	echo <<<_END

<div class="os">
    <div class="header"><h1>Add hero</h1></div>
  <form action="listhero.php" method="post"><pre>
id:          <input type="text" name="hero_id">
name:        <input type="text" name="hero_name">
game:        <input type="text" name="game_name">
image_hero:  <input type="text" name="hero_image">
description: <textarea rows="5" cols="35" name="hero_description"></textarea>
           <input type="submit" value="ADD RECORD">
  </pre></form>
    </table>
    </div>
</div>
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