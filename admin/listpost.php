<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete']) && isset($_POST['post_id']))
{
    $id   = get_post($conn, 'post_id');
    $query  = "DELETE FROM post WHERE post_id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
        $conn->error . "<br><br>";
}

if (isset($_POST['post_id'])          &&
    isset($_POST['post_name'])        &&
    isset($_POST['game_name'])        &&
    isset($_POST['post_image'])  &&
    isset($_POST['post_text']))
{
    $id   = get_post($conn, 'post_id');
    $name    = get_post($conn, 'post_name');
    $game = get_post($conn, 'game_name');
    $image_post     = get_post($conn, 'post_image');
    $text     = get_post($conn, 'post_text');
    $query    = "INSERT INTO post(post_id, post_name, game_name, post_image, post_text) VALUES" .
        "('$id', '$name', '$game', '$image_post', '$text')";
    $result   = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
}
echo <<<_END

<div class="os">
    <div class="header"><h1>Post</h1></div>
    <div class="post-list">
    <table>
        <tr>
            <td class="rowws">id</td>
            <td class="rowws">name</td>
            <td class="rowws">game</td>
            <td class="rowws">Кнопка удаления</td>
        </tr>     
_END;

$query  = "SELECT * FROM post";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
        <tr class="string">
            <td class="rowws">$row[0]</td>
            <td class="rowws"><a href="#" class="post-edit">$row[1]</a></td>
            <td class="rowws">$row[2]</td>
            <td class="rowws"><form action="listpost.php" method="post">
              <input type="hidden" name="delete" value="yes">
              <input type="hidden" name="post_id" value="$row[0]">
              <input type="submit" value="DELETE POST" class="delete-post"></form></td>
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