<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include __DIR__ . '/../base/_meta.html'; ?>
        <?php include __DIR__ . '/../base/_style.html'; ?>
        <title>Fragments App</title>
    </head>
    <body>
        <div class="container">
        	<?php if ($this->isAuthenticated()): ?>
            <h1>Welcome, <?= $_SESSION['user']['username'] ?></h1>
            <a href="<?= $this->generateUrl('logout') ?>" class="btn btn-danger">Logout</a>
            <?php else: ?>
            <h1>Who are you?</h1>
            <a href="<?= $this->generateUrl('login') ?>" class="btn btn-dark">Login</a>
            <?php endif ?>
            
            <?php foreach ($this->getFeedback() as $type => $messages): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="alert alert-<?= $type ?>" role="alert">
                      <?= $message ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        
        <?php include __DIR__ . '/../base/_script.html'; ?>
    </body>
</html>