<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Write new post</title>
  <link rel="stylesheet" type="text/css" href="write.css">
  <h2>New Story</h2>
</head>

<body>
  <div>
  </div>
  <form class="form_to_write" method="POST" action="process/post.php">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="detail">Synopsis</label>
      <textarea rows="10" name="synopsis"></textarea>
    </div>
    <div class="form-group">
      <select name="genre">
        <option value="fantasy">Fantasy</option>
        <option value="modern_fantasy">Modern Fantasy</option>
        <option value="romance_fantasy">Romance Fantasy</option>
        <option value="romance">Romance</option>
        <option value="scifi">Sci-Fi</option>
      </select>
    </div>
    <div>
      <input type="submit" value="post">
    </div>
  </form>
</body>
<footer>
  <div>
    <button onclick='location.replace("novel_fantasy.php")'>go back</button>
  </div>
</footer>

</html>