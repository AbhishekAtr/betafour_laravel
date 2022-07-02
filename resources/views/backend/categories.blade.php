@extends('backend.include.sidebar')

@section('main')
    <div class="row my-5">
        <div class="col-md-12">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6">
                        <form>
                            <div class="col-md-4 form-group">
                                <input type="search" class="form-control" name="search" id="search"
                                    value="{{ $search }}" placeholder="search here">
                            </div>
                            <div class="col-md-3 mt-4">
                                <button class="btn btn-success" type="submit">Search</button>
                                <a href="{{ url('/category') }}">
                                    <button class="btn-info btn" type="button">Reset</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <table class="table table-striped w-100">
                            <thead>
                                <tr class="table-success">
                                    <th>S.no</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <input type="hidden" class="delete" value="{{ $category->id }}">
                                            <td width="10%">{{ $loop->index + 1 }}</td>
                                            <td width="10%">{{ $category->title }}</td>
                                            <td width="30%">{{ $category->description }}</td>
                                            <td width="30%"><img src="uploads/{{ $category->image }}" alt=""
                                                    style="width:100px; height:100px">
                                            </td>
                                            <td width="20%">
                                                <button type="button" value="{{ $category->id }}"
                                                    class="btn btn-info editcat">Edit</button>
                                                <button type="button" value="{{ $category->id }}"
                                                    class="btn btn-danger deletecat">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Data Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deletecat', function() {
                var id = $(this).closest("tr").find('.delete').val();
                // alert(id);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name=_token]').val(),
                                "id": id,
                            };

                            $.ajax({
                                type: "DELETE",
                                url: '/delete-category/' + id,
                                data: "data",
                                success: function(response) {
                                    swal(response.success, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });


            $(document).on('click', '.editcat', function() {
                var id = $(this).val();
                // alert(id);
                $('#editcatModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-cat/" + id,
                    success: function(response) {
                        // console.log(response);
                        $('#title').val(response.cat.title);
                        $('#image').val(response.cat.image);
                        $('#descriptions').val(response.cat.description);
                        $('#id').val(id);
                    }
                });
            });
        });
    </script>
@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="modal-body">
                        <form action="{{ url('category-add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-4">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">
                                        Button
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                        name="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                        name="description">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editcatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <form action="{{ url('edit-cat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="modal-body">
                            <div class="col-md-12 mb-4">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image"
                                        id="image">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="inputGroupFileAddon04">
                                        Button
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                        name="title" id="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                        name="description" id="descriptions">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
