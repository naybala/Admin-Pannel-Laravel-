@extends('user.layout.appUser')
@section('content')
    <div class="container-fluid col-md-9 mt-5">
        <h2>Caegories Type - {{ $categoryType->category_name }}</h2>
        <h2>Pizza List</h2>
        <div class="row">
            @if ($countData == 0)
                <h5 class="text-danger text-center fs-3">There is no data</h5>
            @else
                @foreach ($categoryPizza as $item)
                    <div class="col-md-6  mb-3">
                        <div class="card shadow border border-0">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    @if ($item->buy_one_get_one_status == 1)
                                        <p class="text-white bg-dark d-inline rounded p-1">Buy 1 Get 1</p>
                                    @else
                                        <p class="text-white bg-dark d-inline rounded p-1">No Promo</p>
                                    @endif
                                    <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                                </div>
                                <div class="col-md-6">
                                    <span class="fs-5">Name - {{ $item->pizza_name }}</span>
                                    <br>
                                    <span class="text-danger">Price - {{ $item->price }} mmk</span>
                                    <br>
                                    <span class="text-success">Category - {{ $categoryType->category_name }}</span>
                                    <p class="text-muted text-break word-wrap">
                                        Description - {{ $item->description }}
                                    </p>
                                    <br>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('user#productDetail', $item->pizza_id) }}"><button
                                                class="btn-xs btn-primary rounded p-1">View Details
                                            </button>
                                        </a>
                                        <button class="btn-xs btn-primary rounded p-1">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
        <br>
        <hr>
        <br>
        <br>
        {{-- @if ($countData == 0)
            <h5 class="text-danger">there is no data</h5>
        @else
            @foreach ($categoryPizza as $item)
                <div class="card shadow  border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid rounded-2" src="{{ asset('images/' . $item->image) }}" alt="" style="">
                        </div>
                        <div class="col-md-4">
                            <a href="" class="fs-5 text-decoration-none text-success">
                                <span>Name - {{ $item->pizza_name }}</span>
                            </a>
                        </div>
            @endforeach
        @endif --}}
    </div>
    <div class="container-fluid col-md-9">
        <h2>Related Products</h2>
        <div class="row">
            @foreach ($relatedProduct as $item)
                <div class="col-md-6  mb-3">
                    <div class="card shadow border border-0">
                        <div class="row p-2">
                            <div class="col-md-6">
                                @if ($item->buy_one_get_one_status == 1)
                                    <p class="text-white bg-dark d-inline rounded p-1">Buy 1 Get 1</p>
                                @else
                                    <p class="text-white bg-dark d-inline rounded p-1">No Promo</p>
                                @endif
                                <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                            </div>
                            <div class="col-md-6">
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
                                    <a href="{{ route('user#productDetail', $item->pizza_id) }}"><button
                                            class="btn-xs btn-primary rounded p-1">View Details
                                        </button>
                                    </a>
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
        <hr>
        <br>
        <br>
    </div>
@endsection
