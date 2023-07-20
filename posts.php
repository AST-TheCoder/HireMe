<?php include_once 'views/reusable/head.php'; ?>

<?php if(!isset($_SESSION['user']['id'])) { ?>
  <script>location.href = "<?= ROOT . 'login.php' ?>";</script>
<?php } ?>

<div class="posts-page-wrapper">
  <?php include_once 'views/reusable/navbar.php'; ?>
  <div class="posts-container container py-5">
    <?php include_once 'views/posts/filter-by-post-owner.php'; ?>
  </div>
</div>  

<?php include_once 'views/reusable/foot.php'; ?>

<script src="<?= ROOT . 'assets/js/user/posts.js' ?>"></script>