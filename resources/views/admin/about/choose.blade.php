@extends('admin.master')

@section('title', 'choose')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
     Choose create
    </button>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('choose.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Short Tittle</label>
                        <input type="text" name="short_tittle" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea id="summernotes" class="form-control" id="message-text" name="description"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="message-text" class="col-form-label">img</label><br>
                        <input type="file" name="img" class="form-control" accept="image/*"
                            onchange="loadFile(event)"><br>
                        <img id="output" style="height: 100px" />
                    </div>


                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Status</label>
                        <select  name="status" class="form-control" >
                             <option value="1">Active</option>
                             <option value="0">DeActive</option>
                        </select>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- show data  table--}}
<div class="container mt-4">
    <div class="card">

        <div class="card-header">
            <h3>About</h3>
        </div>


        @php
        $index=1;
        @endphp

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Short_tittle</th>
                        <th>Description</th>
                        <th>Img</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <tbody>

                 @foreach ($chooses as $key =>$choose)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $choose->name }}</td>
                        <td>{{ $choose->short_tittle }}</td>
                        <td>{{ $choose->description }}</td>
                        <td><img src="{{ asset('admin/cate_images/'.$choose->img) }}" width="30px"> </td>
                        <td>
                            @if($choose->status==1)
                                <a href="{{ route('choose.status',$choose->id) }}" class="btn btn-success btn-sm"  onclick="return confirm('Are you Sure')">Active</a>
                            @else
                                <a href="{{ route('choose.status',$choose->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you Sure')">DeActive</a>
                            @endif

                        </td>

                        <td>{{ $choose->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="#">
                                    <i class="fa-regular fa-pen-to-square" data-toggle="modal" data-target="#exampleModalCenterx{{ $key }}" style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i>
                                </a>
                                <form action="{{ route('choose.destroy', ['choose' => $choose->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this aboutIteam?')" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach




         </tbody>
            </table>
        </div>






    </div>
</div>

@foreach ($chooses as $key => $choose)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenterx{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">About create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('choose.update',$choose->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $choose->name }}" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">short_tittle</label>
                        <input type="text" name="short_tittle" value="{{ $choose->short_tittle }}" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea id="summernotes"  class="form-control" id="message-text" name="description">{{ $choose->description  }}</textarea>
                    </div>

                    <div class="form-group">

                        <label for="message-text" class="col-form-label">img</label><br>
                        <input type="file" name="img" class="form-control" accept="image/*"
                            onchange="loadFile(event)"><br>
                        <img src="{{ asset('admin/cate_images/'.$choose->img) }}" name="img" id="output" style="height: 100px" />

                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $choose->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $choose->status==0 ? 'selected':'' }}>Deactive</option>

                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endforeach

{{-- //img preview --}}

<script>
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


@endsection
