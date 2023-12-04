<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>K-Means Results</title>
</head>
<body>

    <h1>K-Means Results</h1>

    <p>Hasil K-Means:</p>
    <ul>
        <?php foreach ($clusters as $index => $cluster): ?>
            <li>Sample <?= $index ?> masuk ke cluster <?= $cluster ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>