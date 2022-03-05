<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('main-page/css/main.css') }}">
</head>

<body class="antialiased">
    <header id="home">
        <!-- navbar -->
        <nav id="nav">
            <div class="nav-center">
                <!-- nav header -->
                <div class="nav-header">
                    <img src="main-page/image/beard-ga7bd8baa5_640.png" class="logo" alt="logo" />
                    <button class="nav-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <!-- links -->
                <div class="links-container">
                    <ul class="links">
                        <li>
                            <a href="#home" class="scroll-link custom-link">home</a>
                        </li>
                        <li>
                            <a href="#about" class="scroll-link custom-link">about</a>
                        </li>
                        <li>
                            <a href="#services" class="scroll-link custom-link">services</a>
                        </li>
                        <li>
                            <a href="#services" class="scroll-link custom-link">Nay Ba La</a>
                        </li>
                        <li>
                            <a href="{{ route('user#logoutConfirm') }}" class="custom-link">
                                Logout
                            </a>
                        </li>
                        {{-- @if (Route::has('login'))
                            @auth
                                {{-- <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline custom-link">Dashboard</a> --}}

                    @endauth
                    @endif --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <h1>Test project</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas eos
                neque sunt in? Id, necessitatibus quos quisquam distinctio
                laudantium fugiat?
            </p>
            <a href="#about" class="scroll-link btn btn-white">Enjoy</a>
        </div>
    </div>
</header>
<!-- about -->
<section id="about" class="section">
    <div class="title mt-3">
        <h2>about <span>us</span></h2>
        <br><br><br>
        <!-- about Section -->
        <div class="container-fluid col-9 d-flex">
            <div class="row">
                <div class="col-md-6">
                    <span class="text-muted fst-italic">Services & Slaes</span>
                    <h2>We Provides</h2>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Cum deleniti ab nesciunt culpa in temporibus explicabo
                        minima nam aperiam est pariatur aliquid, exercitationem
                        impedit consequatur natus suscipit aut, dolores nulla.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Beatae quis magnam placeat, ab dolores dolore eligendi
                        quam explicabo ipsum debitis perspiciatis in sequi
                        aliquam. Eaque sed inventore natus voluptate ipsam.
                    </p>

                </div>
                <div class="col-md-6">
                    <img class="img-fluid rounded-2" src="main-page/image/gearIcon.gif" alt="">
                </div>
            </div>
        </div>
        <br>
        <br>
        <!-- about Section  End-->
    </div>

</section>
<!-- services -->

<section id="services" class="section">
    <div class="title">
        <br><br>
        <h2>our <span>services</span></h2>
        <!-- Service Section -->
        <div class="container-fluid col-9 d-flex">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <img class="img-fluid" src="main-page/image/computer_gif.gif" alt="">
                </div>
                <div class="col-md-6 mt-5">
                    <span class="text-muted fst-italic">Sales & Services</span>
                    <h2>We Will Give You</h2>
                    <p class="text-muted" data-aos="fade-up">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Cum deleniti ab nesciunt culpa in temporibus explicabo
                        minima nam aperiam est pariatur aliquid, exercitationem
                        impedit consequatur natus suscipit aut, dolores nulla.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Beatae quis magnam placeat, ab dolores dolore eligendi
                        quam explicabo ipsum debitis perspiciatis in sequi
                        aliquam. Eaque sed inventore natus voluptate ipsam.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <!-- Service Section  End-->
    </div>
</section>

<!-- footer -->
<footer class="section">
    <p>
        copyright &copy;
        <span id="date"></span>. all rights reserved
    </p>
</footer>
<a class="scroll-link top-link" href="#home">
    <i class="fas fa-arrow-up"></i>
</a>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('main-page/js/main.js') }}"></script>

</html>
