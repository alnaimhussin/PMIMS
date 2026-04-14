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
            url: "<?= base_url() ?>/Accounting/addBankAccount",
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
  
  function checkDuplicateBankCode(bank_code) {
    // showAlert("here");

    $.ajax({
      url: '<?php echo base_url(); ?>/Accounting/checkDuplicateBankCode/' + bank_code,
      method: "POST",
      data: {
        bank_code: bank_code
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate Bank Account Code !!!", data);
          document.getElementById("bank_code").className += " is-invalid";
        }else{
          document.getElementById("bank_code").className = document.getElementById("bank_code").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }

//------ BUTTON DISABLE FUNCTION

  function checkField() {    
    var bank_name = $('#bank_name').val();
    var account_name = $('#account_name').val();
    var account_number = $('#account_number').val();

    if (!bank_name) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!account_name) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!account_number) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
  }

  function disableButton() {
    // checkField();
    if ( document.getElementById("bank_name").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("account_name").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("account_number").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
  }
  

</script>