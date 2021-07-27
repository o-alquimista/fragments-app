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
    <?= $this->include('main/_menu.php', [
      'currentPage' => 'main'
    ]) ?>

    <main id="main" class="container mt-3">
      <header>
        <h1>Main page</h1>
      </header>

      <?= $this->include('main/feedback.php') ?>

      <?php if (empty($articles)): ?>
      <section class="text-center p-4">
        <span class="lead text-secondary">Nothing here</span>
      </section>
      <?php else: ?>
      <ul class="list-group">
        <?php foreach ($articles as $article): ?>
        <li class="list-group-item">
          <?= $this->escape($article->title) ?>
          <a href="<?= $app_router->generateUrl('article_update', ['id' => $article->id]) ?>">Edit</a>
        </li>
        <?php endforeach ?>
        </ul>
      <?php endif ?>
    </main>
    
    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
