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
                    <img src="{{ asset('main-page/image/step-2.png') }}" class="logo" alt="logo" />
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
                            <a href="#about" class="scroll-link custom-link">Category</a>
                        </li>
                        <li>
                            <a href="#services" class="scroll-link custom-link">Product</a>
                        </li>
                        <li>
                            <a href="" class="scroll-link custom-link">{{ Auth()->user()->name }}</a>
                        </li>
                        <li>
                            <a href="{{ route('user#logoutConfirm') }}" class="custom-link">
                                Logout
                            </a>
                        </li>
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
    {{-- Category Section --}}
    <br><br>
    <section id="about" class="section">
        <div class="title mt-3">
            <h2>Categories <span>Type</span></h2>
            <br><br>
            <!-- Category Section -->
            <div class="container-fluid col-9">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid rounded-2" src="{{ asset('main-page/image/pizza.gif') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted fst-italic">Services & Slaes</span>
                        <h2>Caegories Type</h2>
                        <div class="container mb-5">
                            @foreach ($category as $item)
                                <a href="" class="fs-4 text-black">
                                    <span>- {{ $item->category_name }}</span>
                                </a>
                                <br>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            <br>
            <hr>
            <!-- Category Section  End-->
        </div>
    </section>

    {{-- Product Section --}}
    <section id="services" class="section">
        <div class="title">
            <h2>Products <span>Here!</span></h2>
            <br>
            <!-- Product Section -->
            <div class="container-fluid col-9">


                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-md-6  mb-3">
                            <div class="card shadow border border-0">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}"
                                            alt="">
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <span class="fs-5">Name - {{ $item->pizza_name }}</span>
                                        <br>
                                        <span class="text-danger">Price - {{ $item->price }} mmk</span>
                                        <br>
                                        <span class="text-success">Category - {{ $item->category_name }}</span>
                                        <p class="text-muted text-break word-wrap">
                                            Description - {{ $item->description }}
                                        </p>
                                        <br>
                                        <div class="d-flex justify-content-around">
                                            <button class="btn-xs btn-primary rounded p-1">View Details</button>
                                            <button class="btn-xs btn-primary rounded p-1">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach

                </div>
                <br>

            </div>
            <br>
            <br>
            <!-- Product Section  End-->
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
