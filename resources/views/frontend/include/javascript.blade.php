
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <!-- All JS Plugins -->

 <script src="{{ asset('/')}}frontend/js/plugins.js"></script>
 <!-- Main JS -->
 <script src="{{ asset('/')}}frontend/js/main.js"></script>

 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


 {{-- AOS Animation start --}}
 <script>

AOS.init({
     duration: 1000,
   });

 </script>
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

{{-- AOS Animation start end --}}



{{-- toastr start --}}

<script>
    $(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        "error": { "color": "red" }
    }
});

</script>
{{-- toastr success messege--}}
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
    });
</script>

{{-- toastr delete messege--}}
 <script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

{{-- toastr end --}}

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif

    // @if(session('success'))
    //     toastr.success('{{ session('success') }}');
    // @endif

    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>

{{-- validation error by toster end --}}


