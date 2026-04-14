<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

const $deptSelect = $('#dept_code');
    const $targetForm = $('#userForm');
    
    console.log('Session Department ID:', SESSION_DEPT_ID);

    // Check if the user has a specific department ID (not empty/null, and not the Admin ID)
    if (SESSION_DEPT_ID && SESSION_DEPT_ID !== ADMIN_DEPT_ID) {
        
        // 1. Select the correct option
        $deptSelect.val(SESSION_DEPT_ID);
        
        // Check if the value was successfully selected (i.e., the option exists in the list)
        if ($deptSelect.val() === SESSION_DEPT_ID) {
            
            // 2. Disable the dropdown
            $deptSelect.prop('disabled', true);
            console.log('Department Select disabled successfully for Dept ID:', SESSION_DEPT_ID);
            
            // 3. Create and append the hidden input field
            // This ensures the value is sent when the form is submitted, as disabled fields are ignored.
            $('<input>').attr({
                type: 'hidden',
                name: 'dept_code', // Must match the original name
                value: SESSION_DEPT_ID
            }).appendTo($targetForm);
            
            console.log('Hidden input added to form#userForm.');
            
            // 4. (Optional) Run the checkJOID function if needed
            if (typeof checkJOID === 'function') {
                //  checkJOID(); 
            }

        } else {
            console.warn('Could not select department ID:', SESSION_DEPT_ID, 'in the dropdown. Option might be missing.');
        }

    } else {
        console.log('User is Admin (ID 0) or Department ID is missing. Dropdown remains enabled.');
    }

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
          // OR var formData = $(this).serialize();

          //We can add more values to form data
          //formData.append("key", "value");

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>/Employee/add",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
              tempID = data;

              var education = new Array();
              var eligibility = new Array();

              $('#education tr').each(function (row, tr) {
                  var education = {
                    'id_' : tempID,
                    'category': $(tr).find('td:eq(1)').text(),
                    'name_school': $(tr).find('td:eq(2)').text(),
                    'degree': $(tr).find('td:eq(3)').text(),
                    'level_earned': $(tr).find('td:eq(4)').text(),
                    'year_graduate': $(tr).find('td:eq(5)').text(),
                  }

                  $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>/Employee/addEducation/",
                    data: education,
                    success: function (data) {
                      // alert(data);
                    }
                  });      
              });

              $('#eligibility_table tr').each(function (row, tr) {              
                  var eligibility = {
                    'id_' : tempID,
                    'eligibility': $(tr).find('td:eq(1)').text(),
                    'license': $(tr).find('td:eq(2)').text(),
                    'validity': $(tr).find('td:eq(3)').text(),
                  }       

                  $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>/Employee/addEligibility/",
                    data: eligibility,
                    success: function (data) {
                      // alert(data);
                    }
                  });
              });
            },
            error: function (e) {
            }
          });     
          location.reload();
        }
      })
    });
  });

//------ UPDATE FUNCTION

  $(function () {
  // Ajax form submission with image
  $('#myFormUpdate').on('submit', function(e) {
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
        var form = document.getElementById('myFormUpdate');
        var formData = new FormData(form);
        var tempID = "";

        $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "<?= base_url() ?>/Employee/update",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function (data) {
            
            tempID = data;

            var education = new Array();
            var eligibility = new Array();

            $.ajax({
              type: "POST",
              url: "<?= base_url() ?>/Employee/deleteEducation/" + tempID,
              data: { tempID: tempID },
              success: function (data) {
                $('#v_education tr').each(function (row, tr) {
                    var education = {
                      'id_' : tempID,
                      'category': $(tr).find('td:eq(1)').text(),
                      'name_school': $(tr).find('td:eq(2)').text(),
                      'degree': $(tr).find('td:eq(3)').text(),
                      'level_earned': $(tr).find('td:eq(4)').text(),
                      'year_graduate': $(tr).find('td:eq(5)').text(),
                    }

                    $.ajax({
                      type: "POST",
                      url: "<?= base_url() ?>/Employee/updateEducation/",
                      data: education,
                      success: function (data) {
                      }
                    });      
                });
              }
            });   
            
            $.ajax({
              type: "POST",
              url: "<?= base_url() ?>/Employee/deleteEligibility/" + tempID,
              data: { tempID: tempID },
              success: function (data) {
                $('#v_eligibility_table tr').each(function (row, tr) {              
                    var eligibility = {
                      'id_' : tempID,
                      'eligibility': $(tr).find('td:eq(1)').text(),
                      'license': $(tr).find('td:eq(2)').text(),
                      'validity': $(tr).find('td:eq(3)').text(),
                    }       

                    $.ajax({
                      type: "POST",
                      url: "<?= base_url() ?>/Employee/updateEligibility/",
                      data: eligibility,
                      success: function (data) {
                      }
                    });
                });
              }
            }); 

          },
          error: function (e) {
            alert(e.toString());
          }
        });     

        Swal.fire(
          'Success!',
          'Successfully Updated Employee',
          'success'
        )
        
        setTimeout(function(){
        location.reload();
        }, 2500);
      }
    })
  });
  });


  function addPosition() {

    var form = document.getElementById('formPosition');
    var formData = new FormData(form);

    // alert("here");
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "<?= base_url() ?>/Master/addPosition",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
      swal.fire(
          'Save',
          data,
          'success'
        )
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/refreshPos',
        method: "POST",
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          html += '<option value="na" selected="selected">--</option>';
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].pos_code.toUpperCase() +'">' +  data[i].position.toUpperCase() + '</option>'
          }
          $('#pos_code').html(html);
        }
      });
      }
    }); 
  }

  function addProfession() {

    var form = document.getElementById('formProfession');
    var formData = new FormData(form);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "<?= base_url() ?>/Master/addProfession",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
      swal.fire(
          'Save',
          data,
          'success'
        )
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/refreshProf',
        method: "POST",
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          html += '<option value="na" selected="selected">--</option>';
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].prof_code.toUpperCase() +'">' +  data[i].profession.toUpperCase() + '</option>'
          }
          $('#prof_code').html(html);
        }
      });
      }
    }); 
  }

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


  function getLastID() {
          showAlert("warning","Duplicate PGB ID !!!");
    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/getLastID/',
      method: "POST",
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate PGB ID !!!",data);
        }else{
        }
      }
    });
  }

//------ CHECK JO ID

  function checkJOID() {
    var status = $('#status').val();
    var department = $('#dept_code').val();
    var pgbid = document.getElementById("pgbid");
    var pgbid_txt = "";
    var id_no = 0;
    var id_no2 = 0;

    if (status == "--") {
      pgbid.value = "";
    } else if (status == "JO") {
      pgbid.value = status;
      if (department != "--") {
        if (department < 10) {
          department = '0' + department;
        }
        pgbid.value = status+department;
        pgbid_txt = pgbid.value;
      }
    } else if (status == "Contractual") {
      pgbid.value = "CO";
      pgbid_txt = pgbid.value;
    } else {
      pgbid.value = "PGB";
      pgbid_txt = pgbid.value;
    }

    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/getIDNO/' + pgbid_txt,
      method: "POST",
      data: {
        pgbid_txt: pgbid_txt.toLowerCase()
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          id_no = parseInt(data.toString(), 10) + 1;
          if (id_no < 1000) { id_no2 = "0" + id_no }
          if (id_no < 100) { id_no2 = "00" + id_no }
          if (id_no < 10) { id_no2 = "000" + id_no }
        }else{
          id_no2 = "0001";
        }

        pgbid.value = pgbid_txt+"-"+id_no2;
        checkDuplicateID(pgbid.value)
      }
    });
    
  }

//------ CHECK DUPLICATE FUNCTION

  function checkDuplicateID(pgbid) {
    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/checkDuplicateID/' + pgbid,
      method: "POST",
      data: {
        pgbid: pgbid.toLowerCase()
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate PGB ID !!!",data);
          document.getElementById("pgbid").className += " is-invalid";
        }else{
          document.getElementById("pgbid").className = document.getElementById("pgbid").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }
  
  function checkDuplicateName(lastname, firstname, middlename) {

    if (middlename!=""){
      var str = middlename;
      var matches = str.match(/\b(\w)/g);
      var initial = matches.join('.');
      
      document.getElementById("initial").value = initial + ".";
    }    

    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/checkDuplicateName/' + lastname + "/" + firstname + "/" + middlename,
      method: "POST",
      data: {
        lastname: lastname.toLowerCase(),
        firstname: firstname.toLowerCase(),
        middlename: middlename.toLowerCase()
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate Name !!!",data);
          document.getElementById("lastname").className += " is-invalid";
          document.getElementById("firstname").className += " is-invalid";
          document.getElementById("middlename").className += " is-invalid";
        }else{
          document.getElementById("lastname").className = document.getElementById("lastname").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
          document.getElementById("firstname").className = document.getElementById("firstname").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
          document.getElementById("middlename").className = document.getElementById("middlename").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }

//------ BUTTON DISABLE FUNCTION

  function checkField() {    
    var lastname = $('#lastname').val();
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();
    var nickname = $('#nickname').val();

    var status = $('#status').val();
    var dept_code = $('#dept_code').val();
    var pos_code = $('#pos_code').val();
    var sg_code = $('#sg_code').val();
    var pgbid = $('#pgbid').val();
    
    var e_lastname = $('#e_lastname').val();
    var e_firstname = $('#e_firstname').val();
    var e_middlename = $('#e_middlename').val();
    var e_contact = $('#e_contact').val();

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
    if ( document.getElementById("lastname").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("birthdate").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("pgbid").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
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

  function search() {
    var searchDept = $('#searchDept').val();
    var searchPos = $('#searchPos').val();

          // alert(searchDept)
    if (searchDept != "0") {      
        if (searchPos != 0) {
          $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchByDeptPos/' + searchDept + "/" + searchPos,
            method: "POST",
            data: {
              searchDept: searchDept,
              searchPos: searchPos
            },
            async: true,
            dataType: 'json',
            success: function (data) {
              destroyDataTable();
              var html = '';
              var i;
              var n=1;
              for (i = 0; i < data.length; i++) {
                html += '<tr style="line-height: 20px" ondblclick="viewDetail('+ data[i]._id +')">';
                html += '<td class="pl-3">' + n + '</td>';
                html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
                html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[
                  i].middlename.toUpperCase() + '</b></td>'
                html += '<td>' + data[i].nickname.toUpperCase() + '</td>';
                html += '<td>' + data[i].gender.toUpperCase() + '</td>';
                html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
                html += '<td>' + data[i].department.toUpperCase() + '</td>';
                if (data[i].position.toUpperCase() != "--") {
                html += '<td>' + data[i].position.toUpperCase() + '<b>( ' + data[i].pos_code.toUpperCase() + ' )</b></td>';
                } else {
                html += '<td></td>';
                }
                if (data[i].sg_code.toUpperCase() != "--") {
                html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
                } else {
                html += '<td></td>';
                }
                html += '<td>' + data[i].status.toUpperCase() + '</td>';
                html += '</tr>';
                n=n+1;
              }
              $('#search').html(html);
              createDataTable();
            }
          });
          return false;
        } else {
          $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchByDept/' + searchDept,
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
              var n=1;
              for (i = 0; i < data.length; i++) {
                html += '<tr style="line-height: 20px" ondblclick="viewDetail('+ data[i]._id +')">';
                html += '<td class="pl-3">' + n + '</td>';
                html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
                html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[
                  i].middlename.toUpperCase() + '</b></td>'
                html += '<td>' + data[i].nickname.toUpperCase() + '</td>';
                html += '<td>' + data[i].gender.toUpperCase() + '</td>';
                html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
                html += '<td>' + data[i].department.toUpperCase() + '</td>';
                if (data[i].position.toUpperCase() != "--") {
                html += '<td>' + data[i].position.toUpperCase() + '<b>( ' + data[i].pos_code.toUpperCase() + ' )</b></td>';
                } else {
                html += '<td></td>';
                }
                if (data[i].sg_code.toUpperCase() != "--") {
                html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
                } else {
                html += '<td></td>';
                }
                html += '<td>' + data[i].status.toUpperCase() + '</td>';
                html += '</tr>';
                n=n+1;
              }
              $('#search').html(html);
              createDataTable();
            }
          });
          return false;
        }
    } else if (searchPos != "0") {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchByPos/' + searchPos,
        method: "POST",
        data: {
          searchPos: searchPos
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          destroyDataTable();
          var html = '';
          var i;
          var n=1;
          for (i = 0; i < data.length; i++) {
            html += '<tr style="line-height: 20px" ondblclick="viewDetail('+ data[i]._id +')">';
            html += '<td class="pl-3">' + n + '</td>';
            html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[
              i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].nickname.toUpperCase() + '</td>';
            html += '<td>' + data[i].gender.toUpperCase() + '</td>';
            html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
            html += '<td>' + data[i].department.toUpperCase() + '</td>';
            if (data[i].position.toUpperCase() != "--") {
            html += '<td>' + data[i].position.toUpperCase() + '<b>( ' + data[i].pos_code.toUpperCase() + ' )</b></td>';
            } else {
            html += '<td></td>';
            }
            if (data[i].sg_code.toUpperCase() != "--") {
            html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
            } else {
            html += '<td></td>';
            }
            html += '<td>' + data[i].status.toUpperCase() + '</td>';
            html += '</tr>';
            n=n+1;
          }
          $('#search').html(html);
          createDataTable();
        }
      });
      return false;
    }

  }
  
  function searchAll() {    
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchAll/',
        method: "POST",
        async: true,
        dataType: 'json',
        success: function (data) {
          destroyDataTable();
          var html = '';
          var i;
          var n=1;
          for (i = 0; i < data.length; i++) {
            html += '<tr style="line-height: 20px" ondblclick="viewDetail('+ data[i]._id +')">';
            html += '<td class="pl-3">' + n + '</td>';
            html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
            html += '<td><b>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[
              i].middlename.toUpperCase() + '</b></td>'
            html += '<td>' + data[i].nickname.toUpperCase() + '</td>';
            html += '<td>' + data[i].gender.toUpperCase() + '</td>';
            html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
            html += '<td>' + data[i].department.toUpperCase() + '</td>';
            if (data[i].position.toUpperCase() != "--") {
            html += '<td>' + data[i].position.toUpperCase() + '<b>( ' + data[i].pos_code.toUpperCase() + ' )</b></td>';
            } else {
            html += '<td></td>';
            }
            if (data[i].sg_code.toUpperCase() != "--") {
            html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
            } else {
            html += '<td></td>';
            }
            html += '<td>' + data[i].status.toUpperCase() + '</td>';
            html += '</tr>';
            n=n+1;
          }
          $('#search').html(html);
          createDataTable();
        }
      });

      document.getElementById("defaultDept").selected = "true";
      document.getElementById("defaultPos").selected = "true";
      return false;    
  }

  function clearDetail() {
    document.getElementById("v_lastname").value = "";
    document.getElementById("v_firstname").value = "";
    document.getElementById("v_middlename").value = "";
    document.getElementById("v_initial").value = "";
    document.getElementById("v_nickname").value = "";
    document.getElementById("v_birthdate").value = "";
    document.getElementById("v_birthplace").value = "";
    $("#v_gender").val(data[i].gender).trigger('change');
    $("#v_civilstatus").val(data[i].civilstatus).trigger('change');
    $("#v_prof_code").val(data[i].prof_code).trigger('change');
    document.getElementById("v_exname").value = "";
    document.getElementById("v_height").value = "";
    document.getElementById("v_weight").value = "";
    document.getElementById("v_bloodtype").value = "";
    document.getElementById("v_contact").value = "";
    document.getElementById("v_email").value = "";
    
    document.getElementById("v_gsis").value = "";
    document.getElementById("v_pagibig").value = "";
    document.getElementById("v_philhealth").value = "";
    document.getElementById("v_sss").value = "";
    document.getElementById("v_tin").value = "";
    
    $("#v_status").val(data[i].status).trigger('change');
    $("#v_dept_code").val(data[i].dept_id).trigger('change');
    $("#v_pos_code").val(data[i].pos_code).trigger('change');
    $("#v_sg_code").val(data[i].sg_code).trigger('change');
    document.getElementById("v_pgbid").value = "";
    
    document.getElementById("v_e_lastname").value = "";
    document.getElementById("v_e_firstname").value = "";
    document.getElementById("v_e_middlename").value = "";
    $("#v_e_relation").val(data[i].e_relation).trigger('change');
    document.getElementById("v_e_extname").value = "";
    document.getElementById("v_e_contact").value = "";
    
    document.getElementById("v_r_lot").value = "";
    document.getElementById("v_r_street").value = "";
    document.getElementById("v_r_village").value = "";
    $("#v_r_province").val(data[i].r_province).trigger('change');
    $("#v_r_citymunicipal").val(data[i].r_citymunicipal).trigger('change');
    document.getElementById("v_r_barangay").value = "";
    
    document.getElementById("v_p_lot").value = "";
    document.getElementById("v_p_street").value = "";
    document.getElementById("v_p_village").value = "";
    $("#v_p_province").val(data[i].p_province).trigger('change');
    $("#v_p_citymunicipal").val(data[i].p_citymunicipal).trigger('change');
    document.getElementById("v_p_barangay").value = "";
  }

  function viewDetail(id) {
    $.ajax({
      url: '<?php echo base_url(); ?>/dynamic/viewDetail/' + id,
      method: "POST",
      data: {
        id: id
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data.length == 0) {
          swal.fire(
              'Warning',
              'Incomplete details.',
              'warning'
            )
        }
        for (i = 0; i < data.length; i++) {
          
          document.getElementById("v_id").value = data[i]._id.toUpperCase();
          document.getElementById("v_lastname").value = data[i].lastname.toUpperCase();
          document.getElementById("v_firstname").value = data[i].firstname.toUpperCase();
          document.getElementById("v_middlename").value = data[i].middlename.toUpperCase();
          document.getElementById("v_initial").value = data[i].initial.toUpperCase();
          document.getElementById("v_nickname").value = data[i].nickname.toUpperCase();
          document.getElementById("v_birthdate").value = data[i].birthdate.toUpperCase();
          document.getElementById("v_birthplace").value = data[i].birthplace.toUpperCase();
          $("#v_gender").val(data[i].gender).trigger('change');
          $("#v_civilstatus").val(data[i].civilstatus).trigger('change');
          $("#v_prof_code").val(data[i].prof_code.toUpperCase()).trigger('change');
          document.getElementById("v_exname").value = data[i].exname.toUpperCase();
          document.getElementById("v_height").value = data[i].height.toUpperCase();
          document.getElementById("v_weight").value = data[i].weight.toUpperCase();
          document.getElementById("v_bloodtype").value = data[i].bloodtype.toUpperCase();
          document.getElementById("v_contact").value = data[i].contact.toUpperCase();
          document.getElementById("v_email").value = data[i].email;
          
          document.getElementById("v_gsis").value = data[i].gsis.toUpperCase();
          document.getElementById("v_pagibig").value = data[i].pagibig.toUpperCase();
          document.getElementById("v_philhealth").value = data[i].philhealth.toUpperCase();
          document.getElementById("v_sss").value = data[i].sss.toUpperCase();
          document.getElementById("v_tin").value = data[i].tin.toUpperCase();
          
          $("#v_status").val(data[i].status).trigger('change');
          $("#v_dept_code").val(data[i].dept_id).trigger('change');
          $("#v_pos_code").val(data[i].pos_id).trigger('change');
          $("#v_sg_code").val(data[i].sg_code).trigger('change');
          document.getElementById("v_pgbid").value = data[i].pgbid.toUpperCase();
          
          document.getElementById("v_e_lastname").value = data[i].e_lastname.toUpperCase();
          document.getElementById("v_e_firstname").value = data[i].e_firstname.toUpperCase();
          document.getElementById("v_e_middlename").value = data[i].e_middlename.toUpperCase();
          $("#v_e_relation").val(data[i].e_relation).trigger('change');
          document.getElementById("v_e_extname").value = data[i].e_extname.toUpperCase();
          document.getElementById("v_e_contact").value = data[i].e_contact.toUpperCase();
          
          document.getElementById("v_r_lot").value = data[i].r_lot.toUpperCase();
          document.getElementById("v_r_street").value = data[i].r_street.toUpperCase();
          document.getElementById("v_r_village").value = data[i].r_village.toUpperCase();
          $("#v_r_province").val(data[i].r_province).trigger('change');
          $("#v_r_citymunicipal").val(data[i].r_citymunicipal).trigger('change');
          document.getElementById("v_r_barangay").value = data[i].r_barangay.toUpperCase();
          
          document.getElementById("v_p_lot").value = data[i].p_lot.toUpperCase();
          document.getElementById("v_p_street").value = data[i].p_street.toUpperCase();
          document.getElementById("v_p_village").value = data[i].p_village.toUpperCase();
          $("#v_p_province").val(data[i].p_province).trigger('change');
          $("#v_p_citymunicipal").val(data[i].p_citymunicipal).trigger('change');
          document.getElementById("v_p_barangay").value = data[i].p_barangay.toUpperCase();
        }
      },
      timeout: 5000 // sets timeout to 5 seconds
    });    

    $.ajax({
      url: '<?php echo base_url(); ?>/dynamic/viewDetailEducation/' + id,
      method: "POST",
      data: {
        id: id
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data.length == 0) {
          swal.fire(
              'Warning',
              'Incomplete details.',
              'warning'
            )
        }
        var html = '';
        var i;

        for (i = 0; i < data.length; i++) {
            html += '<tr>';
            html += '<td><input type="checkbox" name="record"></td>';
            html += '<td>' + data[i].category.toUpperCase() + '</td>';
            html += '<td>' + data[i].name_school.toUpperCase() + '</td>'
            html += '<td>' + data[i].degree.toUpperCase() + '</td>';
            html += '<td>' + data[i].level_earned.toUpperCase() + '</td>';
            html += '<td>' + data[i].year_graduate.toUpperCase() + '</td>';
            html += '</tr>';
        }
        $('#v_education').html(html); 
      },
      timeout: 5000 // sets timeout to 5 seconds
    });  

    $.ajax({
      url: '<?php echo base_url(); ?>/dynamic/viewDetailEligibility/' + id,
      method: "POST",
      data: {
        id: id
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        // alert(data.length);
        if (data.length == 0) {
          swal.fire(
              'Warning',
              'Incomplete details.',
              'warning'
            )
        }
        var html = '';
        var i;

        for (i = 0; i < data.length; i++) {
            html += '<tr>';
            html += '<td><input type="checkbox" name="record"></td>';
            html += '<td>' + data[i].eligibility.toUpperCase() + '</td>';
            html += '<td>' + data[i].license.toUpperCase() + '</td>'
            html += '<td>' + data[i].validity.toUpperCase() + '</td>';
            html += '</tr>';
        }
        $('#v_eligibility_table').html(html); 
      },
      timeout: 5000 // sets timeout to 5 seconds
    });  

    $('.nav-tabs a[href="#v_employee_information"]').tab('show');
    $('#modal-view').modal('show');
  }


</script>