<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
  <form action="process/join.php" method="POST">
    <h1>Sign Up</h1>
    <div>
      <label for="userid">User ID:</label>
      <input type="text" name="userid" id="userid">
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email">
    </div>
    <input type="submit" value="Register">
    <footer>Already a member? <a href="home.php">Login here</a></footer>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $("#checkid").click(function () {
      var uid = $("input[name='userid']").val();
      if (uid) {

      }
      else {
        alert("Please enter UserID");
      }
    })
  </script>
</body>

</html>