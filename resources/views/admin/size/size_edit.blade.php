
@extends('admin.master')

@section('title', 'color_edit')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5>color Edit </h5>
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
                <form action="{{ route('size.update',$size->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $size->name }}" class="form-control" id="recipient-name">
                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">size</label>
                        <input type="text" name="size" value="{{ $size->size }}" class="form-control" id="recipient-name">
                    </div>



                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description">{{ $size->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $size->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $size->status==0 ? 'selected':'' }}>Deactive</option>

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
 </div>


 {{-- //img preview --}}

@endsection
