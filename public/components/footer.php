<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- jQuery -->
<script src="adminltes/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="adminltes/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="adminltes/AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/jszip/jszip.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminltes/AdminLTE-master/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="adminltes/AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminltes/AdminLTE-master/dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- Select2 -->
<script src="adminltes/AdminLTE-master/plugins/select2/js/select2.full.min.js"></script>


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "buttons": ["excel", "print"]
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

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>