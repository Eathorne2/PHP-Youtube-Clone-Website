<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up - YouTube Clone</title>
  <!-- Bootstrap CSS -->
  <link href="<?=BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="<?=BASE_URL?>/assets/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
    }
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    .youtube-header {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 25px;
    }
    .youtube-header i {
      color: red;
      font-size: 32px;
      margin-right: 10px;
    }
    .youtube-header span {
      font-size: 26px;
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>

<div class="form-container">
  <div class="youtube-header">
    <i class="fas fa-play-circle"></i>
    <span>YouTube Clone</span>
  </div>
  <h4 class="text-center mb-4">Create Your Account</h4>

  <form action="signup_handler.php" method="POST">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="mb-3">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" class="form-control" name="dob" id="dob" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label">Retype Password</label>
      <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="terms" required>
      <label class="form-check-label" for="terms">
        I agree to the <a href="<?=BASE_URL?>/terms">Terms</a> & <a href="<?=BASE_URL?>/privacy">Privacy Policy</a>
      </label>
    </div>

    <button type="submit" class="btn btn-danger w-100">
      <i class="fas fa-user-plus me-2"></i> Sign Up
    </button>

    <p class="text-center mt-3">
      Already have an account? <a href="<?=BASE_URL?>/login">Log In</a>
    </p>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="<?=BASE_URL?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
