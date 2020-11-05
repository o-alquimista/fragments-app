<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include __DIR__ . '/../base/_meta.html' ?>
        <?php include __DIR__ . '/../base/_style.html' ?>
        <title>Fragments App</title>
    </head>
    <body>
        <div class="container">
            <?php include __DIR__ . '/../base/_feedback.php' ?>

        	<?php if ($app_session->exists('user')): ?>
                <h1>Welcome, <?= $this->escape($app_session->get('user')['username']) ?></h1>
                <a href="<?= $app_router->generateUrl('logout') ?>" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <h1>Who are you?</h1>
                <a href="<?= $app_router->generateUrl('login') ?>" class="btn btn-dark">Login</a>
            <?php endif ?>
        </div>
        
        <?php include __DIR__ . '/../base/_script.html' ?>
    </body>
</html>