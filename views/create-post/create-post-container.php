<div class="create-post-container container py-5">
  <div class="create-post-row row">
    <div class="create-post-col col-5 mx-auto">
      <form action="<?= ROOT . 'api/user/create-post.php' ?>" method="POST" class="bg-white p-4" onsubmit="createPost(event)">
        <legend class="create-post-heading text-dark text-center mb-4 fw-bold">Post your problem</legend>
        <div class="res-msg-container">
          <!-- ...  -->
        </div>
        <div class="mb-3">
          <label for="title-inp" class="title-label fw-semibold form-label">Title</label>
          <input type="text" name="title" class="title-inp form-control" id="title-inp">
        </div>
        <div class="mb-4">
          <label for="description-inp" class="description-label fw-semibold form-label">Description</label>
          <textarea type="text" name="description" class="description-inp form-control" id="description-inp"></textarea>
        </div>
        <button type="submit" class="create-post-btn btn btn-primary py-2 fw-semibold w-100">Post</button>
      </form>
    </div>
  </div>
</div>