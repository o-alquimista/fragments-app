<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include __DIR__ . '/../base/_meta.html'; ?>
        <?php include __DIR__ . '/../base/_style.html'; ?>
        <title>Login - Fragments App</title>
    </head>
    <body>
        <div class="container">
            <h1>Login</h1>
            
            <?php foreach ($this->getFeedback() as $type => $messages): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="alert alert-<?php echo $type; ?>" role="alert">
                      <?php echo $message; ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            
            <form method="post">
            	<?php $request = $this->getRequest() ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $request->post('username') ? $this->escape($request->post('username')) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <input type="hidden" name="_csrf_token" value="<?= $this->getCsrfToken('login') ?>">
                    <button type="submit" class="btn btn-dark">Sign in</button>
                </div>
            </form>
        </div>
        
        <?php include __DIR__ . '/../base/_script.html'; ?>
    </body>
</html>