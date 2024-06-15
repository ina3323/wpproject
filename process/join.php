<?php
$userid = $_POST['userid'];
$password = $_POST['password'];
$email = $_POST['email'];

$db = mysqli_connect('localhost', 'root', '', 'wpproject');

$sql = ('SELECT userid FROM users where userid="' . $userid . '"');
$idcheck = mysqli_query($db, $sql);

if ($idcheck->num_rows) {
  echo "<script>alert('This ID is already in use.');</script>";
  echo "<script>history.back();</script>";
  exit;
}

$sql = ('
  INSERT INTO users
  (userid, password, email)
  VALUES
  ("' . $userid . '","' . $password . '","' . $email . '")
');

$join = mysqli_query($db, $sql);

if ($join) {
  echo "<script>alert('Welcome! You are registered as a member.');</script>";
  echo "<script>location.replace('/');</script>";
} else {
  echo "<script>alert('Registration Failed.');</script>";
  echo "<script>location.replace('/join.php');</script>";
}