<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Parsedown;

$Parsedown = new Parsedown();

$fileParam = $_GET['file'] ?? '';

$markdownFile = __DIR__ . '/../papers/' . $fileParam . '.md';

if (!file_exists($markdownFile)) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 - File not found</h1>";
    exit;
}

$markdownContent = file_get_contents($markdownFile);

$htmlContent = $Parsedown->text($markdownContent);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlentities($fileParam); ?></title>
  <style>
    body {
      background-color: #111;
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    a {
      color: #73b7ff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    pre {
      background-color: #333;
      padding: 10px;
      overflow-x: auto;
    }
    code {
      background-color: #222;
      padding: 2px 4px;
      border-radius: 4px;
    }

    h1, h2, h3 {
      color: #d39ac9;
    }
  </style>
</head>
<body>
  <?php echo $htmlContent; ?>
</body>
</html>
