<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{$title}}</title>
  <!-- Bootstrap CSS -->
  <link href="<?=BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link href="<?=BASE_URL?>/assets/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f9f9f9;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      width: 240px;
      top: 0;
      left: 0;
      background-color: #fff;
      border-right: 1px solid #ddd;
      padding-top: 60px;
    }
    .sidebar a {
      display: block;
      padding: 15px 20px;
      color: #333;
      text-decoration: none;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background-color: #f1f1f1;
      font-weight: bold;
    }
    .main-content {
      margin-left: 240px;
      padding: 30px;
    }
    .navbar-brand i {
      color: red;
      margin-right: 8px;
    }
    .top-nav {
      position: fixed;
      width: 100%;
      z-index: 999;
    }
    .content-card {
      max-width: 1000px;
      margin: auto;
    }
    .card{
      margin: 10px;
      vertical-align: top;
      min-width: 300px;
    }
  </style>
</head>
<body>

  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm top-nav">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <i class="fas fa-play-circle fa-lg"></i> <strong>YouTube Clone</strong>
      </a>
      <span class="ms-auto me-3">Welcome, <strong>{{$user->first_name}} {{$user->last_name}}</strong></span>
      <a href="logout.html" class="btn btn-sm btn-outline-danger me-3">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#" class="text-center">
      <img src="https://placehold.co/150" class="img-thumbnail rounded-circle m-2" >
      <div class="text-muted">Your Channel</div>
      <small>Channel Name</small>
    </a>
    <?php $subpage = $URL[1] ?? ''?>
    <div style="overflow-y: scroll;max-height: 50vh;">
      <a href="<?=BASE_URL?>/admin" class="<?=$subpage == '' ? 'active':''?>"><i class="fas fa-home me-2"></i> Dashboard</a>
      <a href="<?=BASE_URL?>/admin/upload-video" class="<?=$subpage == 'upload-video' ? 'active':''?>" ><i class="fas fa-upload me-2"></i> Upload Video</a>
      <a href="<?=BASE_URL?>/admin/my-videos" class="<?=$subpage == 'my-videos' ? 'active':''?>" ><i class="fas fa-film me-2"></i> My Videos</a>
      <a href="<?=BASE_URL?>/admin/analytics/" class="<?=$subpage == 'analytics' ? 'active':''?>" ><i class="fas fa-chart-bar me-2"></i> Analytics</a>
      <a href="<?=BASE_URL?>/admin/my-channels" class="<?=$subpage == 'my-channel' ? 'active':''?>" ><i class="fas fa-tv me-2"></i> My Channels</a>
      <a href="<?=BASE_URL?>/admin/profile" class="<?=$subpage == 'profile' ? 'active':''?>" ><i class="fas fa-user me-2"></i> Profile</a>
      <a href="<?=BASE_URL?>/admin/settings" class="<?=$subpage == 'settings' ? 'active':''?>" ><i class="fas fa-cog me-2"></i> Settings</a>

      <hr>
      <h6 class="text-muted px-3">Subscriptions</h6>
      <a href="#"><i class="fas fa-user-circle me-2"></i> Channel 1</a>
      <a href="#"><i class="fas fa-user-circle me-2"></i> Channel 2</a>
      <a href="#"><i class="fas fa-user-circle me-2"></i> Channel 3</a>

    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="content-card mt-5">

      @yield('main-content')

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?=BASE_URL?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
