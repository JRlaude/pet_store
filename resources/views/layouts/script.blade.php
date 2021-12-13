<!-- REQUIRED SCRIPT -->
<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.1.0/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- plugins -->
@yield('pluginsjs')
<!-- toastr -->
<script src="{{ asset('AdminLTE-3.1.0/plugins/toastr/toastr.min.js') }}"></script>
<x-toastr />
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-3.1.0/dist/js/adminlte.min.js') }}"></script>

@yield('js')
