<!doctype html>
<html lang="en-US">
  <head>
    <?= $this->include('main/_meta.php') ?>
    <?= $this->include('main/_style.html') ?>
    <?= $this->include('main/_script.html') ?>
    
    <?= $this->include('main/_title.php', [
        'title' => 'New article'
    ]) ?>
  </head>
  <body>
    <?= $this->include('main/_menu.php', [
        'currentPage' => 'article'
    ]) ?>

    <main id="main" class="container mt-3">
      <header>
        <h1>New article</h1>
      </header>

      <?= $this->include('main/feedback.php') ?>

      <?= $this->include('main/form/article.php', [
        'title' => isset($_POST['title']) ? $this->escape($_POST['title']) : '',
        'body' => isset($_POST['body']) ? $this->escape($_POST['body']) : '',
        'date' => isset($_POST['date']) ? $this->escape($_POST['date']) : '',
        'time' => isset($_POST['time']) ? $this->escape($_POST['time']) : '',
        'submitLabel' => 'Create',
        'csrfToken' => $csrf->get('article')
      ]) ?>
    </main>
    
    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
