<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

//------ INITIALIZATION
    
    $('#user_table').DataTable({
      "paging": true,
      "lengthChange": false, 
      "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function () {
    
    // Ajax form submission
    $('#userForm').on('submit', function(e) {

      e.preventDefault();
          
          // Get form
          var form = document.getElementById('userForm');
          var formData = new FormData(form);
          var tempID = '';
          
          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>/Users/add",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
              // alert(data);
              tempID = data;
            
            }});
            
          location.reload();
        });
  });


</script>