<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2024 07:24:05 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('admin/logo_images/'.$logo->favicon_img) }}" type="image/x-icon" />

    @include('admin.include.style')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble"   src="{{asset('admin/logo_images/'.$logo->favicon_img) }}" alt="AdminLTELogo" height="60" width="60">
        </div>

      @include('admin.include.header')


      @include('admin.include.sidebar')

        <div class="content-wrapper">

            {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard v2</h1>
                        </div>

                    </div>
                </div>
            </div> --}}

           @yield('content')


        </div>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>


      @include('admin.include.footer')

    </div>


@include('admin.include.script')
</body>

<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2024 07:24:07 GMT -->

</html>
