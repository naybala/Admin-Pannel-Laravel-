@extends('user.layout.appUser')
@section('content')
    <h5 class="text-primary fs-3 text-center mt-3">Product Details</h5>
    <br>
    <div class="container-fluid col-9">
        <div class="card shadow">
            <div class="row p-2">
                <div class="col-md-5 ms-2 p-3">
                    <p>Name</p>
                    <hr>
                    <p>Price</p>
                    <hr>
                    <p>Caetgory</p>
                    <hr>
                    <p>Discount</p>
                    <hr>
                    <p>Buy 1 Get 1</p>
                    <hr>
                    <p>Waiting Time</p>
                    <hr>
                    <p>Description</p>
                    <hr>
                    <p>Amount</p>
                    <hr>
                    <p>Sub Total</p>
                    <hr>
                    <p>All Total</p>
                </div>
                <div class="col-md-6 mt-5 ms-3">
                    <img class="img-fluid" src="{{ asset('main-page/image/computer_gif.gif') }}" alt="">
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-primary">
                            < Back To Main</button>
                                <button class="btn btn-primary">Order Now</button>
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
@endsection
