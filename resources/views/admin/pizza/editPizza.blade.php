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
                                    <legend class="text-center">Edit Pizza Info</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('admin#updatePizza', $editPizza->pizza_id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">

                                                    {{-- name ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Name
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name', $editPizza->pizza_name) }}">
                                                        @if ($errors->has('name'))
                                                            <p class="text-danger">{{ $errors->first('name') }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                    {{-- image ----------------------------------------- --}}
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label mt-4">Image</label>
                                                    <div class="col-sm-10 mb-4 border border-dark rounded p-2">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <img src="{{ asset('images/' . $editPizza->image) }}"
                                                                    class="img-thumbnail" width="100px">
                                                            </div>
                                                            <div class="col-9 mt-4">
                                                                <input type="file" name="image" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- price ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Price
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="price" class="form-control"
                                                            value="{{ old('price', $editPizza->price) }}">
                                                        @if ($errors->has('price'))
                                                            <p class="text-danger">{{ $errors->first('price') }}</p>
                                                        @endif
                                                    </div>

                                                    {{-- publish ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Publish
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="publish">
                                                            <option selected>Open this select menu</option>
                                                            @if ($editPizza->publish_status == 0)
                                                                <option value=" 1">Publish </option>
                                                                <option value="0" selected>Unpublish</option>
                                                            @else
                                                                <option value=" 1" selected>Publish </option>
                                                                <option value="0">Unpublish</option>
                                                            @endif


                                                        </select>
                                                        @if ($errors->has('publish'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('publish') }}</p>
                                                        @endif
                                                    </div>

                                                    {{-- Category ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Category
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name='category'>
                                                            <option value="{{ $editPizza->category_id }}">
                                                                {{ $editPizza->category_name }}</option>
                                                            @foreach ($category as $item)
                                                                @if ($item->category_id != $editPizza->category_id)
                                                                    <option value="{{ $item->category_id }}">
                                                                        {{ $item->category_name }}</option>
                                                                @endif
                                                            @endforeach


                                                        </select>
                                                        @if ($errors->has('category'))
                                                            <p class="text-danger">{{ $errors->first('category') }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                    {{-- Discount ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Discount
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="discount" class="form-control"
                                                            value="{{ old('discount', $editPizza->discount_price) }}">
                                                        @if ($errors->has('discount'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('discount') }}</p>
                                                        @endif
                                                    </div>

                                                    {{-- Buy 1 Get 1 ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Buy 1 Get 1
                                                    </label>
                                                    <div class="col-sm-10 mt-2">
                                                        @if ($editPizza->buy_one_get_one_status == 1)
                                                            <input type="radio" name="buyOneGetOne" class="form-input-check"
                                                                value="1" checked>Yes
                                                            <input type="radio" name="buyOneGetOne" class="form-input-check"
                                                                value="0"> No
                                                        @else
                                                            <input type="radio" name="buyOneGetOne" class="form-input-check"
                                                                value="1">Yes
                                                            <input type="radio" name="buyOneGetOne" class="form-input-check"
                                                                value="0" checked> No
                                                        @endif
                                                        @if ($errors->has('buyOneGetOne'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('buyOneGetOne') }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                    {{-- Waiting Time ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Time
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="time" class="form-control"
                                                            placeholder="eg. minute"
                                                            value="{{ old('time', $editPizza->waiting_time) }}">
                                                        @if ($errors->has('time'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('time') }}</p>
                                                        @endif
                                                    </div>

                                                    {{-- Description ----------------------------------------- --}}
                                                    <label for="inputName" class="col-sm-2 col-form-label mb-4">Description
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" rows="3" placeholder="Description"
                                                            name="description">{{ old('description', $editPizza->description) }}</textarea>
                                                        @if ($errors->has('description'))
                                                            <p class="text-danger">{{ $errors->first('description') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="d-flex justify-content-between mt-5">
                                                    <div class="">
                                                        <a href="{{ route('admin#pizza') }}">
                                                            <button type="button" class="btn bg-dark text-white ms-2">Cancel
                                                                Opertaion</button>
                                                        </a>
                                                    </div>
                                                    <div class="ms-5">
                                                        <button type="submit" class="btn bg-dark text-white">Add
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
