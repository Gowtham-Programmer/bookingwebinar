<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <title>About Me</title>
</head>

<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ url('/') }}">Gowtham</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link active">About Me</a></li>
          <li class="nav-item"><a href="{{ url('/work') }}" class="nav-link">My Work</a></li>
          <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact Me</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- About Section -->
  <main class="container py-5">
    <div class="text-center mb-5">
      <h1 class="display-4">About <span class="text-primary">Me</span></h1>
      <p class="lead text-muted">Let me tell you a few things...</p>
    </div>

    <!-- Bio Row -->
    <div class="row align-items-center mb-5">
      <div class="col-md-4 text-center">
        <img src="{{ asset('uploads/img/welcome.jpeg') }}" alt="bio-image" class="img-fluid rounded-circle shadow"
          width="300" height="250">
      </div>
      <div class="col-md-8">
        <h2 class="text-primary">BIO</h2>
        <p>
          ✨ About You (Professional Summary)
          You are Gowtham R, a PHP Developer with 2 years of experience, currently based in Bengaluru.
          Your core expertise lies in Laravel, Symfony, WordPress, and MySQL, where you have built and maintained
          applications across e-commerce, CRM, and business dashboards.

          You have:

          Hands-on experience with REST API development, database optimization, and performance tuning.

          Worked on 5+ client projects, including maintenance and feature development.

          Improved application performance, for example by reducing data processing time by 35% in a Laravel module and
          boosting a WordPress site’s Lighthouse score from 60 → 90+.

          Knowledge of tools like GitHub/GitLab, Postman, VS Code, and Jira, with Agile/Scrum experience.
        </p>
      </div>
    </div>

    <!-- Experience Cards -->
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <h5 class="card-title">Mysql</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id iusto
              corporis repellat sit, labore iste natus maiores quibusdam unde distinctio.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <h5 class="card-title">Wordpress Developer at Zibtek</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id iusto
              corporis repellat sit, labore iste natus maiores quibusdam unde distinctio.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <h5 class="card-title">PHP Developer at Zibtek</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id iusto
              corporis repellat sit, labore iste natus maiores quibusdam unde distinctio.
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; 2025 Gowtham's Portfolio. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>