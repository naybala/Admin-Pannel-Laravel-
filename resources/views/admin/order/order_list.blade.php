@extends('admin.layout.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('main-page/css/orderSearch.css') }}">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        @foreach ($data as $item)
                                            <input type="hidden" value="{{ $item->name }}" id="hello">
                                        @endforeach
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" name="orderSearch">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap text-center">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Pizza Name</th>
                                            <th>Amount</th>
                                            <th>Payment Type</th>
                                            <th>Total mmk</th>
                                            <th>Waiting Time</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->pizza_name }}</td>
                                                @if ($item->buy_one_get_one_status == 1)
                                                    <td>{{ $item->amount }}+{{ $item->amount }} </td>
                                                @else
                                                    <td>{{ $item->amount }}</td>
                                                @endif
                                                @if ($item->payment_id == 1)
                                                    <td>Cash On Deliver</td>
                                                @elseif($item->payment_id == 2)
                                                    <td>Visa</td>
                                                @else
                                                    <td>Online Payment</td>
                                                @endif
                                                <td>{{ ($item->price - $item->discount_price) * $item->amount }} mmk
                                                </td>
                                                @if ($item->buy_one_get_one_status == 1)
                                                    <td>{{ $item->waiting_time * $item->amount * 2 }} min </td>
                                                @else
                                                    <td>{{ $item->waiting_time * $item->amount }} min </td>
                                                @endif

                                                <td>
                                                    <button class="btn-sm btn-primary" id="btnConfirm">Confirm</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3 ms-2">
                                    {{ $data->links() }}
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
@endsection
