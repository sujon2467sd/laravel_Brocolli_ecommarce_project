@extends('admin.master')

@section('title', 'general-setting')

@section('content')
<!-- HTML structure with Bootstrap classes -->

<style>
    /* CSS style for fixed height */
    .fixed-height {
        height: 30vh; /* Set the height to 100% of the viewport height */
        overflow-y: auto; /* Add vertical scrollbar if content overflows */
    }
</style>

<div class="container">
    <div class="row p-3">

        <!-- Side Menu -->
        <div class="col-md-3  bg-success fixed-height">
            <h3 class="py-2">General Setting</h3>
            <ul class="nav flex-column">
                <li class="nav-item  btn btn-danger btn-sm">

                    <a class="nav-link text-white" href="#" onclick="changeContent('top')">Change TopBarNav item</a>
                </li>
                <li class="nav-item btn btn-danger btn-sm mt-3">
                    <a class="nav-link text-white" href="#" onclick="changeContent('status')">Change Logos</a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
        </div>
        <!-- Main Content Area -->
        <div class="col-md-9  pl-md-4" id="main-content">


       {{-- toaster start --}}
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
{{-- toaster end --}}


            <!-- Initial content will be loaded here -->
        </div>
    </div>
</div>

<script>
    function changeContent(menuItem) {
        // You can use AJAX to fetch content dynamically based on the clicked menu item
        // Here, I'm just showing static content for demonstration purposes
        let content = '';
        if (menuItem === 'top') {

            content = `

                <h2>Top Menu Setting</h2>
                <form id="logo-form" action="{{ route('top_update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="logoInput">Gmail</label>
                        <input type="text" class="form-control" name="gmail"   value="{{ $settings->gmail }}">
                    </div>
                   <div class="form-group">
                        <label for="addressInput">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="addressInput" name="address" value="{{ old('address', $settings->address) }}">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logoInput">facebook</label>
                        <input type="text" class="form-control" name="facebook"  value="{{ $settings->facebook}}">
                    </div>
                    <div class="form-group">
                        <label for="logoInput">twitter</label>
                        <input type="text" class="form-control" name="twitter"  value="{{ $settings->twitter }}" >
                    </div>
                    <div class="form-group">
                        <label for="logoInput">instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{ $settings->instagram }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            `;

        } else if (menuItem ==='status') {
            content = `

                            <h2>Change Logo</h2>

                            <form id="logo-form" action="{{ route('logo_update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="logoInput">Logo</label>
                                    <input type="file" class="form-control" name="logo_img"  accept="image/*" onchange="loadFile(event)">
                                    <img src="{{ asset('admin/logo_images/'.$logos->logo_img) }}"  id="output" alt="" width="60px" class="mt-3">
                                </div>

                                <div class="form-group">
                                    <label for="logoInput">Favicon_img</label>
                                    <input type="file" class="form-control" name="favicon_img"  accept="image/*" onchange="loadFileAnother(event)">

                                    <img src="{{ asset('admin/logo_images/'.$logos->favicon_img) }}"   id="outputs" alt="" width="60px" class="mt-3">
                                </div>


                            <div class="form-group">
                                <label for="logoInput">Number</label>

                                <input type="text" class="form-control" name="number"   value="{{ $logos->phone_number }}">
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>





                            `;
        }
        // Update the main content area with the new content
        document.getElementById('main-content').innerHTML = content;
    }
</script>


<script>
    // logo img
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

// favicon img
    var loadFileAnother = function (events) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('outputs');
            output.src = reader.result;
        };
        reader.readAsDataURL(events.target.files[0]);
    };
</script>



@endsection


