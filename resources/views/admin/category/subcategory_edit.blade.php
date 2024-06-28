
@extends('admin.master')

@section('title', 'Edit_category')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5>  Edit Category</h5>
            </div>
            <div class="card-body">
    {{-- toaster start --}}
    <script>
        $(document).ready(function() {
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        });
    </script>
{{-- toaster end --}}
                <form action="{{ route('sub-category.update',$SubCategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">main_category_name</label>
                        <select   name="main_category" class="form-control">




                            @foreach ($maincategory as $main_categories)

                                    <option value="{{ $main_categories->id }}" {{ $main_categories->id == $SubCategory->main_category ? 'selected' : '' }}>
                                        {{ $main_categories->name }}
                                    </option>

                            @endforeach




                        </select>
                        <td></td>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $SubCategory->name }}" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description" >{{ $SubCategory->description }}</textarea>
                    </div>

                    <div class="form-group">

                        <label for="message-text" class="col-form-label">img</label><br>
                        <input type="file" name="img" class="form-control" accept="image/*"
                            onchange="loadFile(event)"><br>
                        <img src="{{ asset('admin/cate_images/'.$SubCategory->img) }}" name="img" id="output" style="height: 100px" />

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
