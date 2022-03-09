@extends('user.layout.appUser')
@section('content')
    <div class="container-fluid col-md-9 mt-5">
        <h2>Search Data</h2>
        <div class="row">
            @if ($countData == 0)
                <h5 class="text-danger text-center fs-3">There is no data</h5>
            @else
                @foreach ($pizza as $item)
                    <div class="col-md-6  mb-3">
                        <div class="card shadow border border-0">
                            <div class="row p-2">
                                <div class="col-md-6">
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
                                        <button class="btn-xs btn-primary rounded p-1">View Details</button>
                                        <button class="btn-xs btn-primary rounded p-1">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
            <div class="mt-3 ms-2">
                {{ $pizza->links() }}
            </div>
        </div>
        <br>
        <hr>
        <br>
        <br>
    </div>
    <div class="container-fluid col-md-9">
        <h2>Related Products</h2>
        <div class="row">
            @foreach ($relatedProduct as $item)
                <div class="col-md-6  mb-3">
                    <div class="card shadow border border-0">
                        <div class="row p-2">
                            <div class="col-md-6">
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
        <hr>
        <br>
        <br>
    </div>
@endsection
