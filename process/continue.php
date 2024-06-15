<?php
$content = $_POST['content'];
$post_id = $_POST['post_id'];
$db = mysqli_connect('localhost', 'root', '', 'wpproject');

$sql = 'SELECT synopsis FROM posts WHERE id = "' . $post_id . '"';
$result = mysqli_query($db, $sql);

if ($result) {
  $row = $result->fetch_assoc();
  $existing_content = $row['synopsis'];
  $new_content = $existing_content . "\n" . $content;

  $sql = "UPDATE posts SET synopsis = ? WHERE id = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('si', $new_content, $post_id);

  if ($stmt->execute()) { ?>
    <script>
      location.replace("../view_post.php?id=<?php echo $post_id; ?>")</script>
    <?php
  } else {
    echo "Error updating record: " . $db->error;
  }
}
mysqli_close($db);
?>