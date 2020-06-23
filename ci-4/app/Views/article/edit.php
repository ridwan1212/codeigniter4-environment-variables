<div class="container">

  <!-- page heading -->
  <div class="d-sm-flex align-item-center justify-content-between mt-3 mb-4">
    <h1 class="h3 mb-4"><?= $pageTitle; ?></h1>
  </div>

  <div class="row">
    <div class="col-xl-12 mb-3">

      <!-- form -->
      <?= form_open('article/update'); ?>

      <form action="" method="post">
        <div class="form-group">
          <label for="id"></label>
          <input type="hidden" class="form-control" name="id" value="<?= $forEdit['id']; ?>">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" class="form-control" name="author" value="<?= $forEdit['author']; ?>">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" value="<?= $forEdit['title']; ?>">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" value="<?= $forEdit['description']; ?>">
        </div>
        <div class="form-group">
          <label for="last_update"></label>
          <input type="hidden" class="form-control" name="last_update" value="<?= date('D, d M Y H:i:s'); ?>">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea type="text" class="form-control" name="content" rows="7"><?= $forEdit['content']; ?></textarea>
        </div>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='<?= base_url('article'); ?>'">Back</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>

    </div>
  </div>
</div>