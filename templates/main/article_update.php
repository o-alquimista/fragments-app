<!doctype html>
<html lang="en-US">
  <head>
    <?= $this->include('main/_meta.php') ?>
    <?= $this->include('main/_style.html') ?>
    <?= $this->include('main/_script.html') ?>
    
    <?= $this->include('main/_title.php', [
        'title' => 'Edit article'
    ]) ?>
  </head>
  <body>
    <?= $this->include('main/_menu.php', [
        'currentPage' => 'article'
    ]) ?>

    <main id="main" class="container mt-3">
      <header>
        <h1>Edit article</h1>
      </header>

      <?= $this->include('main/feedback.php') ?>

      <?= $this->include('main/form/article.php', [
        'title' => $this->escape($article->title),
        'body' => $this->escape($article->body),
        'date' => (\DateTime::createFromFormat('Y-m-d H:i:s', $article->date))->format('Y-m-d'),
        'time' => (\DateTime::createFromFormat('Y-m-d H:i:s', $article->date))->format('H:i'),
        'submitLabel' => 'Update',
        'csrfToken' => $csrf->get('article')
      ]) ?>
    </main>

    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
