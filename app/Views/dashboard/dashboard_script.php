<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

//------ INITIALIZATION

  $('#dashboard_table').DataTable({
    "paging": true,
    "lengthChange": false, 
    "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
    "searching": true,
    "ordering": false,
    "info": false,
    "autoWidth": false,
    "responsive": true,
  });

  }


</script>