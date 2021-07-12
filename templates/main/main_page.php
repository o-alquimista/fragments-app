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

      <?php if (empty($articles)): ?>
      <section class="text-center p-4">
        <span class="lead text-secondary">Nothing here</span>
      </section>
      <?php else: ?>
      <section>
        <?php foreach ($articles as $article): ?>
        <article class="border p-3">
          <?= $this->escape($article->title) ?>
        </article>
        <?php endforeach ?>
      </section>
      <?php endif ?>
    </main>
    
    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
