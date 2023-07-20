<?php include_once 'views/reusable/head.php'; ?>

<?php if(isset($_SESSION['user']['id'])) { ?>
  <script>location.href = "<?= ROOT ?>";</script>
<?php } ?>

<div class="login-page-wrapper">
  <?php include_once 'views/reusable/navbar.php'; ?>
  <?php include_once 'views/login/login-container.php'; ?>
</div>  

<?php include_once 'views/reusable/foot.php'; ?>

<script src="<?= ROOT . 'assets/js/user/login.js' ?>"></script>