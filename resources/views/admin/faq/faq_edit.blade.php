
@extends('admin.master')

@section('title', 'edit-faq')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5> Brand Edit </h5>
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
                <form action="{{ route('faq.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">main_category_name</label>
                        <td></td>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $faq->name }}" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description" >{{ $faq->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $faq->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $faq->status==0 ? 'selected':'' }}>Deactive</option>

                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
