<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Logging Out...</title>
  <script>
    // JavaScript redirection after logout
    window.location.href = "login.php";
  </script>
</head>
<body>
</body>
</html>
