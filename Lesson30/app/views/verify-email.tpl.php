<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Email Verification - YouTube Clone</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f9f9f9;
    }
    .card {
      max-width: 450px;
      margin: 60px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .logo {
      font-size: 1.8rem;
      font-weight: bold;
      color: #dc3545;
    }
  </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="#">
      <i class="fas fa-play-circle"></i> YouTubeClone
    </a>
  </div>
</nav>

<!-- Main Content -->
<div class="card">
  <h4 class="mb-3 text-center">Verify Your Email</h4>
  <p class="text-muted text-center">We've sent a 6-digit code to your email. Please enter it below.</p>

  <form id="verifyForm">
    <div class="mb-3">
      <label class="form-label">Verification Code</label>
      <input type="text" class="form-control" required placeholder="Enter your code">
    </div>
    <button type="submit" class="btn btn-danger w-100">Verify Email</button>
  </form>

  <div class="text-center mt-3">
    <small class="text-muted">Didn't receive the code?</small><br/>
    <a href="#" class="text-danger">Resend Code</a>
  </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Script -->
<script>
  const verifyForm = document.getElementById('verifyForm');

  verifyForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Email verified successfully!');
    window.location.href = 'dashboard.html'; // Redirect to user dashboard
  });
</script>

</body>
</html>
