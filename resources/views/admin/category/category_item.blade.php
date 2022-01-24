@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fs-3 text-center">
                                    {{ $categoryName->category_name }}
                                </h3>

                                <h3 class="card-title ml-5">
                                    <button class="btn btn-sm btn-outline-dark">Total
                                        Count - {{ $pizza->total() }}</button>
                                </h3>
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
                                        <th>Discount</th>
                                        <th>Buy 1 Get 1 Status</th>
                                        <th>Waiting Time</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pizza as $item)
                                        <tr>
                                            <td>{{ $item->pizza_id }}</td>
                                            <td>{{ $item->pizza_name }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" class="img-thumbnail"
                                                    width="100px">
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
                                            <td>{{ $item->description }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="mt-3 ms-2">
                                {{ $pizza->links() }}
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin#category') }}">
                                    <button type="button" class="btn bg-dark text-white ms-2">
                                        Back To List Page </button>
                                </a>
                            </div>
                            {{-- <div class="mt-3 ms-2">
                                {{ $category_list->links() }}
                            </div> --}}
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
@endsection
