<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete']) && isset($_POST['id']))
{
    $id   = get_post($conn, 'id');
    $query  = "DELETE FROM heroes WHERE id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
        $conn->error . "<br><br>";
}

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
    <div class="header"><h1>Heroes</h1></div>
    <div class="post-list">
    <table>
        <tr>
            <td class="rowws id">id</td>
            <td class="rowws name">name</td>
            <td class="rowws game">game</td>
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
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
        <tr class="string">
            <td class="rowws id">$row[0]</td>
            <td class="rowws name"><a href="#" class="hero-edit">$row[1]</a></td>
            <td class="rowws game">$row[2]</td>
            <td class="rowws"><form action="listhero.php" method="post">
              <input type="hidden" name="delete" value="yes">
              <input type="hidden" name="id" value="$row[0]">
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