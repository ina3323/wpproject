<?php
@session_start();
$title = $_POST['title'];
$synopsis = $_POST['synopsis'];
$genre = $_POST['genre'];
$userid = $_SESSION['userid'];

$db = mysqli_connect('localhost', 'root', '', 'wpproject');

$sql = ('
  INSERT INTO posts
  (title, synopsis, genre, userid)
  VALUES
  ("' . $title . '","' . $synopsis . '","' . $genre . '" ,"' . $userid . '") ');

$new = mysqli_query($db, $sql);

if ($new) {
  echo "<script>alert('Your posting was sucessful.');</script>";
  echo "<script>location.replace('../novel_fantasy.php');</script>";
} else {
  echo "<script>alert('failed!.');</script>";
  echo "<script>location.replace('../novel_fantasy.php');</script>";
}