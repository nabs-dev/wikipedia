<?php include "db.php"; session_start();
if (!isset($_SESSION['user'])) echo "<script>window.location.href='login.php';</script>";
if ($_POST) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $uid = $_SESSION['user']['id'];
  $conn->query("INSERT INTO articles (title, content, category, user_id) VALUES ('$title', '$content', '$category', '$uid')");
  echo "<script>window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Article</title>
  <style>
    body { font-family: sans-serif; background: #f0f8ff; padding: 30px; }
    form { background: #fff; padding: 20px; max-width: 600px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px #aaa; }
    input, textarea, select, button { width: 100%; padding: 10px; margin: 10px 0; }
    button { background: #28a745; color: white; border: none; }
  </style>
</head>
<body>
  <form method="post">
    <h2>Create New Article</h2>
    <input name="title" placeholder="Article Title" required>
    <textarea name="content" rows="8" placeholder="Article Content" required></textarea>
    <input name="category" placeholder="Category" required>
    <button>Publish</button>
  </form>
</body>
</html>
