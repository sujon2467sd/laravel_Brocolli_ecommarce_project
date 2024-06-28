<script   src="{{ asset('/') }}admin/plugins/jquery/jquery.min.js"></script>

<script   src="{{ asset('/') }}admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script   src="{{ asset('/') }}admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script   src="{{ asset('/') }}admin/dist/js/adminlte2167.js?v=3.2.0"></script>


<script   src="{{ asset('/') }}admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script   src="{{ asset('/') }}admin/plugins/raphael/raphael.min.js"></script>
<script   src="{{ asset('/') }}admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script   src="{{ asset('/') }}admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script   src="{{ asset('/') }}admin/plugins/chart.js/Chart.min.js"></script>

{{-- <script   src="{{ asset('/') }}admin/dist/js/demo.js"></script> --}}

<script   src="{{ asset('/') }}admin/dist/js/pages/dashboard2.js"></script>




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

{{-- toastr end--}}

{{-- validation error by toster start --}}

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



{{-- summer note start --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote(
            {height:250}
        );
    });
    </script>

<script>
    $(document).ready(function() {
        $('#summernotes').summernote(
            {height:300}
        );
    });
    </script>
{{-- summer note end --}}





{{-- bootstrap plaging  --}}

<script  src="{{ asset('/') }}admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/jszip/jszip.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/pdfmake/pdfmake.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/pdfmake/vfs_fonts.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script  src="{{ asset('/') }}admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
{{-- bootstrap plaging end --}}


{{-- <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('colors')  // id
</script> --}}
