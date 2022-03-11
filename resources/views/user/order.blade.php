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
                    <label for="inputName" class="col-sm-2 col-form-label ms-2">Name
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control ms-2" value="" placeholder="Nay Ba La">
                    </div>
                    <label for="inputName" class="col-sm-2 col-form-label ms-2">Email
                    </label>
                    <div class="col-sm-10">
                        <input type="email" name="name" class="form-control ms-2" value="" placeholder="user@gmail.com">
                    </div>
                    <label for="inputName" class="col-sm-6 col-form-label ms-2">Phone Number
                    </label>
                    <div class="col-sm-10">
                        <input type="number" name="name" class="form-control ms-2" value="" placeholder="09763684400">
                    </div>
                    <label for="inputName" class="col-sm-6 col-form-label ms-2">Address
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control mb-2 ms-2" value="" placeholder="Zalun">
                    </div>
                    <div class="form-check mb-3 ms-2">
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
                            <img class="img-fluid" src="{{ asset('main-page/image/gearIcon.gif') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>Name - </p>
                            <p>Number of Pizza -</p>
                            <p>Waiting Time - </p>
                            <p>Total mmk - </p>
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
                    <div class="row ">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 border rounded p-2 text-center">
                            <h5 class="text-primary">Transfer Admin Phone Number List</h5>
                            <p class="text-danger">KBZ Pay Number - 09763684400</p>
                            <p class="text-danger">Aya Pay Number - 09763684400</p>
                            <p class="text-danger">Wave Pay Number - 09763684400</p>
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
    <script src="{{ asset('customer/js/orderConfirm.js') }}"></script>
@endsection
