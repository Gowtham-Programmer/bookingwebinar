<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <title>Contact</title>
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
        <li class="nav-item"><a href="{{ url('/work') }}" class="nav-link">My Work</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link active">Contact Me</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contact Section -->
<main class="container py-5">
  <div class="text-center mb-5">
    <h1 class="display-4">Contact <span class="text-primary">Me</span></h1>
    <p class="lead text-muted">This is how you can reach me...</p>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Phone -->
    <div class="col-md-5">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center">
          <i class="fas fa-phone fa-2x text-primary mb-3"></i>
          <h5 class="card-title">Phone</h5>
          <a href="#" id="showCallDialog" data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-block mt-2">
            (+91) 6382788518
          </a>
        </div>
      </div>
    </div>

    <!-- Address -->
    <div class="col-md-5">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center">
          <i class="fas fa-map-marker-alt fa-2x text-danger mb-3"></i>
          <h5 class="card-title">Address</h5>
          <p class="card-text">Ramamoorthinagar, Bangalore</p>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Phone Number</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark text-center">
        <h4>This feature will be available soon.</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Future call button -->
        <!-- <button type="button" id="callBtn" class="btn btn-primary">Call</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <p class="mb-0">&copy; 2025 Gowtham's Portfolio. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Call Button Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const callBtn = document.getElementById("callBtn");
    if (callBtn) {
      callBtn.addEventListener("click", function () {
        fetch("{{ route('make-call') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ to: "+916382788518" })
        })
          .then(async res => {
            const text = await res.text();
            try {
              return JSON.parse(text);
            } catch (e) {
              throw new Error("Server did not return JSON. Response was: " + text);
            }
          })
          .then(data => alert(data.success ? data.message : "Error: " + data.error))
          .catch(err => alert("Request failed: " + err.message));
      });
    }
  });
</script>
</body>
</html>
