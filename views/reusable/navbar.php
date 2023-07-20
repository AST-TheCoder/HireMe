<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 bg-light">
  <div class="container">
    <a class="fw-bold navbar-brand" href="#">Teach Me</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="">Home</a>
        </li>
        <?php if(!isset($_SESSION['user']['id'])) { ?>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="login.php">Login</a>
          </li>
        <?php } ?>
        <?php if(isset($_SESSION['user']['id'])) { ?>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="edit-personal-info.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="posts.php?type=mine">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="logout.php">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>