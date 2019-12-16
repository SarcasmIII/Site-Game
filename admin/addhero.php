<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['id'])          &&
    isset($_POST['name'])        &&
    isset($_POST['game'])        &&
    isset($_POST['image_hero'])  &&
    isset($_POST['description']))
{
    $id   = get_post($conn, 'id');
    $name    = get_post($conn, 'name');
    $game = get_post($conn, 'game');
    $image_hero     = get_post($conn, 'image_hero');
    $description     = get_post($conn, 'description');
    $query    = "INSERT INTO heroes(id, name, game, image_hero, description) VALUES" .
        "('$id', '$name', '$game', '$image_hero', '$description')";
    $result   = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
}
	echo <<<_END

<div class="os">
    <div class="header"><h1>Add hero</h1></div>
  <form action="listhero.php" method="post"><pre>
id:          <input type="text" name="id">
name:        <input type="text" name="name">
game:        <input type="text" name="game">
image_hero:  <input type="text" name="image_hero">
description: <textarea rows="5" cols="35" name="description"></textarea>
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