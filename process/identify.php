<?php
@session_start();
$connect = mysqli_connect("localhost", "root", "", "wpproject");
$userid = $_POST['userid'];
$password = $_POST['password'];
$sql = ('SELECT id,userid,email,password FROM users where userid="' . $userid . '"');
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
  $_SESSION['email'] = $email;
  $hashed_password = $row['password'];

  if ($hashed_password == $password) {
    $_SESSION['userid'] = $userid;
    $_SESSION['id'] = $row['id'];
    if (isset($_SESSION['userid'])) {
      ?>
      <script>
        alert("You logined!");
        location.replace("../home.php");
      </script>
      <?php
    } else {
      echo "session fail";
    }
  } else {
    ?>
    <script>
      alert("Wrong ID or Password");
      history.back();
    </script>
    <?php
  }
} else {
  ?>
  <script>
    alert("Wrong ID or Password");
    history.back();
  </script>
  <?php
}
?>