@extends('admin.layout.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('main-page/css/categorySearch.css') }}">

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('SuccessFully Delete'))
                    <div class="alert alert-danger Delete alert-dismissible fade show" role="alert">
                        {{ Session::get('SuccessFully Delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('updateSuccess'))
                    <div class="alert alert-warning Delete alert-dismissible fade show" role="alert">
                        {{ Session::get('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title ml-5">
                                    <a href="{{ route('admin#addCategory') }}">
                                        <button class="btn btn-sm btn-outline-dark">Add Category</button>
                                    </a>
                                </h3>
                                <h3 class="card-title ml-5 me-5">
                                    <button class="btn btn-sm btn-outline-dark">Total
                                        Count = {{ $category_list->total() }}</button>
                                </h3>
                                <div class="card-tools">
                                    <input type="text" class="form-control autoCompleteInput"
                                        placeholder="Search Category...">
                                    <div class="resultContainer position-absolute">
                                        <a href=""></a>
                                    </div>
                                </div>
                                {{-- <div class="card-tools">
                                    <form action="{{ route('admin#searchCategory') }}" method="get">
                                        @csrf
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="tableSearch"
                                                class="form-control float-right autoCompleteInput" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>

                                        </div>
                                        <div class=resultContainer></div>
                                    </form>

                                </div> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Pizza Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($category1 == '0')
                                        <tr>
                                            <td colspan="11" class="text-danger">
                                                There is no Data
                                            </td>
                                        </tr>
                                    @else --}}
                                    @foreach ($category_list as $item)
                                        <tr>
                                            <td>{{ $item->category_id }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>
                                                @if ($item->count == 0)
                                                    <a href="#">
                                                        {{ $item->count }}
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin#categoryItem', $item->category_id) }}">
                                                        {{ $item->count }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin#editCategory', $item->category_id) }}">
                                                    <button class="btn btn-sm bg-dark text-white"><i
                                                            class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="{{ route('admin#deleteCategory', $item->category_id) }}">
                                                    <button class="btn btn-sm bg-danger text-white"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- @endif --}}

                                </tbody>
                            </table>

                            <div class="mt-3 ms-2">
                                {{ $category_list->links() }}
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
    <script src="{{ asset('main-page/js/categoryAutoCompleteSearch.js') }}"></script>
@endsection
