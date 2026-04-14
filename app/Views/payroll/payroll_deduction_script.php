<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

    
  });

  function searchID() {
    var pgbid = $('#search_employee_id').val();
    if (pgbid) {
      // alert(pgbid);
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/search_pgbid/' + pgbid,
        method: "POST",
        data: {
          pgbid: pgbid
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr ondblclick="getDetail(' + data[i]._id + ')">';
            html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' +
              data[i].middlename.toUpperCase() + '</td><td>' + data[i].department.toUpperCase() + '</td>';
            html += '</tr>';
          }
          $('#search_table').html(html);

        }
      });
      return false;
    }
  }

  function searchName() {
    var lastname = $('#search_employee_last_name').val();
    var firstname = $('#search_employee_first_name').val();
    if (lastname) {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/search_name/' + lastname + '/' + firstname,
        method: "POST",
        data: {
          lastname: lastname,
          firstname: firstname
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr ondblclick="getDetail(' + data[i]._id + ')">';
            html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' +
              data[i].middlename.toUpperCase() + '</td><td>' + data[i].department.toUpperCase() + '</td>';
            html += '</tr>';
          }
          $('#search_table').html(html);

        }
      });
      return false;
    }
  }

</script>