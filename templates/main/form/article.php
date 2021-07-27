<form method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" class="form-control" required="required" value="<?= $title ?>">
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea id="body" name="body" class="form-control" required="required"><?= $body ?></textarea>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" id="date" name="date" class="form-control" required="required" value="<?= $date ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="time" class="form-label">Time</label>
        <input type="time" id="time" name="time" class="form-control" required="required" value="<?= $time ?>">
      </div>
    </div>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-success btn-lg"><?= $submitLabel ?></button>
  </div>
  <input type="hidden" name="csrfToken" value="<?= $csrfToken ?>">
</form>
