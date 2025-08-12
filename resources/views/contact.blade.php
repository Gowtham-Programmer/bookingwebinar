<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <title>Contact</title>
</head>

<body>
  <header>
    <div class="menu-btn">
      <div class="btn-line half start"></div>
      <div class="btn-line"></div>
      <div class="btn-line half end"></div>
    </div>

    <nav class="menu">
      <div class="menu-brand">
        <div class="portrait"></div>
      </div>
      <ul class="menu-nav">
        <li class="nav-item">
          <a href="{{ url('/welcome') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="about.html" class="nav-link">About Me</a>
        </li>
        <li class="nav-item">
          <a href="work.html" class="nav-link">My Work</a>
        </li>
        <li class="nav-item">
          <a href="contact.html" class="nav-link active">Contact Me</a>
        </li>
      </ul>
    </nav>
  </header>

  <main id="contact">
    <h1 class="lg-heading">Contact <span class="text-secondary">Me</span></h1>
    <h2 class="sm-heading">This is how you can reach me.....</h2>

    <div class="boxes">
      <div>
        <span class="text-secondary">Phone:</span>
        <a href="#" id="showCallDialog" data-bs-toggle="modal" data-bs-target="#exampleModal">(+91) 6382788518</a>
      </div>


      <div>
        <span class="text-secondary">Address:</span> Ramamoorthinagar, Banglore

      </div>
    </div>
  </main>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: black">Phone Number</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="color: black">
          <h2>This feature will be available soon.</h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
          <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">call</button> -->
          <script>
            document.getElementById("callBtn").addEventListener("click", function () {
              fetch("{{ route('make-call') }}", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ to: "+916382788518" })
              })
                .then(async res => {
                  const text = await res.text(); // read raw response
                  try {
                    return JSON.parse(text); // try to parse JSON
                  } catch (e) {
                    throw new Error("Server did not return JSON. Response was: " + text);
                  }
                })
                .then(data => alert(data.success ? data.message : "Error: " + data.error))
                .catch(err => alert("Request failed: " + err.message));
            });
          </script>
        </div>
      </div>
    </div>
  </div>
  <footer id="main-footer">
    Copyright &copy; 2024
  </footer>
  <!-- Font awesome link -->
  <script src="https://kit.fontawesome.com/980a2af8f9.js" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>