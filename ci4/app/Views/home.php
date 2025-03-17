<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<body>
    <h1>Welcome to Home Page</h1>
    <p><?= $content; ?></p>

    <h2>Artikel Terkini</h2>
    <?= view('components/artikel_terkini', ['artikel' => $artikel]) ?>
</body>
</html>
