
@extends('admin.master')

@section('title', 'edit-artibute_info')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5>Artibute Edit </h5>
            </div>
            <div class="card-body">

               {{-- toastr start for delete --}}

        <script>
            $(document).ready(function() {
                @if(session('delete_success'))
                    toastr.error('{{ session('delete_success') }}');
                @endif
            });
        </script>

{{-- toastr end for delete --}}

                <form action="{{ route('artibute-info.update',$artibute_info->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Artibute</label>

                        <select name="artibute_id" id="" value="" class="form-control">
                            @foreach ($artibute as $artibutes)
                            <option value="{{ $artibutes->id }}" {{ $artibutes->id== $artibute_info->artibute_id ? 'selected' : '' }}>{{ $artibutes->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $artibute_info->name }}" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $artibute_info->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $artibute_info->status==0 ? 'selected':'' }}>Deactive</option>

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
