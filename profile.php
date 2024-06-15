<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
</head>

<body>
  <h2>My Page</h2>
  <section id=userinfo>
    <h4>User Info</h4>
    <?php
    @session_start();
    $userid = $_SESSION['userid'];
    $db = mysqli_connect('localhost', 'root', '', 'wpproject');
    $sql = 'SELECT userid,password,email FROM users WHERE userid="' . $userid . '"';
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<p class='post_auth'>Userid: " . $row["userid"] . "</p>";
      echo "<p class='post_date'>Password: " . $row["password"] . "</p>";
      echo "<p class='post_genre'>Email: " . $row["email"] . "</p>";
    }
    ?>

  </section>
  <section id=profile>
    <h4>Profile</h4>
    <button type="button" class="toggle-button" id="toggleButton">modify my profile</button>
    <form id="cp" method="POST" action="process/profile_save.php" style="display: none;" enctype="multipart/form-data">
      <div class="form-group">
        <label for="bio">Bio:</label>
        <input type="text" name="bio">
      </div>
      <div class="form-group">
        <label for="profile">Profile_pic:</label>
        <input type="file" name="profile_pic">
      </div>
      <input type="submit" value="save">
    </form>

    <script>
      document.getElementById('toggleButton').addEventListener('click', function () {
        cp = document.getElementById('cp');
        button = document.getElementById('toggleButton');

        if (cp.style.display === 'none') {
          cp.style.display = 'block';
          button.textContent = 'Hide writeform';
        } else {
          cp.style.display = 'none';
          button.textContent = 'modify my profile';
        }
      });
    </script>

  </section>
</body>

</html>