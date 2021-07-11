<!doctype html>
<html lang="en-US">
  <head>
    <?= $this->include('main/_meta.php') ?>
    <?= $this->include('main/_style.html') ?>
    <?= $this->include('main/_script.html') ?>
    
    <?= $this->include('main/_title.php', [
        'title' => 'Main page'
    ]) ?>
  </head>
  <body>
    <?= $this->include('main/_menu.php') ?>

    <main id="main" class="container mt-3">
      <header>
        <h1>Main page</h1>
      </header>
    </main>
    
    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
