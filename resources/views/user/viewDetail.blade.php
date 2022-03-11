@extends('user.layout.appUser')
@section('content')
    <h5 class="text-primary fs-3 text-center mt-3">
        Product Details</h5>
    <br>
    <div class="container-fluid col-9">
        <div class="card shadow">
            <div class="row p-2">
                <div class="col-md-5 ms-2 p-3">
                    <p class="d-inline text-primary">Name -
                    <p class="d-inline text-danger">{{ $productDetail->pizza_name }}</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Price -
                    <p class="d-inline text-danger">{{ $productDetail->price }} mmk</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Caetgory -
                    <p class="d-inline text-danger">{{ $productDetail->category_name }}</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Discount -
                    <p class="d-inline text-danger">{{ $productDetail->discount_price }} mmk</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Buy 1 Get 1 - @if ($productDetail->buy_one_get_one_status == 1)
                            <p class="text-danger d-inline">Have Promo</p>
                        @else
                            No Promo
                        @endif
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Waiting Time -
                    <p class="d-inline text-danger">{{ $productDetail->waiting_time }} minutes per Pizza</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Description -
                    <p class="d-inline text-danger">{{ $productDetail->description }} Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Neque hic modi quos corporis, quo, laudantium atque accusamus quae
                        voluptates cupiditate eum aut voluptate provident doloribus, quod cum nobis in eos.</p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">Sub Total -
                    <p class="d-inline text-danger" id="allTotal">
                        {{ $productDetail->price - $productDetail->discount_price }}
                    <p class="d-inline text-danger"> mmk per one Pizza</p>
                    </p>
                    <hr>

                    <p class="d-inline text-primary">Amount -
                    <div class="container d-inline">
                        <form action="{{ route('user#orderStore', $productDetail->pizza_id) }}" method="post"
                            class="d-inline">
                            @csrf
                            <button class="btn-sm btn-danger btnCon decrease" type="button">-</button>
                            <span id="value" class="fs-5 p-3 text-primary">1</span>
                            <input id="value1" name="value1" value="1" type="hidden">
                            <button class="btn-sm btn-danger btnCon increase" type="button">+</button>
                    </div>
                    </p>
                    </p>
                    <hr>
                    <p class="d-inline text-primary">All Total -
                    <p class="d-inline text-danger" id="finalTotal">
                    <p class="d-inline text-danger"> mmk</p>
                    </p>
                    </p>
                </div>
                <div class="col-md-6 mt-5 ms-3">
                    @if ($productDetail->buy_one_get_one_status == 1)
                        <p class="text-white bg-dark d-inline rounded p-1 position-absolute right-9">Buy 1 Get 1</p>
                    @else
                        <p class="text-white bg-dark d-inline rounded p-1 position-absolute right-9">No Promo</p>
                    @endif
                    <img class="img-fluid rounded" src="{{ asset('images/' . $productDetail->image) }}" alt="">
                    <br><br>
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('user#index') }}">
                            <button class="btn btn-primary" type="button">
                                < Back To Main </button>
                        </a>
                        <button class="btn btn-primary">
                            Order Now
                        </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <h5 class="text-primary fs-3 text-center mt-3">Related Products</h5>
    <br>
    {{-- <div class="container-fluid col-9">
        <h5>Hello</h5>
    </div>
    <hr> --}}
    <script src="{{ asset('customer/js/viewDetail.js') }}"></script>
@endsection
