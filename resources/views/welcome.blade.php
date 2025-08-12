<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Ayush's Portfolio</title>
</head>

<body id="bg-img">
    <header>
        <div class="menu-btn">
            <div class="btn-line half start"></div>
            <div class="btn-line"></div>
            <div class="btn-line half end"></div>
        </div>

        <nav class="menu">
            <!-- <div class="menu-brand">
                    <div class="portrait"></div>
                </div> -->
            <div class="menu-brand">
                <div class="portrait" style=" background-image: url('/uploads/img/portarait.jpg'); 
                        width: 300px;
                        height: 300px;
                        background-size: cover;
                        background-position: center;
                        border-radius: 50%;
                "></div>
            </div>
            <ul class="menu-nav">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/about')}}" class="nav-link active">About Me</a>
                </li>
                <li class="nav-item">
                    <a href="work.html" class="nav-link">My Work</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/contact')}}" class="nav-link">Contact Me</a>
                </li>
            </ul>
        </nav>
    </header>

    <main id="home">
        <h1 class="lg-heading">
            Gowtham <span class="text-secondary">Ramesh</span>
        </h1>
        <h2 class="sm-heading">Programmer, Web Developer & Web Content Writer</h2>

        <div class="icons">
            <a href="#"><i class="fab fa-github fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
        </div>
         <!-- Login Button -->
    <div class="auth-section mt-3">
    <a href="/login" class="btn btn-primary">Login</a>
    <p class="mt-2">Not registered? <a href="/register" class="text-decoration-none">Click here to register</a></p>
</div>
    </main>

    <!-- Font awesome link -->
    <script src="https://kit.fontawesome.com/980a2af8f9.js" crossorigin="anonymous"></script>

    <!-- Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>