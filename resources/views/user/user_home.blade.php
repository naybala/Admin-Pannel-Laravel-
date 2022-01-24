@extends('user.layout.appUser')
@section('content')
    <!-- Page Content-->
    <div class="container px-lg-5" id="home">
        @if (Session::has('sendSuccess'))
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                {{ Session::get('sendSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-2">
            <div class=" col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" id="code-lab-pizza"
                    src="https://images.pexels.com/photos/2741457/pexels-photo-2741457.jpeg?cs=srgb&dl=pexels-kei-photo-2741457.jpg&fm=jpg"
                    alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Bar Nyar Pizza</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it,
                    but it makes a great use of the standard Bootstrap core components. Feel free to use this template
                    for any project you want!</p>
                <a class="btn btn-primary" href="#!">Enjoy!</a>
            </div>
        </div>
        <hr>
        <!-- Content Row-->
        <div class="d-flex justify-content-around" id="pizza">
            <div class="col-3 me-5">
                <div class="">
                    <div class="py-2 text-center">
                        <form class="d-flex m-5" action="{{ route('user#allSearch') }}" method="GET">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="allSearch">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>

                        <div class="">
                            <a href="{{ route('user#allPizzaList') }}" style="text-decoration: none"
                                class="text-black">
                                <div class="m-2 p-2">All</div>
                            </a>
                            @foreach ($category as $item)
                                <a href="{{ route('user#categoryPizzaList', $item->category_id) }}"
                                    style="text-decoration: none" class="text-black">
                                    <div class="m-2 p-2">{{ $item->category_name }}</div>
                                </a>
                            @endforeach


                        </div>
                        <hr>
                        <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Start Date - End Date</h3>

                            <form>
                                <input type="date" name="" id="" class="form-control"> -
                                <input type="date" name="" id="" class="form-control">
                            </form>
                        </div>
                        <hr>
                        <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Min - Max Amount</h3>

                            <form action="{{ route('user#minMaxSearch') }}" method="GET">
                                @csrf
                                <input type="number" name="minSearch" class="form-control" placeholder="minimum price">
                                <br>
                                <input type="number" name="maxSearch" class="form-control" placeholder="maximun price">
                                <button class="btn btn-outline-dark mt-3" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="row gx-4 gx-lg-5" id="pizza">
                    @foreach ($pizza as $item)
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
    </div>
    <hr>
    <div class="text-center d-flex justify-content-center align-items-center" id="contact">
        <div class="col-4 border shadow-sm ps-5 pt-5 pe-5 pb-2 mb-5">
            <h3>Contact Us</h3>

            <form action="{{ route('user#sendContact') }}" class="my-4" method="post">
                @csrf
                <input type="text" name="name" id="" class="form-control my-3" placeholder="Name"
                    value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
                <input type="email" name="email" id="" class="form-control my-3" placeholder="Email"
                    value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
                <textarea class="form-control my-3" id="exampleFormControlTextarea1" rows="3" placeholder="Message"
                    name="message">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <p class="text-danger">{{ $errors->first('message') }}</p>
                @endif
                <button type="submit" class="btn btn-outline-dark">Send FeebBack</button>
            </form>
        </div>
    </div>
@endsection
