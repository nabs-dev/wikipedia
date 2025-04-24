<?php
include "db.php";
$keyword = $_GET['q'] ?? '';
$result = $conn->query("SELECT * FROM articles WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results - Wikipedia Clone</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .header {
      background: #2d3436;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 26px;
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 30px;
      color: #2c3e50;
    }
    .article {
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 1px solid #ddd;
    }
    .article h3 {
      margin: 0;
      font-size: 22px;
      color: #0984e3;
    }
    .article p {
      color: #555;
      margin-top: 5px;
    }
    .article a {
      text-decoration: none;
      color: #0984e3;
    }
    .article a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="header">Wikipedia Clone</div>
  <div class="container">
    <h2>Search Results for "<?= htmlspecialchars($keyword) ?>"</h2>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='article'>
          <h3><a href='view_article.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a></h3>
          <p>" . substr(strip_tags($row['content']), 0, 150) . "...</p>
        </div>";
      }
    } else {
      echo "<p>No articles found.</p>";
    }
    ?>
  </div>
</body>
</html>
