<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Post</title>
  <link rel="stylesheet" href="view_post.css">
</head>

<body>
  <?php
  $db = mysqli_connect('localhost', 'root', '', 'wpproject');
  if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<h2>" . $row["title"] . "</h2>";
      echo "<p class='post_auth'>Author: " . $row["userid"] . "</p>";
      echo "<p class='post_date'>Date: " . $row["created_at"] . "</p>";
      echo "<p class='post_genre'>Genre: " . $row["genre"] . "</p>";
      echo "<p class='post_synop'>Synopsis: " . $row["synopsis"] . "</p>";
    } else {
      echo "게시물을 찾을 수 없습니다.";
    }
  } else {
    echo "ERROR";
  }
  ?>
  <div>
    <h2>continue the story</h2>
    <form method="POST" action="process/continue.php">
      <textarea rows="5" name="content"></textarea>
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
      <input type="submit" value="Apply">
    </form>
  </div>
  <div>
    <button onclick='location.replace("novel_fantasy.php")'>go back</button>
  </div>
</body>

</html>