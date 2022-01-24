<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="{{ asset('customer/assets/favicon.ico') }}" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="{{ asset('customer/css/styles.css') }}" rel="stylesheet" />
<link href="{{ asset('customer/css/list.css') }}" rel="stylesheet" />

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Pizza Order System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item "><a class="nav-link text-primary">{{ Auth()->user()->name }}</a>
                    </li>
                    <li class="mt-1">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger" type="submit">Logout</button>
                        </form>
                    </li>
                    < </ul>
            </div>
        </div>
    </nav>
    <div class="row mt-1 d-flex justify-content-center">
        <div class="col-6 text-center">
            <img src="{{ asset('images/' . $detail->image) }}" class="img" width="60%"> <br>
            <div class="d-flex justify-content-between mt-3">
                <div>
                    <a href="{{ route('user#index') }}">
                        <button class="btn bg-dark text-white ms-1" style="">
                            <i class="fas fa-backspace"></i>
                            < Main Page </button>
                    </a>
                </div>
                <div>
                    <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Buy Or Add To Cart</button>
                </div>
            </div>


        </div>
        <div class="col-5 border border-danger rounded p-1">
            <div class="ms-3">
                <h5>Pizza Name</h5>
                <small>{{ $detail->pizza_name }}</small>
            </div>
            <hr>
            <div class="ms-3">
                <h5>Pizza Price</h5>
                <small>{{ $detail->price }} mmk</small>
            </div>
            <hr>
            <div class="ms-3">
                <h5>Discount Price</h5>
                <small>{{ $detail->discount_price }} mmk</small>
            </div>
            <hr>
            <div class="ms-3">
                <h5>Buy One Get One</h5>
                @if ($detail->buy_one_get_one_status == 1)
                    <small>{{ 'Yes' }}</small>
                @else
                    <small>{{ 'No' }}</small>
                @endif

            </div>
            <hr>
            <div class="ms-3">
                <h5>Waiting Time</h5>
                <small>{{ $detail->waiting_time }} minutes</small>
            </div>
            <hr>
            <div class="ms-3">
                <h5>Type Of Pizza</h5>
                @foreach ($category as $categoryItem)
                    @if ($detail->category_id == $categoryItem->category_id)
                        <small>{{ $categoryItem->category_name }}</small>
                    @endif
                @endforeach

            </div>
            <hr>
            <div class="ms-3">
                <h5>Description</h5>
                <small>{{ $detail->description }}</small>
            </div>
            <hr>
            <div class="ms-3 text-danger">
                <h5>Sub Total(Discount {{ $detail->discount_price }} mmk)</h5>
                <h3>{{ $detail->price - $detail->discount_price }} mmk</h3>
            </div>
        </div>
    </div>
    <hr>


</body>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('customer/js/scripts.js') }}"></script>

</html>
