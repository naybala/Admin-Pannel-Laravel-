@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('errorOldPassword'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('errorOldPassword') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('errorNewPassword'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('errorNewPassword') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('errorNewPasswordLength'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('errorNewPasswordLength') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('oldAndNew'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('oldAndNew') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Change Password</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('admin#changePassword') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Old
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            value="{{ old('oldPassword') }}" name="oldPassword">
                                                        @if ($errors->has('oldPassword'))
                                                            <p class="text-danger">{{ $errors->first('oldPassword') }}
                                                            </p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control" value="{{ $userId }}"
                                                        name="id">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" value=""
                                                            name="newPassword">
                                                        @if ($errors->has('newPassword'))
                                                            <p class="text-danger">{{ $errors->first('newPassword') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Confirm New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" value=""
                                                            name="confirmNewPassword">
                                                        @if ($errors->has('confirmNewPassword'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('confirmNewPassword') }}</p>
                                                        @endif

                                                    </div>
                                                </div>


                                                <div class="form-group row d-flex justify-content-between mt-4">
                                                    <div class="col-auto ms-5">
                                                        <a href="{{ route('admin#profile') }}">
                                                            <button type="button"
                                                                class="btn bg-dark text-white float-right">Cancel
                                                                Opertaion</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit"
                                                            class="btn bg-dark text-white float-right">Update
                                                            Password</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
