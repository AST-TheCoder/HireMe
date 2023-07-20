<div class="change-password-col col-9">
  <div class="change-password-form-row row">
    <div class="change-password-form-col col-6 mx-auto">
      <form action="<?= ROOT . 'api/user/change-password.php' ?>" method="POST" class="bg-white p-4" onsubmit="changePassword(event)">
        <legend class="change-password-heading text-dark text-center mb-4 fw-bold">Change Password</legend>
        <div class="res-msg-container">
          <!-- ...  -->
        </div>
        <div class="mb-3">
          <label for="current-password-inp" class="current-password-label fw-semibold form-label">Current Password</label>
          <input type="password" name="currentPassword" class="current-password-inp form-control" id="current-password-inp">
        </div>
        <div class="mb-3">
          <label for="new-password-inp" class="new-password-label fw-semibold form-label">New Password</label>
          <input type="password" name="newPassword" class="new-password-inp form-control" id="new-password">
        </div>
        <div class="mb-4">
          <label for="confirm-password-inp" class="confirm-password-label fw-semibold form-label">Confirm Password</label>
          <input type="password" name="confirmPassword" class="confirm-password-inp form-control" id="confirm-password-inp">
        </div>
        <button type="submit" class="change-password-btn btn btn-primary py-2 fw-semibold w-100">Change Password</button>
      </form>
    </div>
  </div>
</div>