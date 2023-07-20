<div class="edit-personal-info-col col-9 bg-white">
  <div class="personal-info-row row">
    <div class="personal-info-col col-4 d-flex flex-column justify-content-center align-items-center">
      <img class="user-profile-pic rounded-circle mb-3" src="<?= ROOT . 'assets/uploads/profile-images/user.png' ?>"/>
      <h5 class="user-fullname fw-bold">Sourav Malo</h5>
      <h6 class="user-username fw-semibold">@sourav_malo</h6>
    </div>
    <div class="edit-personal-info-form-col col-8">
      <form action="<?= ROOT . 'api/user/edit-personal-info.php' ?>" method="POST" class="bg-white p-4" onsubmit="editPersonalInfo(event)">
        <legend class="edit-personal-info-heading text-dark text-center mb-4 fw-bold">Edit Personal Info</legend>
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
            <input type="text" name="username" class="username-inp form-control" id="username-inp" minlength="3" maxlength="12" required readonly>
          </div>
          <div class="col-6">
            <label for="email-inp" class="email-label fw-semibold form-label">Email</label>
            <input type="email" name="email" class="email-inp form-control" id="email-inp" maxlength="255">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-6">
            <label for="phone-inp" class="phone-label fw-semibold form-label">Phone *</label>
            <input type="tel" name="phone" class="phone-inp form-control" id="phone-inp" minlength="14" maxlength="14" required>
            <div class="phone-help-text form-text">Kindly include +880 in the beginning</div>
          </div>
          <div class="col-6">
            <label for="profile-pic-inp" class="profile-pic-label fw-semibold form-label">Upload Profile Picture</label>
            <input type="file" name="password" class="profile-pic-inp form-control" id="profile-pic-inp">
          </div>
        </div>
        <div class="mb-4 row">
          <div class="col-12">
            <label for="description-inp" class="description-label fw-semibold form-label">Description (max. 1000 chars)</label>
            <textarea type="text" name="description" class="description-inp form-control" id="description-inp" maxlength="1000"></textarea>
            <div class="description-help-text form-text">Make sure you put a cachy description about your skills so that you may  accept more offers from the learners</div>
          </div>
        </div>
        <button type="submit" class="edit-personal-info-btn btn btn-primary py-2 fw-semibold w-100">Save Changes</button>
      </form>
    </div>
  </div>
</div>