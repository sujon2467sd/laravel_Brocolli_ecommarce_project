
@extends('admin.master')

@section('title', 'unit_edit')



@section('content')
 <div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
              <h5>Unit Edit </h5>
            </div>
            <div class="card-body">

                <form action="{{ route('unit.update',$unit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" name="name" value="{{ $unit->name }}" class="form-control" id="recipient-name">
                    </div>





                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="message-text" name="description">{{ $unit->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" >Status</label>
                        <select name="status" class="form-control"  id="status">
                            <option value="1" {{ $unit->status==1 ? 'selected':'' }}>Active</option>
                            <option value="0"  {{ $unit->status==0 ? 'selected':'' }}>Deactive</option>

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
