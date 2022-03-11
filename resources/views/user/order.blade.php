@extends('user.layout.appUser')
<link rel="stylesheet" href="{{ asset('customer/css/orderConfirm.css') }}">
@section('content')
    <div class="jumbotron text-center bg-light">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Please check your email or phone number</strong> for further instructions on how to
            complete your
            account setup.</p>
        <hr>
        <p>
            Having trouble? <a href="#">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm mb-5" href="{{ route('user#index') }}" type="button">Continue to homepage</a>
        </p>
    </div>

    <h5 class="text-primary fs-3 text-center mt-3">
        Order Details</h5>
    <br>
    <div class="container-fluid col-9">
        <div class="card shadow">
            <div class="row p-2">
                <div class="col-md-5 ms-2">
                    <h5 class="text-primary"> Your Information</h5>
                    <label for="inputName" class="col-sm-2 col-form-label">Name
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value=""
                            placeholder="{{ Auth()->user()->name }}">
                    </div>
                    <label for="inputName" class="col-sm-2 col-form-label">Email
                    </label>
                    <div class="col-sm-10">
                        <input type="email" name="name" class="form-control" value=""
                            placeholder="{{ Auth()->user()->email }}">
                    </div>
                    <label for="inputName" class="col-sm-6 col-form-label">Phone Number
                    </label>
                    <div class="col-sm-10">
                        <input type="number" name="name" class="form-control" value=""
                            placeholder="{{ Auth()->user()->phone }}">
                    </div>
                    <label for="inputName" class="col-sm-6 col-form-label">Address
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control mb-2" value=""
                            placeholder="{{ Auth()->user()->address }}">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label" for="flexCheckChecked">
                            Shipping Address as the same billing address
                        </label>
                    </div>
                </div>
                <br><br>
                <div class="col-md-5 ms-3">
                    <h5 class="text-primary "> Order Pizza Details</h5>
                    <br>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <img class="img-fluid" src="{{ asset('images/' . $data->image) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p class="d-inline">Name -
                            <p class="d-inline text-danger">{{ $data->pizza_name }}</p>
                            </p>
                            <p class="d-inline">amount
                            <p class="d-inline text-danger">{{ $amount }}
                                <i class="fa-solid fa-pizza-slice"></i>
                                @if ($data->buy_one_get_one_status == 1)
                                    + {{ $amount }} <i class="fa-solid fa-pizza-slice"></i> (promo)
                                @else
                                @endif
                            </p>
                            </p>
                            <p class="d-inline">Waiting Time -
                            <p class="d-inline text-danger"> {{ $data->waiting_time * $amount }} min <i
                                    class="fa-solid fa-clock"></i></p>
                            </p>
                            <p class="d-inline">Total mmk -
                            <p class="d-inline text-danger">3000 mmk</p>
                            </p>
                        </div>
                    </div>
                    <p class="text-danger fs-5 mt-3">Choose Payment Type</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Cash On Deliver</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Visa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio3" value="option3">
                        <label class="form-check-label" for="inlineRadio2">Online Payment</label>
                    </div>
                </div>
                <div class="payment2 px-5 mb-2">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Card Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="cardName">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Card Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="cardNumber">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="expiration">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name='CVV'>
                        </div>
                    </div>
                </div>
                <div class="payment3 px-5 mb-2">
                    <div class="container col-md-6 mt-3">
                        <div class="row ">
                            <div class="col-md-12 border rounded p-2 text-center">
                                <h5 class="text-primary">Transfer Admin Phone Number List</h5>
                                <p class="text-danger">KBZ Pay Number - 09763684400</p>
                                <p class="text-danger">Aya Pay Number - 09763684400</p>
                                <p class="text-danger">Wave Pay Number - 09763684400</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-4 me-5 px-5 mb-3">
                <button class="btn btn-primary" type="button">Submit</button>
            </div>
        </div>
    </div>
    <hr>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="{{ asset('customer/js/orderConfirm.js') }}"></script>
@endsection
