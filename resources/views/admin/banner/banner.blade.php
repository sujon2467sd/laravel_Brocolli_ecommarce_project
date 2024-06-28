@extends('admin.master')

@section('title', 'banner')

@section('content')

<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
       Banner create
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
                <h5 class="modal-title" id="exampleModalLongTitle">Brand create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tittle_One</label>
                        <input type="text" name="tittle" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tittle_Two</label>
                        <input type="text" name="tittle_two" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Button Link</label>
                        <input type="text" name="link" class="form-control" id="recipient-name">
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
                        <th>tittle</th>
                        <th>tittle two</th>
                        <th>link</th>
                        <th>status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <tbody>

                 @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $banner->tittle }}</td>
                        <td>{{ $banner->tittle_two}}</td>
                        <td>
                            @if($banner->status==1)
                                <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-success btn-sm"  onclick="return confirm('Are you Sure')">Active</a>
                            @else
                                <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you Sure')">DeActive</a>
                            @endif

                        </td>
                        <td><img src="{{ asset('admin/images/'. $banner->img) }}" alt="" width="80px" height="50px"></td>
                        <td>{{  $banner->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="{{ route('banner.edit', ['banner' =>  $banner->id]) }}">
                                    <i class="fa-regular fa-pen-to-square" style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i>
                                </a>
                                <form action="{{ route('banner.destroy', ['banner' =>  $banner->id]) }}" method="POST">
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



 </tbody>
            </table>
        </div>




    </div>
</div>


 {{-- toastr start for delete --}}

 <script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

{{-- toastr end for delete --}}

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
