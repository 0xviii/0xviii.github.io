<?php
    $dir = __DIR__ . '/../papers';

    if (!isset($_GET['file'])) {
        die("No files specified");
    }

    $file = trim($_GET['file']);
    $file = str_replace('../', '', $file);
    $file = str_replace('..\\', '', $file);

    $path = realpath($dir . '/' . $file);

    if ($path === false || strpos($path, realpath($dir)) !== 0) {
        die("Invalid file");
    }

    if (!file_exists($path)) {
        die("File not found");
    }

    $content = file_get_contents($path);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Viewing: <?= htmlspecialchars($file) ?></title>
    </head>

    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        
        pre, code {
            font-family: Consolas, Monaco, monospace;
            font-size: 14px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        a.back {
            display: inline-block;
            margin-bottom: 20px;
            color: #0f8;
            text-decoration: none;
        }
        
        a.back:hover {
            text-decoration: underline;
        }
    </style>

    <body>
        <a class="back" href="list.php">&larr; Back to list</a>
        <h1>Viewing file: <?= htmlspecialchars($file) ?></h1>
        <hr>
        <pre><code><?= htmlspecialchars($content) ?></code></pre>
    </body>
</html>
