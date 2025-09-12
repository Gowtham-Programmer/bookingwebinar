<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <title>My Work</title>
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
        <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About Me</a></li>
        <li class="nav-item"><a href="{{ url('/work') }}" class="nav-link active">My Work</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact Me</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Work Section -->
<main class="container py-5">
  <div class="text-center mb-5">
    <h1 class="display-4">My <span class="text-primary">Work</span></h1>
    <p class="lead text-muted">Check out some of my projects...</p>
  </div>

  <div class="row g-4">
    <!-- Project 1 -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="{{ asset('img/projects/project1.jpg') }}" class="card-img-top" alt="Project 1">
        <div class="card-body text-center">
          <h5 class="card-title">Project 1</h5>
          <div class="d-flex justify-content-center gap-2">
            <!-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Live</a> -->
            <a href="https://github.com/Gowtham-Programmer/bookingwebinar.git" class="btn btn-outline-dark btn-sm"><i class="fab fa-github"></i> Code</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 2 -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="{{ asset('img/projects/project2.jpg') }}" class="card-img-top" alt="Project 2">
        <div class="card-body text-center">
          <h5 class="card-title">Project 2</h5>
          <div class="d-flex justify-content-center gap-2">
            <!-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Live</a> -->
            <a href="#" class="btn btn-outline-dark btn-sm"><i class="fab fa-github"></i> Code</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 3 -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="{{ asset('img/projects/project3.jpg') }}" class="card-img-top" alt="Project 3">
        <div class="card-body text-center">
          <h5 class="card-title">Project 3</h5>
          <div class="d-flex justify-content-center gap-2">
            <!-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Live</a> -->
            <a href="#" class="btn btn-outline-dark btn-sm"><i class="fab fa-github"></i> Code</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 4 -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="{{ asset('img/projects/project4.jpg') }}" class="card-img-top" alt="Project 4">
        <div class="card-body text-center">
          <h5 class="card-title">Project 4</h5>
          <div class="d-flex justify-content-center gap-2">
            <!-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Live</a> -->
            <a href="#" class="btn btn-outline-dark btn-sm"><i class="fab fa-github"></i> Code</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 5 -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="{{ asset('img/projects/project5.jpg') }}" class="card-img-top" alt="Project 5">
        <div class="card-body text-center">
          <h5 class="card-title">Project 5</h5>
          <div class="d-flex justify-content-center gap-2">
            <!-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> Live</a> -->
            <a href="#" class="btn btn-outline-dark btn-sm"><i class="fab fa-github"></i> Code</a>
          </div>
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
