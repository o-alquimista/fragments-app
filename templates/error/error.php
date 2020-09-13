<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include __DIR__ . '/../base/_meta.html'; ?>
        <?php include __DIR__ . '/../base/_style.html'; ?>
        <title>Error - Fragments App</title>
    </head>
    <body>
        <div class="container">
        	<h1><?= $statusCode ?></h1>
        	<p>Something went wrong.</p>
        </div>
        
        <?php include __DIR__ . '/../base/_script.html'; ?>
    </body>
</html>