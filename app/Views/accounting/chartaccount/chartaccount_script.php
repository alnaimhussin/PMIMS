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

//------ ADD DELETE ROW FUNCTION

    $(".add-row-education").click(function () {
      
      var name_school = document.getElementById("name_school");
      var degree = document.getElementById("degree");
      var level_earned = document.getElementById("level_earned");
      var year_graduate = document.getElementById("year_graduate");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + category.value.toUpperCase() + "</td>"+
                   "<td name='td(2)'>" + name_school.value.toUpperCase() + "</td>"+
                   "<td name='td(3)'>" + degree.value.toUpperCase() + "</td>"+
                   "<td name='td(4)'>" + level_earned.value.toUpperCase() + "</td>"+
                   "<td name='td(5)'>" + year_graduate.value.toUpperCase() + "</td>"+
                   "</tr>";
      
      $("#education").append(markup);

      category.selectedIndex = 0;
      name_school.value = "";
      degree.value = "";
      level_earned.value = "";
      year_graduate.value = "";
      
    });

    $(".delete-row-education").click(function () {
      $("#education").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });
    
    $(".v_add-row-education").click(function () {
      
      var category = document.getElementById("v_category");
      var name_school = document.getElementById("v_name_school");
      var degree = document.getElementById("v_degree");
      var level_earned = document.getElementById("v_level_earned");
      var year_graduate = document.getElementById("v_year_graduate");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + category.value.toUpperCase() + "</td>"+
                   "<td name='td(2)'>" + name_school.value.toUpperCase() + "</td>"+
                   "<td name='td(3)'>" + degree.value.toUpperCase() + "</td>"+
                   "<td name='td(4)'>" + level_earned.value.toUpperCase() + "</td>"+
                   "<td name='td(5)'>" + year_graduate.value.toUpperCase() + "</td>"+
                   "</tr>";
      
      $("#v_education").append(markup);

      category.selectedIndex = 0;
      name_school.value = "";
      degree.value = "";
      level_earned.value = "";
      year_graduate.value = "";
      
    });

    $(".v_delete-row-education").click(function () {
      $("#v_education").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });

    $(".add-row-eligibility").click(function () {
      var eligibility = document.getElementById("eligibility");
      var licensenumber = document.getElementById("licensenumber");
      var validity = document.getElementById("validity");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + eligibility.value.toUpperCase() + "</td>"+
                   "<td name='td(2)'>" + licensenumber.value.toUpperCase() + "</td>"+
                   "<td name='td(3)'>" + validity.value.toUpperCase() + "</td>"+
                   "</tr>";

      $("#eligibility_table").append(markup);

      eligibility.value = "";
      licensenumber.value = "";
      validity.value = "";
    });

    // Find and remove selected table rows
    $(".delete-row-eligibility").click(function () {
      $("#eligibility_table").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });
    
    $(".v_add-row-eligibility").click(function () {
      var eligibility = document.getElementById("v_eligibility");
      var licensenumber = document.getElementById("v_licensenumber");
      var validity = document.getElementById("v_validity");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + eligibility.value.toUpperCase() + "</td>"+
                   "<td name='td(2)'>" + licensenumber.value.toUpperCase() + "</td>"+
                   "<td name='td(3)'>" + validity.value.toUpperCase() + "</td>"+
                   "</tr>";

      $("#v_eligibility_table").append(markup);

      eligibility.value = "";
      licensenumber.value = "";
      validity.value = "";
    });

    // Find and remove selected table rows
    $(".v_delete-row-eligibility").click(function () {
      $("#v_eligibility_table").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });

    $("#modal-add").on("hidden.bs.modal", function () {
      // $('#myForm')[0].reset();
    });
  });

//------ SAVE FUNCTION

  $(function () {
    // Ajax form submission with image
    $('#myForm').on('submit', function(e) {

      swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        reverseButtons: false
      }).then((result) => {
        if (result.dismiss === Swal.DismissReason.cancel) {
          swal.fire(
            'Cancelled',
            'Save cancelled',
            'error'
          )
        } else {

          e.preventDefault();
          // Get form
          var form = document.getElementById('myForm');
          var formData = new FormData(form);
          var tempID = '';

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>/Accounting/addAccount",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
              tempID = data;
            },
            error: function (e) {
            }
          });     
          location.reload();
        }
      })
    });
  });

//------ CHECK FORMAT FUNCTION

  function checkFormatDate(thisDate) {
    var arr = thisDate.split('-');
    if (arr[0]>12) {
      showAlert("warning","Incorrect Format !!!","Incorrect month.");
      document.getElementById("birthdate").className += " is-invalid";
    }else if (arr[1]>31) {
      showAlert("warning","Incorrect Format !!!","Incorrect day.");
      document.getElementById("birthdate").className += " is-invalid";
    } else {
      document.getElementById("birthdate").className = document.getElementById("birthdate").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
    }
    disableButton();
  }

//------ CHECK DUPLICATE FUNCTION
  
  function checkDuplicateAccountCode(account_code) {

    $.ajax({
      url: '<?php echo base_url(); ?>/Accounting/checkDuplicateAccountCode/' + account_code,
      method: "POST",
      data: {
        account_code: account_code
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate Account Code !!!", data);
          document.getElementById("account_code").className += " is-invalid";
        }else{
          document.getElementById("account_code").className = document.getElementById("account_code").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }

//------ BUTTON DISABLE FUNCTION

  function checkField() {    
    var account_code = $('#account_code').val();
    var account_type = $('#account_type').val();
    var account_title = $('#account_title').val();
    var account_desc = $('#account_desc').val();

    if (!lastname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!firstname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!middlename) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!nickname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
  }

  function disableButton() {
    // checkField();
    if ( document.getElementById("account_code").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("account_type").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("account_title").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("account_desc").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
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

</script>