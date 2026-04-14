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

    $('#employee_table').DataTable({
        "paging": true,
        "lengthChange": false, 
        "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
    
  });

  var loadFile1 = function(event) {
    var image = document.getElementById('output1');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile2 = function(event) {
    var image = document.getElementById('output2');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile3 = function(event) {
    var image = document.getElementById('output3');
    image.src = URL.createObjectURL(event.target.files[0]);
  };

  function search() {

    var pgbid = $('#search_pgbid').val();
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
          $('#search').html(html);

        }
      });
      return false;
    }
  }

  function search_name() {
    var lastname = $('#search_lastname').val();
    var firstname = $('#search_firstname').val();
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
          $('#search').html(html);

        }
      });
      return false;
    }
  }

  function s4() {
    var uniqueid = Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
    return uniqueid;
  }    
  
  function getTIN() {
    var e = document.getElementById("payee");
    var id = e.options[e.selectedIndex].value;

    alert(id);
    
    if (id) {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/getDetail/' + id,
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function (data) {          
          for (i = 0; i < data.length; i++) {
            document.getElementById("tin").value = data[i].tin.toUpperCase();
            document.getElementById("dept_code").value = data[i].dept_code.toUpperCase();
          }          
        }
      });

      return false;
    }
  }

//------ SEARCH FUNCTION

  function destroyDataTable(){
  if ( $.fn.dataTable.isDataTable('#employee_table') == true){ // verify if DataTable exists
    $('#employee_table').DataTable().destroy();
    }
  }
  function createDataTable(){
  // create only if DataTableDoes not exists
  if ( $.fn.dataTable.isDataTable('#employee_table') == false) { 
    $('#employee_table').DataTable({
      "paging": true,
          "lengthChange": false, 
          "lengthMenu": [[20, 40, 60, -1], [20, 40, 60, "All"]],
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
    } ); 
  }}

  function searchDept() {

    var searchDept = $('#searchDept').val();

    if (searchDept != "0") {  
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchByDept2/' + searchDept,
        method: "POST",
        data: {
          searchDept: searchDept
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          destroyDataTable();
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr style="line-height: 20px" ondblclick="gen_id(\''+ data[i].pgbid +'\''+')">';
            html += '<td>' + (i+1) + '</td>';
            html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
            html += '<td>' + data[i].unique_id.toUpperCase() + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].department.toUpperCase() + '</td>';
            html += '<td>' + data[i].position.toUpperCase() + '</td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '</tr>';
          }
          $('#search2').html(html);
          createDataTable();
        },
        error: function(ts) { alert(ts.responseText) } // or console.log(ts.responseText)
      });
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
            html += '<tr style="line-height: 20px" ondblclick="gen_id(\''+ data[i].pgbid +'\''+')">';
            html += '<td>' + (i+1) + '</td>';
            html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
            html += '<td>' + data[i].unique_id.toUpperCase() + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].department.toUpperCase() + '</td>';
            html += '<td>' + data[i].position.toUpperCase() + '</td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '</tr>';
          }
          $('#search2').html(html);
          createDataTable();
        },
            error: function(ts) { alert(ts.responseText) } // or console.log(ts.responseText)
      });
      return false;    
  }

  function gen_id(pgbid) {
    var url = '<?php echo base_url(); ?>/genid?id=' + pgbid;
    
    var params = [
    'height='+screen.height,
    'width='+screen.width,
    'toolbar=no',
    'menubar=no',
    'fullscreen=yes'].join(',');

    var popup = window.open(url, 'popup_window', params);
    popup.moveTo(0,0);
    return false;
  }

</script>