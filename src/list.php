<?php
    $dir = __DIR__ . '/../papers';

    function list($dir, $rel = '')
    {
        $result = [];
        $path = $dir . ($rel ? DIRECTORY_SEPARATOR . $rel : '');
        $itens = scandir($path);

        foreach ($itens as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $path . DIRECTORY_SEPARATOR . $item;
            $r = ltrim($rel . '/' . $item, '/');

            if (is_dir($path)) {
                $result = array_merge($result, list($dir, $r));
            } else {
                $result[] = $r;
            }
        }

        return $result;
    }

    $files = list($dir);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.: XVIII :.</title>
    </head>

    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        a {
            color: #0f8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .file-list {
            margin-top: 20px;
        }

        .file-item {
            margin-bottom: 8px;
        }
    </style>

    <body>
        <h1>Papers</h1>
        <div class="file-list">
            <?php foreach ($files as $file): ?>
                <div class="file-item">
                    <a href="viewer.php?file=<?= urlencode($file) ?>">
                        <?= htmlspecialchars($file) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
