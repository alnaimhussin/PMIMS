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

    $('#payroll_table').DataTable({
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

//------ SEARCH FUNCTION

  function destroyDataTable(){
  if ( $.fn.dataTable.isDataTable('#payroll_table') == true){ // verify if DataTable exists
    $('#payroll_table').DataTable().destroy();
    }
  }
  function createDataTable(){
  // create only if DataTableDoes not exists
  if ( $.fn.dataTable.isDataTable('#payroll_table') == false) { 
    $('#payroll_table').DataTable({
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

  function searchDept() {

    var searchDept = $('#searchDept').val();

          // alert(searchDept)

    if (searchDept != "0") {  
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchByDept/' + searchDept,
        method: "POST",
        data: {
          searchDept: searchDept
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          // alert("success")
          destroyDataTable();
          // alert("table destroyed")
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr style="line-height: 20px" ondblclick="">';
            html += '<td>' + (i+1) + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].position.toUpperCase() + '</td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '</tr>';
          }
          $('#search').html(html);
          createDataTable();
          // alert("table created")
        },
        error: function(ts) { alert(ts.responseText) } // or console.log(ts.responseText)
      });
      
        
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchDeptHead/' + searchDept,
        method: "POST",
        data: {
          searchDept: searchDept
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          var head = '';
          var i;
          for (i = 0; i < data.length; i++) {
            head += data[i].head.toUpperCase();
            document.getElementById("selectHead").textContent = head;
          }
        },
        error: function(ts) { alert(ts.responseText) } // or console.log(ts.responseText)
      });

      var value = $( "#searchDept option:selected" ).text();
      document.getElementById("selectDept").textContent = value;

      document.getElementById("defaultDept").selected = "true";
      return false;
    }
  }
  
  function searchAll() {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchAll2/',
        method: "POST",
        async: true,
        dataType: 'json',
        success: function (data) {
          destroyDataTable();
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr style="line-height: 20px" ondblclick="">';
            html += '<td>' + (i+1) + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].position.toUpperCase() + '</td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '</tr>';
          }
          $('#search').html(html);
          createDataTable();
        },
            error: function(ts) { alert(ts.responseText) } // or console.log(ts.responseText)
      });
      return false;    
  }

</script>