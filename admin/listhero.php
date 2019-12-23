<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete']) && isset($_POST['hero_id']))
{
    $id   = get_post($conn, 'hero_id');
    $query  = "DELETE FROM heroes WHERE hero_id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
        $conn->error . "<br><br>";
}

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
    <div class="header"><h1>Heroes</h1></div>
    <div class="hero-list">
    <table>
        <tr>
            <td class="rowws">id</td>
            <td class="rowws">name</td>
            <td class="rowws">game</td>
            <td class="rowws">Кнопка удаления</td>
        </tr>     
_END;

$query  = "SELECT * FROM heroes";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo <<<_END
        <tr class="string">
            <td class="rowws">$row[hero_id]</td>
            <td class="rowws"><a href="heroedit.php?hero_id=$row[hero_id]&hero_name=$row[hero_name]" class="hero-edit">$row[hero_name]</a></td>
            <td class="rowws">$row[game_name]</td>
            <td class="rowws"><form action="listhero.php" method="post">
              <input type="hidden" name="delete" value="yes">
              <input type="hidden" name="hero_id" value="$row[hero_id]">
              <input type="submit" value="DELETE HERO" class="delete-hero"></form></td>
        </tr>     
_END;
}
echo <<<_END
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