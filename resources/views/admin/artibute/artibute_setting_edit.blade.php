
@extends('admin.master')

@section('title', 'edit-artibute')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5>Artibute Edit </h5>
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

                <form action="{{ route('artibute.update',$artibutes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $artibutes->name }}" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $artibutes->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $artibutes->status==0 ? 'selected':'' }}>Deactive</option>

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
