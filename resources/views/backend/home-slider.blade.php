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
                                data-bs-target="#sliderModal">
                                Add Slider
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center">
                    <table class="table table-striped w-100">
                        <thead>
                            <tr class="table-success">
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($slider->count() > 0)
                                @foreach ($slider as $sliders)
                                    <tr>
                                        <input type="hidden" class="delete" value="{{ $sliders->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="uploads/{{ $sliders->image }}" alt=""
                                                style="width:100px; height:100px">
                                        </td>
                                        <td>
                                            <button type="button" value="{{ $sliders->id }}"
                                                class="btn btn-info btnEdit">Edit</button>
                                            <button type="button" value="{{ $sliders->id }}"
                                                class="btn btn-danger btnDelete">Delete</button>
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
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.btnDelete', function() {
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
                                    url: '/delete-slider/' + id,
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


                $(document).on('click', '.btnEdit', function() {
                    var id = $(this).val();
                    // alert(id);
                    $('#editModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/edit-slider/" + id,
                        success: function(response) {
                            // console.log(response);
                            $('#image').val(response.slider.image);
                            $('#id').val(id);
                        }
                    });
                });
            });
        </script>
    @endsection


    <!-- Modal -->
    <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="modal-body">
                            <form action="{{ url('home-slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 mb-4">
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="inputGroupFileAddon04">
                                            Button
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                    name="title">
                            </div>
                        </div> --}}
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">
                                        Upload
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container">
                    <div class="row">
                        <form action="{{ url('edit-slider') }}" method="POST" enctype="multipart/form-data">
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
                                {{-- <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" placeholder="enter title here"
                                    name="title" id="title">
                            </div>
                        </div> --}}
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
