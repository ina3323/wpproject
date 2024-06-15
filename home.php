<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Relay Novel Web</title>
  <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
  <header>
    <h1>RelayN</h1>
    <form id="searchbox">
      <input type="search" name="q" placeholder="검색할 소설을 입력하세요" />
      <input type="submit" value="Go!" />
    </form>
    <div id="signup">
      <a href="register.php">Sign up</a>
    </div>
    <div id="mypage">
      <a href="profile.php">My Page</a>
    </div>
  </header>
  <main>
    <section id="middle">
      <nav>
        <ul>
          <li><a href="novel_fantasy.php">Fantasy</a></li>
          <li><a href="#">Modern Fantasy</a></li>
          <li><a href="#">Romance Fantasy</a></li>
          <li><a href="#">Romance</a></li>
          <li><a href="#">Sci-Fi</a></li>
        </ul>
      </nav>
      <div id="recommendation">
        <div id="recommended_novelcover">
          <p>a cool web novel cover</p>
        </div>
        <div id="hotpost">
          <h3>Hot Post</h3>
          <ul>
            <li>How to Live as a Wizard at a Magic School</li>
            <li>Horror Story Club</li>
            <li>Return of the Blossoming Blade</li>
            <li>Load of the mysteries</li>
            <li>Misunderstood Hunter in Another World</li>
          </ul>
        </div>
      </div>
    </section>
    <section id="bottom">
      <div id="userforum">
        <h3>User Forum</h3>
        <ul>
          <li>Please recommend me a romance novel</li>
          <li>I wrote a critique of the Return of the Blossoming Blade</li>
          <li>What Do You Think About the Ending of MOL</li>
          <li>Plot Analysis : Horror Story Club</li>
          <li>I drawed Joshua</li>
        </ul>
      </div>
      <div id="recommended">
        <h3>Recommended</h3>
        <ul>
          <li>Be the Light of the Dark Sea</li>
          <li>Johann loves Tite</li>
          <li>Eightysix</li>
          <li>Ring of Fate</li>
          <li>Not an End but a Beginning</li>
        </ul>
      </div>
      <div id="newnovel">
        <h3>New Released</h3>
        <ul>
          <li>Amy's Melancholy</li>
          <li>You have been defended</li>
          <li>White Wolves</li>
          <li>Mother of Learning</li>
          <li>Children of Rune</li>
        </ul>
      </div>
    </section>
    <section id="aside">
      <div id="user">
        <div id="userinfo">
          <?php
          $connect = mysqli_connect("localhost", "root", "", "wpproject");
          @session_start(); // 
          if (isset($_SESSION['userid'])) {
            $id = $_SESSION['id'];
            $sql = ('SELECT profile_pic,bio FROM profile where user_id="' . $id . '"');
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
            $profile_pic = $row['profile_pic'];
            $profile_pic_path = 'process/' . $profile_pic;
            ?>
            <img src="<?php echo $profile_pic_path; ?>" alt="profile img">
            <p>Welcome,
              <?php
              echo $_SESSION['userid']; ?>
            </p>
            <p>LV.108</p>
            <button onclick='location.replace("process/logout.php")'>Logout</button>
            <?php
          } else {
            ?>
            <div class="loginpage">
              <h2>Login</h2>
              <form method="POST" action="process/identify.php" id="loginform">
                <div>
                  <label for="userid">User ID:</label>
                  <input type="text" name="userid" id="userid" placeholder="Enter your id">
                </div>
                <div>
                  <label for="password">Password:</label>
                  <input type="password" name="password" id="password" placeholder="Enter your password">
                </div>
                <input type="submit" value="Login">
              </form>
            </div>
          <?php }
          ?>
        </div>
        <div id="userfeatures">
          <ul>
            <li><a href="#">Storage</a></li>
            <li><a href="#">Notification</a></li>
            <li><a href="#">Gift Box</a></li>
            <li><a href="#">Friends</a></li>
          </ul>
        </div>
      </div>
      <div id="shortcut">
        <ul>
          <li><a href="#">Announcement</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Bug Report</li>
          <li><a href="#">For Newcomers</a></li>
        </ul>
      </div>
    </section>
  </main>
  <footer>
    <address>If you have any questions, please contact us here : <strong>alsk2303@naver.com</strong></address>
  </footer>
</body>

</html>