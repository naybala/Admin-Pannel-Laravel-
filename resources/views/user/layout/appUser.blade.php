<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pizza Order System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('customer/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('customer/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/css/list.css') }}" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Pizza Order System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pizza">Pizza</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item "><a class="nav-link text-primary">{{ Auth()->user()->name }}</a>
                    </li>
                    <li class="mt-1">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <a href="#">
                                <i class="fab fa-facebook  text-danger">
                                    <small class="text-white">naybala@fb.com</small>
                                </i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#">
                                <i class="fab fa-instagram  text-danger">
                                    <small class="text-white">naybala@ig.com</small>
                                </i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#">
                                <i class="fab fa-twitter text-danger"><small
                                        class="text-white">naybala@tt.com</small></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <h5 class="mt-5 text-white text-center">@Copy Right 2021</h5>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Core theme JS-->
    <script src="{{ asset('customer/js/scripts.js') }}"></script>
</body>

</html>
