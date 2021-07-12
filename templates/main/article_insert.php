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

      <form method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="required" value="<?= isset($_POST['title']) ? $this->escape($_POST['title']) : '' ?>">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <textarea id="body" name="body" class="form-control" required="required"><?= isset($_POST['body']) ? $this->escape($_POST['body']) : '' ?></textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" id="date" name="date" class="form-control" required="required" value="<?= isset($_POST['date']) ? $this->escape($_POST['date']) : '' ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="time" class="form-label">Time</label>
              <input type="time" id="time" name="time" class="form-control" required="required" value="<?= isset($_POST['time']) ? $this->escape($_POST['time']) : '' ?>">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-success btn-lg">Create</button>
        </div>
        <input type="hidden" name="csrfToken" value="<?= $csrf->get('article') ?>">
      </form>
    </main>
    
    <?= $this->include('main/_footer.php') ?>
  </body>
</html>
