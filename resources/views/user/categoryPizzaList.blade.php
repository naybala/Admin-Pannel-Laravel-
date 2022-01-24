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
    <div class="container">
        <div class="mt-5">
            @foreach ($category as $categoryItem)
                @if ($id == $categoryItem->category_id)
                    <h3>{{ $categoryItem->category_name }} List</h3>
                @endif
            @endforeach
            <div class="row gx-4 gx-lg-5" id="pizza">
                @if ($countData == 0)
                    <h5 class="mt-3 text-danger ">There is No Data........................Cause Admin Team Have not This
                        Type Of Pizza</h5>
                @endif
                @foreach ($categoryPizza as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-lg">
                            <!-- Sale badge-->
                            @if ($item->buy_one_get_one_status != 0)
                                <div class="badge bg-dark text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">
                                    Buy 1 Get 1</div>
                            @endif
                            <!-- Product image-->
                            <img src="{{ asset('images/' . $item->image) }}" class=" img" id="pizza-image "
                                width="100%" height="60%">
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->pizza_name }}</h5>
                                    <!-- Product price-->
                                    <span class="text-muted">{{ $item->price }} mmk</span>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('user#detail', $item->pizza_id) }}">View
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <h4>Related Products</h4>
        <div class="mt-5">
            <div class="row gx-4 gx-lg-5" id="pizza">
                @foreach ($relatedProduct as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-lg">
                            <!-- Sale badge-->
                            @if ($item->buy_one_get_one_status != 0)
                                <div class="badge bg-dark text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">
                                    Buy 1 Get 1</div>
                            @endif
                            <!-- Product image-->
                            <img src="{{ asset('images/' . $item->image) }}" class=" img" id="pizza-image "
                                width="100%" height="60%">
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->pizza_name }}</h5>
                                    <!-- Product price-->
                                    <span class="text-muted">{{ $item->price }} mmk</span>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('user#detail', $item->pizza_id) }}">View
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('customer/js/scripts.js') }}"></script>

</html>
