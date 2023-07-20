<div class="login-container container py-5">
  <div class="login-row row">
    <div class="login-col col-5 mx-auto">
      <form action="<?= ROOT . 'api/user/login.php' ?>" method="POST" class="bg-white p-4" onsubmit="login(event)">
        <legend class="login-heading text-dark text-center mb-4 fw-bold">Login</legend>
        <div class="res-msg-container">
          <!-- ...  -->
        </div>
        <div class="mb-3">
          <label for="phone-inp" class="phone-label fw-semibold form-label">Phone</label>
          <input type="text" name="phone" class="phone-inp form-control" id="phone-inp">
          <div class="phone-help-text form-text">Kindly include +880 in the beginning</div>
        </div>
        <div class="mb-4">
          <label for="password-inp" class="password-label fw-semibold form-label">Password</label>
          <input type="password" name="password" class="password-inp form-control" id="password-inp">
        </div>
        <button type="submit" class="login-btn btn btn-primary py-2 fw-semibold w-100">Login</button>
        <div class="register-now-text-wrapper text-center mt-4">
          Not registered yet? <a href="register.php" class="text-primary">Register Now</a>
        </div>
      </form>
    </div>
  </div>
</div>