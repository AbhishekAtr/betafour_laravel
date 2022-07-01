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
        <div class="card py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Products
                        </button>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-center">
                <table class="table table-striped w-100">
                    <thead>
                        <tr class="table-success">
                            <th>S.no</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($newrelease->count() > 0)
                            @foreach ($newrelease as $product)
                                <tr>
                                    <input type="hidden" class="delete" value="{{ $product->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        <?php
                                                        if ($product->image != ""){
                                                        foreach(explode(',', $product->image) as $info) 
                                                        { 
                                                        ?>
                                        <img src="uploads/{{ $info }}" style="height:120px; width:200px" />
                                        <?php  
                                                        } 
                                                        } 
                                                        ?>
                                    </td>
                                    <td>
                                         <button type="button" value="{{ $product->id }}"
                                            class="btn btn-info editbtn">Edit</button>
                                        <button type="button" value="{{ $product->id }}"
                                            class="btn btn-danger deletebtn">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
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

            $(document).on('click', '.deletebtn', function() {
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
                                url: '/delete-newproduct/' + id,
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


            $(document).on('click', '.editbtn', function() {
                var id = $(this).val();
                // alert(id);
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-newproduct/" + id,
                    success: function(response) {
                        // console.log(response);
                        $('#title').val(response.product.title);
                        $('#image').val(response.product.image);
                        $('#description').val(response.product.description);
                        $('#category').val(response.product.category);
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
                <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="modal-body">
                        <form action="{{ url('new-release') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-4">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image[]"
                                        multiple>
                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">
                                        Button
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                                    <select class="form-select" aria-label="Default select example" name="category">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
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
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="description"></textarea>
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <form action="{{ url('edit-newproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="modal-body">
                            <div class="col-md-12 mb-4">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image[]"
                                        id="image" value="" multiple>
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="inputGroupFileAddon04">
                                        Button
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                                    <select class="form-select" aria-label="Default select example" name="category"
                                        id="category">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
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
                                    <textarea name="description1" id="description1" class="form-control" rows="4" placeholder="description"></textarea>
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
