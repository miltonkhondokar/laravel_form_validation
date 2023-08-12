<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.13.2 -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

{!! JsValidator::formRequest('App\Http\Requests\SalesTrackerRequest') !!}


<script type="text/javascript">
    // add row
    $("#addRow").click(function() {
        var html = '';
        html += '<div class="input-group" id="inputFormRow">';
        html += '<input type="text" id="items" name="items[]" class="form-control">';
        html += '<span class="input-group-append">';
        html +=
            '<button type="button" id="removeRow" class="btn btn-danger btn-flat"><i class="fas fa-minus-circle"></i></button>';
        html += '</span>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });


    $("#sales_tracker").submit(function(stay) {
        var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
        $.ajax({
            type: 'POST',
            url: "{{ route('sales.store') }}",
            data: formdata, // here $(this) refers to the ajax object not form
            success: function(data) {
                if (data === 'y') {
                    $('#success-show').show();
                    $('#alert-show').hide();
                    $('#alert-message').hide();
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                } else if (data === 'n') {
                    $('#alert-show').show();
                    $('#success-show').hide();
                    $('#alert-message').hide();
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                } else if (data === 'e') {
                    $('#alert-message').show();
                    $('#alert-show').hide();
                    $('#success-show').hide();
                }
            }
        });
        stay.preventDefault();
    });

    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(function() {
        $("#from_date").datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
        $("#to_date").datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    });


    $(document).find('#sales-filter-btn').on('click', function() {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var userId = $('#entry_by').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('sales.all-sales') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                fromDate: fromDate,
                toDate: toDate,
                userId: userId
            },
            success: function(data) {

            }
        });
    });
</script>
