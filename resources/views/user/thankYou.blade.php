@extends('user.layout.appUser')

@section('content')
    <div class="jumbotron text-center bg-light">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Your Order is Loading...</strong> for further instructions</p>
        <hr>
        <p>
            Having trouble? <a href="#">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm mb-5" href="{{ route('user#index') }}" type="button">Continue to homepage</a>
        </p>
    </div>
@endsection
