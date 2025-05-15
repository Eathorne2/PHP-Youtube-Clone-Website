<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - YouTube Clone</title>

  <!-- Bootstrap CSS -->
  <link href="<?=BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link href="<?=BASE_URL?>/assets/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f9f9f9;
      overflow-x: hidden;
    }
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .categories-bar {
      overflow-x: auto;
      white-space: nowrap;
      background: #fff;
      padding: 10px 0;
      margin-bottom: 15px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .categories-bar button {
      margin: 0 8px;
      white-space: nowrap;
    }
    .sidebar {
      height: 100vh;
      background-color: #fff;
      border-right: 1px solid #ddd;
      padding-top: 20px;
      position: fixed;
      width: 220px;
      overflow-y: auto;
    }
    .sidebar a {
      display: block;
      padding: 10px 20px;
      color: #333;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #f1f1f1;
    }
    .video-card {
      margin-bottom: 20px;
    }
    .video-thumbnail {
      width: 100%;
      border-radius: 8px;
      height: 200px;
      object-fit: cover;
    }
    .video-info {
      margin-top: 10px;
      display: flex;
    }
    .channel-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }
    .video-title {
      font-size: 1rem;
      font-weight: 600;
      margin-bottom: 5px;
    }
    .video-meta {
      color: #606060;
      font-size: 0.85rem;
    }
    .content {
      margin-left: 230px;
    }
  </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand text-danger fw-bold" href="#">
      <i class="fas fa-play-circle"></i> YouTubeClone
    </a>

    <form class="d-flex mx-auto" style="width: 500px;">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
    </form>

    <div class="d-flex align-items-center">
      <button class="btn btn-light me-3 position-relative">
        <i class="fas fa-bell"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          3
        </span>
      </button>
      <img src="https://placehold.co/40" class="rounded-circle" alt="Profile" />
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div class="sidebar pt-5">
  <a href="#"><i class="fas fa-home me-2"></i> Home</a>
  <a href="#"><i class="fas fa-history me-2"></i> Watch History</a>
  <a href="#"><i class="fas fa-video me-2"></i> Your Videos</a>
  <a href="#"><i class="fas fa-cog me-2"></i> Settings</a>

  <hr>

  <h6 class="px-3 text-muted">Subscriptions</h6>
  <a href="#"><i class="fas fa-user-circle me-2"></i> TechMaster</a>
  <a href="#"><i class="fas fa-user-circle me-2"></i> GamerPro</a>
  <a href="#"><i class="fas fa-user-circle me-2"></i> DailyNews</a>
  <a href="#"><i class="fas fa-user-circle me-2"></i> MovieWorld</a>
</div>

<!-- Main Content -->
<div class="content pt-5">
  
  <!-- Categories Bar -->
  <div class="categories-bar d-flex px-3 mt-2">
    <button class="btn btn-sm btn-dark">All</button>
    <button class="btn btn-sm btn-outline-secondary">Music</button>
    <button class="btn btn-sm btn-outline-secondary">Gaming</button>
    <button class="btn btn-sm btn-outline-secondary">News</button>
    <button class="btn btn-sm btn-outline-secondary">Movies</button>
    <button class="btn btn-sm btn-outline-secondary">Sports</button>
    <button class="btn btn-sm btn-outline-secondary">Technology</button>
    <button class="btn btn-sm btn-outline-secondary">Education</button>
    <button class="btn btn-sm btn-outline-secondary">Fashion</button>
  </div>

  <!-- Video Grid -->
  <div class="container">
    <div class="row">
      <!-- Video Card -->
      <div class="col-md-4">
        <div class="video-card">
          <img src="https://placehold.co/350x200" alt="Video" class="video-thumbnail d-block border">
          <div class="video-info mt-2">
            <img src="https://placehold.co/40" alt="" class="channel-avatar">
            <div>
              <div class="video-title">Top 10 Beaches in the World</div>
              <div class="video-meta">TravelChannel • 1.5M views • 3 days ago</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card -->
      <div class="col-md-4">
        <div class="video-card">
          <img src="https://placehold.co/350x200" alt="Video" class="video-thumbnail d-block border">
          <div class="video-info mt-2">
            <img src="https://placehold.co/40" alt="" class="channel-avatar">
            <div>
              <div class="video-title">Best Programming Languages in 2025</div>
              <div class="video-meta">CodeMaster • 800K views • 2 weeks ago</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card -->
      <div class="col-md-4">
        <div class="video-card">
          <img src="https://placehold.co/350x200" alt="Video" class="video-thumbnail d-block border">
          <div class="video-info mt-2">
            <img src="https://placehold.co/40" alt="" class="channel-avatar">
            <div>
              <div class="video-title">New iPhone 15 Review - Worth It?</div>
              <div class="video-meta">TechTalks • 2M views • 1 week ago</div>
            </div>
          </div>
        </div>
      </div>

      <!-- More videos... -->

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="<?=BASE_URL?>/assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
