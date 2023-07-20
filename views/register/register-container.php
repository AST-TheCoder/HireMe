<div class="register-container container py-5">
  <div class="register-row row">
    <div class="register-col col-5 mx-auto">
      <form action="<?= ROOT . 'api/user/register.php' ?>" method="POST" class="bg-white p-4" onsubmit="register(event)">
        <legend class="register-heading text-dark text-center mb-4 fw-bold">Register</legend>
        <div class="res-msg-container">
          <!-- ...  -->
        </div>
        <div class="mb-3 row">
          <div class="col-6">
            <label for="first-name-inp" class="first-name-label fw-semibold form-label">First Name *</label>
            <input type="text" name="firstName" class="first-name-inp form-control" id="first-name-inp" maxlength="20" required>
          </div>
          <div class="col-6">
            <label for="last-name-inp" class="last-name-label fw-semibold form-label">Last Name *</label>
            <input type="text" name="lastName" class="last-name-inp form-control" id="last-name-inp" maxlength="20" required>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-6">
            <label for="username-inp" class="username-label fw-semibold form-label">Username *</label>
            <input type="text" name="username" class="username-inp form-control" id="username-inp" minlength="3" maxlength="12" required>
          </div>
          <div class="col-6">
            <label for="email-inp" class="email-label fw-semibold form-label">Email</label>
            <input type="email" name="email" class="email-inp form-control" id="email-inp" maxlength="255">
          </div>
        </div>
        <div class="mb-4 row">
          <div class="col-6">
            <label for="phone-inp" class="phone-label fw-semibold form-label">Phone *</label>
            <input type="tel" name="phone" class="phone-inp form-control" id="phone-inp" minlength="14" maxlength="14" required>
            <div class="phone-help-text form-text">Kindly include +880 in the beginning</div>
          </div>
          <div class="col-6">
            <label for="password-inp" class="password-label fw-semibold form-label">Password *</label>
            <input type="password" name="password" class="password-inp form-control" id="password-inp" minlength="8" maxlength="20" required>
          </div>
        </div>
        <button type="submit" class="register-btn btn btn-primary py-2 fw-semibold w-100">Register</button>
        <div class="login-now-text-wrapper text-center mt-4">
          Already registered? <a href="login.php" class="text-primary">Login Now</a>
        </div>
      </form>
    </div>
  </div>
</div>