@extends('admin.master')

@section('title', 'sub_category')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Create Sub category
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sub Category create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('sub-category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Main Category</label>
                       <select  name="main_category" class="form-control" id="">
                        @foreach ($maincategory as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                       </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">img</label><br>
                        <input type="file" name="img" class="form-control" accept="image/*"
                            onchange="loadFile(event)"><br>
                        <img id="output" style="height: 100px" />
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
                        <th>MainCategory</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>




                    @foreach ($sub_category as $categoryies)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ optional($categoryies->maincategories)->name}}</td>
                        <td>{{ $categoryies->name }}</td>
                        <td>{{ $categoryies->description }}</td>
                        <td><img src="{{ asset('admin/images/'.$categoryies->img) }}" alt="" width="80px" height="50px"></td>
                        <td>{{ $categoryies->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="{{ route('sub-category.edit', ['sub_category' => $categoryies->id]) }}">
                                    <i class="fa-regular fa-pen-to-square" style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i>
                                </a>
                                <form action="{{ route('sub-category.destroy', ['sub_category' => $categoryies->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-sm btn-danger">
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


 {{-- toastr start for delete --}}

{{-- toastr end for delete --}}



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
