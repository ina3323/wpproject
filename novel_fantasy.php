<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fantasy</title>
  <link rel="stylesheet" type="text/css" href="novellist.css">
</head>

<body>
  <h1>Fantasy novel</h1>
  <div>
    <button onclick='location.replace("write_new.php")'>Write new post</button>
    <button onclick='location.replace("home.php")'>go back</button>
  </div>
  <div>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'wpproject');
    $sql = "SELECT id, title, userid, created_at FROM posts";
    $result = mysqli_query($db, $sql);

    if ($result->num_rows > 0) {
      echo "<ul>";
      while ($row = $result->fetch_assoc()) {
        echo "<li><a href='view_post.php?id=" . $row["id"] . "'>" . $row["title"] . "</a> by " . $row["userid"] . " on " . $row["created_at"] . "</li>";
      }
      echo "</ul>";
    } else {
      echo "게시물이 없습니다.";
    }

    ?>
  </div>
</body>

</html>