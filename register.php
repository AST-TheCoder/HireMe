<?php include_once 'views/reusable/head.php'; ?>

<?php if(isset($_SESSION['user']['id'])) { ?>
  <script>location.href = "<?= ROOT ?>";</script>
<?php } ?>

<div class="register-page-wrapper">
  <?php include_once 'views/reusable/navbar.php'; ?>
  <?php include_once 'views/register/register-container.php'; ?>
</div>  

<?php include_once 'views/reusable/foot.php'; ?>

<script src="<?= ROOT . 'assets/js/user/register.js' ?>"></script>