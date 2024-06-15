<?php
@session_start();
$result = session_destroy();
if ($result) {
  ?>
  <script>
    alert("You logouted!");
    location.replace("../home.php");
  </script>
  <?php
} ?>