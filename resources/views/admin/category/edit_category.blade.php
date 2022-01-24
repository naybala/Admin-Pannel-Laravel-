@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Edit Category</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('admin#updateCategory') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Category
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" value="{{ $edit->category_id }}" name="id">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name', $edit->category_name) }}"
                                                            placeholder="eg. Seafood Pizza..">
                                                        @if ($errors->has('name'))
                                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-5">
                                                    <div class="">
                                                        <a href="{{ route('admin#category') }}">
                                                            <button type="button" class="btn bg-dark text-white ms-2">Cancel
                                                                Opertaion</button>
                                                        </a>
                                                    </div>
                                                    <div class="ms-5">
                                                        <button type="submit" class="btn bg-dark text-white">Update
                                                            Something</button>
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
