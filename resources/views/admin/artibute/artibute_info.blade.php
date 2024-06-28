@extends('admin.master')

@section('title', 'artibute-info')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Artibute Info create
    </button>
</div>

{{-- toaster start --}}
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
{{-- toaster end --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Artibute create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('artibute-info.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Artibute Select</label>

                       <select name="artibute_id" id="" class="form-control">
                            @foreach ($artibute as $artibutes)
                            <option value="{{ $artibutes->id }}">{{ $artibutes->name }}</option>
                            @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
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
            <h3>Artibute</h3>
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
                        <th>Artibute</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <tbody>

                 @foreach ($artibute_info as $artibute_infos)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $artibute_infos->name }}</td>
                        <td>{{ $artibute_infos->Artibute ? $artibute_infos->Artibute->name : 'N/A' }}</td>
                        <td>
                            @if($artibute_infos->status==1)
                                <a href="{{ route('artibute_info_status',$artibute_infos->id) }}" class="btn btn-success btn-sm"  onclick="return confirm('Are you Sure')">Active</a>
                            @else
                                <a href="{{ route('artibute_info_status',$artibute_infos->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you Sure')">DeActive</a>
                            @endif

                        </td>
                        <td>{{$artibute_infos->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="{{ route('artibute-info.edit', ['artibute_info' =>$artibute_infos->id]) }}">
                                    <i class="fa-regular fa-pen-to-square" style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i>
                                </a>
                                <form action="{{ route('artibute-info.destroy', ['artibute_info' =>$artibute_infos->id]) }}" method="POST">
                                     @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this Brand?')" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

{{-- toastr start for delete --}}

<script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

{{-- toastr end for delete --}}
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
