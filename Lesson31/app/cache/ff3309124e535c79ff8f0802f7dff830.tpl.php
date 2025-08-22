<?php $this->extends = "admin.admin";?>

<?php ob_start(); $this->currentSection = "main-content";?>
	
<style type="text/css">
 
    .content {
      padding: 20px;
    }
    .profile-header {
      background: #fff;
      padding: 30px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    .profile-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 20px;
    }
    .profile-info h3 {
      margin: 0;
    }
    .edit-profile-btn {
      margin-top: 10px;
    }
    .settings-section {
      background: #fff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .settings-section h5 {
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
  </style>

	<!-- Content Area -->
<div class="content mt-5 pt-4">

  <!-- Profile Header -->
  <div class="profile-header d-flex align-items-center">
    <img src="https://placehold.co/100x100" alt="Avatar" class="profile-avatar">
    <div class="profile-info">
      <h3>John Doe</h3>
      <p class="text-muted">@johndoe</p>
      <!-- Button trigger modal -->
      <button class="btn btn-outline-secondary btn-sm edit-profile-btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">
        <i class="fas fa-pen"></i> Edit Profile
      </button>
    </div>
  </div>

  <!-- Settings Sections -->
  <div class="settings-section">
    <h5>Account Information</h5>
    <form>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" value="John Doe" disabled>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="john@example.com" disabled>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" class="form-control" value="1990-01-01" disabled>
        </div>
      </div>
    </form>
  </div>

  <div class="settings-section">
    <h5>Security Settings</h5>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <div class="input-group">
        <input type="password" class="form-control" value="********" disabled>
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
          <i class="fas fa-key"></i> Change Password
        </button>
      </div>
    </div>
    <div class="form-check form-switch mb-3">
      <input class="form-check-input" type="checkbox" id="2faSwitch">
      <label class="form-check-label" for="2faSwitch">Enable 2-Factor Authentication</label>
    </div>
  </div>
  </div>



<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" placeholder="Enter new username">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Enter new email">
        </div>
        <div class="mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Bio</label>
          <textarea class="form-control" rows="3" placeholder="Tell us about yourself..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Profile Picture</label>
          <input type="file" class="form-control">
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>

    </form>
  </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Current Password</label>
          <input type="password" class="form-control" placeholder="Enter current password">
        </div>
        <div class="mb-3">
          <label class="form-label">New Password</label>
          <input type="password" class="form-control" placeholder="Enter new password">
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" placeholder="Confirm new password">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Password</button>
      </div>
      
    </form>
  </div>
</div>


<?php $this->sections["$this->currentSection"] = ob_get_clean();