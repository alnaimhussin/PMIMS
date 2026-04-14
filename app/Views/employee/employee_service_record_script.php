<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

    //------ INITIALIZATION

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('.datemask').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
      //Date range picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      
    $('#service_record_table').DataTable({
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

  function destroyDataTable(){
  if ( $.fn.dataTable.isDataTable('#service_record_table') == true){ // verify if DataTable exists
    $('#service_record_table').DataTable().destroy();
    }
  }

  function createDataTable(){
  // create only if DataTableDoes not exists
  if ( $.fn.dataTable.isDataTable('#service_record_table') == false) { 
    $('#service_record_table').DataTable({
      "paging": true,
      "lengthChange": false, 
      "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    } ); 
  }}


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

      document.getElementById("search_employee_id").value = "";
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

          document.getElementById("search_employee_last_name").value = "";
          document.getElementById("search_employee_first_name").value = "";
        }
      });

      return false;
    }
  }

  function getDetail(id) {
    if (id) {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/getDetail/' + id,
        method: "POST",
        data: {id: id},
        async: true,
        dataType: 'json',
        success: function (data) {
          var i;
          
          for (i = 0; i < data.length; i++) {

            document.getElementById("employeeName").value = data[i].lastname.toUpperCase() + ", " + data[i].firstname.toUpperCase() + ", " + data[i].middlename.toUpperCase();
            document.getElementById("department").value = data[i].department.toUpperCase();
            document.getElementById("position").value = data[i].position.toUpperCase();
            document.getElementById("sg_code").value = data[i].sg_code.toUpperCase();     
            document.getElementById("status").value = data[i].status.toUpperCase();         
            document.getElementById("id_").value = id;                
          }
          
        },
      timeout: 5000 // sets timeout to 5 seconds
      });

      $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchServiceRecord/' + id,
            method: "POST",
            data: {id: id},
            async: true,
            dataType: 'json',
            success: function (data) {
              // destroyDataTable();
              var html = '';
              var i;
              var n=1;
              for (i = 0; i < data.length; i++) {
              // alert(data[i].position_title.toUpperCase());
                html += '<tr style="line-height: 20px">';
                html += '<td>' + data[i].startDate + ' - ' + data[i].endDate + '</td>';
                html += '<td>' + data[i].position_title.toUpperCase() + '</td>';
                html += '<td>' + data[i].sg_step.toUpperCase() + '</td>';
                html += '<td>' + data[i].monthly_salary.toUpperCase() + '</td>';
                html += '<td>' + data[i].appointment_status.toUpperCase() + '</td>';
                html += '<td>' + data[i].department_agency.toUpperCase() + '</td>';
                // html += '<td>' + data[i].remarks.toUpperCase() + '</td>';
                html += '<td><button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></button></td>';
                html += '</tr>';
                
                n=n+1;
              }
              $('#search').html(html);
              // createDataTable();
            }
          });
      return false;
    }
  }

  function saveMe(){
    alert(document.getElementById("startDate").value + ' - ' + document.getElementById("endDate").value);
    alert(document.getElementById("position_title").value);
    alert(document.getElementById("sg_step").value);
    alert(document.getElementById("monthly_salary").value);
    alert(document.getElementById("appointment_status").value);
    alert(document.getElementById("department_agency").value);
    alert(document.getElementById("remarks").value);
    alert(document.getElementById("uploadFile").value);
  }

  //UPLOAD FORM FOR ENCODER SIDE
  $(function () {

    // Ajax form submission
    $('#uploadForm').on('submit', function(e) {

      // alert('here');
      // const fileInput = document.getElementById('uploadFile');
      // const file = fileInput.files[0];
      // const maxSize = 10 * 1024 * 1024; // 10MB in bytes
      
      var id = document.getElementById('id_').value;

      e.preventDefault();
      
        // Get form
        var form = document.getElementById('uploadForm');
        var formData = new FormData(form);
        const currentDate = new Date();

        $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "<?= base_url() ?>/Employee/addServiceRecord",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function (data) {
            alert('Service recorded successfully.');
            // location.reload();
          },
          error: function (e) {
          }
        });
        // alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchServiceRecord/' + id,
            method: "POST",
            data: {id: id},
            async: true,
            dataType: 'json',
            success: function (data) {
              // alert('here 2');
              // destroyDataTable();
              var html = '';
              var i;
              var n=1;
              for (i = 0; i < data.length; i++) {
              // alert(data[i].position_title.toUpperCase());
                html += '<tr style="line-height: 20px">';
                html += '<td>' + data[i].startDate + ' - ' + data[i].endDate + '</td>';
                html += '<td>' + data[i].position_title.toUpperCase() + '</td>';
                html += '<td>' + data[i].sg_step.toUpperCase() + '</td>';
                html += '<td>' + data[i].monthly_salary.toUpperCase() + '</td>';
                html += '<td>' + data[i].appointment_status.toUpperCase() + '</td>';
                html += '<td>' + data[i].department_agency.toUpperCase() + '</td>';
                // html += '<td>' + data[i].remarks.toUpperCase() + '</td>';
                html += '<td><button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></button></td>';
                html += '</tr>';                
                n=n+1;
              }
              $('#search').html(html);
              // createDataTable();
            }
        });
    })
  });

</script>