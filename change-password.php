<?php include_once 'views/reusable/head.php'; ?>

<?php if(!isset($_SESSION['user']['id'])) { ?>
  <script>location.href = "<?= ROOT . 'login.php' ?>";</script>
<?php } ?>

<div class="change-password-page-wrapper">
  <?php include_once 'views/reusable/navbar.php'; ?>
  <div class="change-password-container container py-5">
    <div class="proflile-row row">
      <?php include_once 'views/reusable/profile-sidebar.php'; ?>
      <?php include_once 'views/profile/change-password-col.php'; ?>
    </div>
  </div>
</div>  

<?php include_once 'views/reusable/foot.php'; ?>

<script src="<?= ROOT . 'assets/js/user/change-password.js' ?>"></script>