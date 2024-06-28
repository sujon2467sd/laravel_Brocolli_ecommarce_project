@extends('admin.master')

@section('title', 'unit')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Create unit
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">unit create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Unit</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>


                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description"></textarea>
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
            <h3>Category</h3>
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
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($unit as $units)


                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $units->name}}</td>
                        <td>{{ $units->description }}</td>
                        <td>
                            @if($units->status==1)
                            <a href="{{ route('unit_status',$units->id) }}" class="btn btn-success btn-sm"
                                onclick="return confirm('Are you Sure')">Active</a>
                            @else
                            <a href="{{ route('unit_status',$units->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you Sure')">DeActive</a>
                            @endif

                        </td>
                        <td>{{ $units->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="{{route('unit.edit', ['unit' => $units->id]) }}"><i
                                        class="fa-regular fa-pen-to-square"
                                        style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i></a>

                                <form action="{{ route('unit.destroy', ['unit' => $units->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this category?')"
                                        class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i></button>
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
