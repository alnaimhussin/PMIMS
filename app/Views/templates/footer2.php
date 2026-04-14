
<footer class=" fixed-bottom bg-white text-dark p-3" style="height: 50  px">
      <div class="row">
        <div class="col-3">
        <h5>Provincial Government of Basilan</h5>
        </div>
        <div class="col-6">
          
        </div>
        <div class="col-3" style="text-align:right">
        <h5>Version beta 1.0.1 @ <b>alnaimhussin</b></h5>
        </div>
      </div>
    
    
</footer>

</div>

    <script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>">
    </script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url('public/assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url('public/assets/plugins/toastr/toastr.min.js'); ?>"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('public/assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script
      src="<?php echo base_url('public/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('public/assets/plugins/chart.js/Chart.min.js'); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('public/assets/plugins/sparklines/sparkline.js'); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('public/assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url('public/assets/plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js'); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('public/assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('public/assets/plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
      src="<?php echo base_url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>">
    </script>
    <!-- Summernote -->
    <script src="<?php echo base_url('public/assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>">
    </script>

    <!-- DataTables -->
    <script src="<?php echo base_url('public/assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url('public/assets/dist/js/adminlte.js'); ?>"></script>

    <!-- QRCode -->
    <script src="<?php echo base_url('public/assets/dist/js/qrcode.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/dist/js/qrcode.min.js'); ?>"></script>

    <!-- FileSaver -->
    <script src="<?php echo base_url('public/assets/dist/js/FileSaver.min.js'); ?>"></script>

    <script>
      $(function () {

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        $('#datemask').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })
        $('#timemask').inputmask('hh:mm', {
          'placeholder': 'hh:mm'
        })

        $('[data-mask]').inputmask()
        bsCustomFileInput.init();

        $("#example").DataTable({
          "responsive": true,
          "autoWidth": false,
        });

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        $('#dtrtable').dataTable({
          "ordering": false
        });

      });

      $(document).ready(function () {
        bsCustomFileInput.init();
      });

      function getFileName(str) {
        return str.substring(str.lastIndexOf('/') + 1)
      }

      function show(msg) {
        if (msg != '') {
          Swal.fire(
            'Success!',
            msg,
            'success'
          )

        }
      }

      function showAlert(type, title, msg) {
        if (msg != '') {
          Swal.fire(
            title,
            msg,
            type
          )

        }
      }
    </script>
  </body>

</html>