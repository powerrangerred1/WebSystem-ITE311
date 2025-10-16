  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>My CI Project</title>
      <!-- Bootstrap CDN -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <style>
          body {
              background-color: #121212; /* TikTok dark background */
              font-family: "Poppins", sans-serif;
              color: #fff;
          }
          /* Navbar */
          .navbar {
              background-color: #000; /* TikTok black */
          }
          .navbar-brand {
              font-weight: bold;
              font-size: 1.3rem;
              color: #fff !important;
          }
          .nav-link {
              color: #fff !important;
              margin: 0 8px;
              transition: 0.3s ease;
          }
          .nav-link:hover {
              color: #ff0050 !important; /* TikTok red hover */
          }
          .nav-link.active {
              color: #00f2ea !important; /* TikTok aqua active */
              font-weight: bold;
          }

          /* Content box */
          .container {
              background: #1c1c1c;
              border-radius: 10px;
              padding: 20px;
              box-shadow: 0px 2px 6px rgba(0,0,0,0.6);
          }
      </style>
  </head>
  <body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= site_url('/') ?>">Learning Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == '' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>" href="<?= site_url('contact') ?>">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'announcements' ? 'active' : '' ?>" href="<?= site_url('announcements') ?>">Announcements</a>
          </li>
          <?php if (!session('isLoggedIn')): ?>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'login' ? 'active' : '' ?>" href="<?= site_url('login') ?>">Login</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Container -->
  <div class="container mt-4">
      <!-- Dynamic content will load here -->
      <?= $this->renderSection('content') ?>
  </div>

  </body>
  </html>
