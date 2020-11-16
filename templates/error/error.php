<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include __DIR__ . '/../base/_meta.html' ?>
        <?php include __DIR__ . '/../base/_style.html' ?>
        <title><?= $statusCode ?> - Fragments App</title>
    </head>
    <body>
        <main class="container">
            <h1><?= $statusCode ?></h1>
        	<p>Oops, something went wrong.</p>
        </main>

        <?php include __DIR__ . '/../base/_script.html' ?>
    </body>
</html>
