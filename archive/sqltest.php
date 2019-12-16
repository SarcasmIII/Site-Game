<?php // sqltest.php
  require_once 'login.php';
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
  <form action="sqltest.php" method="post"><pre>
id:          <input type="text" name="id">
name:        <input type="text" name="name">
game:        <input type="text" name="game">
image_hero:  <input type="text" name="image_hero">
description: <textarea rows="5" cols="35" name="description"></textarea>
           <input type="submit" value="ADD RECORD">
  </pre></form>
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
  <pre>
$row[0] $row[1] $row[2] 
  </pre>
  <form action="sqltest.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="id" value="$row[0]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  }
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
