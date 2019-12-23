<?php
require_once 'login.php';
require_once 'header-admin.php';
?>
<?php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

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
    <div class="header"><h1>Add post</h1></div>
  <form action="listpost.php" method="post"><pre>
id:          <input type="text" name="post_id">
name:        <input type="text" name="post_name">
game:        <input type="text" name="game_name">
image_post:  <input type="text" name="post_image">
text: <textarea rows="5" cols="35" name="post_text"></textarea>
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