@extends('admin.layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('createSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('createSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('Successfully Delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('Successfully Delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('updateSuccess'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ Session::get('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title ml-5">
                                    <a href="{{ route('admin#addPizza') }}">
                                        <button class="btn btn-sm btn-outline-dark">Add Pizza</button>
                                    </a>
                                </h3>
                                <h3 class="card-title ml-5">
                                    <button class="btn btn-sm btn-outline-dark">Total
                                        Count = {{ $pizza->total() }}</button>
                                </h3>

                                <div class="card-tools">
                                    <form action="{{ route('admin#searchPizza') }}" method="get">
                                        @csrf
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="tableSearch" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pizza Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Publish Status</th>
                                            <th>Category</th>
                                            <th>Discount</th>
                                            <th>Buy 1 Get 1 Status</th>
                                            <th>Waiting Time</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($pizza1 == '0')
                                            <tr>
                                                <td colspan="11" class="text-danger">
                                                    There is no Data
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($pizza as $item)
                                                <tr>
                                                    <td>{{ $item->pizza_id }}</td>
                                                    <td>{{ $item->pizza_name }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/' . $item->image) }}"
                                                            class="img-thumbnail" width="100px">
                                                    </td>
                                                    <td>{{ $item->price }} mmk</td>
                                                    <td>
                                                        @if ($item->publish_status == 1)
                                                            Publish
                                                        @else
                                                            Unpublish
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($category as $categoryItem)
                                                            @if ($item->category_id == $categoryItem->category_id)
                                                                {{ $categoryItem->category_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $item->discount_price }} mmk
                                                    </td>
                                                    <td>
                                                        @if ($item->buy_one_get_one_status == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->waiting_time }} minutes</td>
                                                    <td>
                                                        <p class="text-break">
                                                            {{ $item->description }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin#editPizza', $item->pizza_id) }}">
                                                            <button class="btn btn-sm bg-dark text-white"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </a>
                                                        <a href="{{ route('admin#deletePizza', $item->pizza_id) }}">
                                                            <button class="btn btn-sm bg-danger text-white"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="mt-3 ms-2">
                                    {{ $pizza->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
