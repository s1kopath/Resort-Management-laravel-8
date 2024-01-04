@extends('backend.main')

@section('content')
    <div style=" background-color: rgb(227, 250, 239);" class="table-responsive  mt-4 p-5 rounded shadow ">
        <!-- Button trigger modal -->
        <h2 class="float-start text-dark text-center border-buttom ">Room Details</h2>
        <button style=" background-color:#BB2D3B" type="button" class="btn text-light mt-5 mx-3 float-end"
            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Room</button>



        {{-- Room Details Details table --}}
        <table class="table table-hover table-striped table-es-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Room Details</th>
                    <th scope="col">Price</th>
                    <th scope="col">Adult</th>
                    <th scope="col">Children</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
    </div>
    @foreach ($roomDetail as $key => $request)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td><img src="{{ url('/files/roomDetail/' . $request->file) }}" style="width:70px; height:60px;"></td>
            <td>{{ $request->room_type }}</td>
            <td>{{ $request->room_detail }}</td>
            <td>{{ $request->price }}</td>
            <td>{{ $request->adult }}</td>
            <td>{{ $request->children }}</td>
            <td>{{ $request->status }}</td>

            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-arrow-down-left-circle"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            @if ($request->publishedStatus == 'Published')
                                <a class="btn"
                                    href="{{ route('roomUpdate', ['id' => $request->id, 'publishedStatus' => 'Unpublished']) }}">Make
                                    Unpublished</a>
                            @elseif ($request->publishedStatus == 'Unpublished')
                                <a class="btn"
                                    href="{{ route('roomUpdate', ['id' => $request->id, 'publishedStatus' => 'Published']) }}">Make
                                    Published</a>
                            @else
                                <a class="btn" href="">None</a>
                            @endif
                        </li>

                        <li class="bg-info"><a class="btn"
                                href="{{ route('roomDetailEdit', $request->id) }}">Edit</span></a></li>
                        <li class="bg-danger"><a class="btn btn-danger"
                                href="{{ route('roomDetailDelete', $request->id) }}">Delete</a></li>



                    </ul>
                </div>


            </td>

        </tr>
    @endforeach
    </tbody>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="{{ route('roomDetailCreate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName">Room Type</label>
                            <input name="room_type" type="text" class="form-control" id="exampleInputName"
                                placeholder="Enter room type">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Room Detail</label>
                            <input name="room_detail" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="enter room details">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Price</label>
                            <input name="price" type="number" class="form-control" id="exampleInputPhone"
                                placeholder="Enter Price">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Adult</label>
                            <input name="adult" type="number" class="form-control" id="exampleInputPhone"
                                placeholder="Enter Number">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Children</label>
                            <input name="children" type="number" class="form-control" id="exampleInputPhone"
                                placeholder="Enter Number">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputRePicture">Upload Picture</label>
                            <input name="file" type="file" class="form-control" id="exampleInputRePicture"
                                placeholder="Enter Room Picture">

                        </div>

                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
