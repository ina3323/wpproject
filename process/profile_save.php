<?php
@session_start();
$db = mysqli_connect('localhost', 'root', '', 'wpproject');

$bio = $_POST['bio'];
echo "File Name: " . $_FILES['profile_pic']['name'] . "<br>";
echo "User Name: " . $_SESSION['id'] . "<br>";
if (!isset($_SESSION['id'])) {
  die("User ID not found in session.");
}
$user_id = $_SESSION['id'];
var_dump($_FILES['profile_pic']);
if ($_FILES['profile_pic']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['profile_pic']['tmp_name'])) {
  $file_tmp = $_FILES['profile_pic']['tmp_name'];
  $file_name = $_FILES['profile_pic']['name'];

  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
  if (!in_array(strtolower($file_ext), $allowed_exts)) {
    die("Only JPG, JPEG, PNG, GIF files are allowed.");
  }

  $upload_dir = 'profilepic/';
  $target_path = $upload_dir . $file_name;

  if (!move_uploaded_file($file_tmp, $target_path)) {
    die("Failed to move uploaded file.");
  }
} else {

  $target_path = 'profilepic/userpic.png';
}

$sql = "INSERT INTO profile (user_id, bio, profile_pic) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param('iss', $user_id, $bio, $target_path);
if ($stmt->execute()) {
  echo "Profile updated successfully.";
} else {
  echo "Error updating profile: " . $stmt->error;
}

mysqli_close($db);
?>