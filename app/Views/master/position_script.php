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

  $('#position_table').DataTable({
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

function addPositionText() {
  let position = $('#position').val();
  let sub_position = $('#sub_position').val();

  let split_position = position.split(" ");
  let split_sub_position = sub_position.split(" ");

  let code_position = "";

  for (let i = 0; i < split_position.length; i++) {
    if (split_position[0,i]=="I" || split_position[0,i]=="i") {
    code_position = code_position + '1';
    } else if (split_position[0,i]=="II" || split_position[0,i]=="ii") {
    code_position = code_position + '2';
    } else if (split_position[0,i]=="III" || split_position[0,i]=="iii") {
    code_position = code_position + '3';
    } else if (split_position[0,i]=="IV" || split_position[0,i]=="iv") {
    code_position = code_position + '4';
    } else if (split_position[0,i]=="V" || split_position[0,i]=="v") {
    code_position = code_position + '5';
    } else if (split_position[0,i]=="VI" || split_position[0,i]=="vi") {
    code_position = code_position + '6';
    } else if (split_position[0,i]=="VII" || split_position[0,i]=="vii") {
    code_position = code_position + '7';
    } else if (split_position[0,i]=="ASSISTANT" || split_position[0,i]=="assistant") {
    code_position = code_position + "AST";
    } else if (split_position[0,i]=="SECRETARY" || split_position[0,i]=="secretary") {
    code_position = code_position + "SECY";
    } else if (split_position[0,i]=="DRRM" || split_position[0,i]=="drrm") {
    code_position = code_position + "DRRM";
    } else {
    code_position = code_position + split_position[0,i].slice(0,1);
    }
  }

  if (sub_position) {
    code_position = code_position + "-";
  }

  for (let i = 0; i < split_sub_position.length; i++) {
    if (split_sub_position[0,i]=="I" || split_sub_position[0,i]=="i") {
    code_position = code_position + '1';
    } else if (split_sub_position[0,i]=="II" || split_sub_position[0,i]=="ii") {
    code_position = code_position + '2';
    } else if (split_sub_position[0,i]=="III" || split_sub_position[0,i]=="iii") {
    code_position = code_position + '3';
    } else if (split_sub_position[0,i]=="IV" || split_sub_position[0,i]=="iv") {
    code_position = code_position + '4';
    } else if (split_sub_position[0,i]=="V" || split_sub_position[0,i]=="v") {
    code_position = code_position + '5';
    } else if (split_sub_position[0,i]=="VI" || split_sub_position[0,i]=="vi") {
    code_position = code_position + '6';
    } else if (split_sub_position[0,i]=="VII" || split_sub_position[0,i]=="vii") {
    code_position = code_position + '7';
    } else if (split_sub_position[0,i]=="ASSISTANT" || split_sub_position[0,i]=="assistant") {
    code_position = code_position + "AST";
    } else if (split_sub_position[0,i]=="SECRETARY" || split_sub_position[0,i]=="secretary") {
    code_position = code_position + "SECY";
    } else if (split_sub_position[0,i]=="DRRM" || split_sub_position[0,i]=="drrm") {
    code_position = code_position + "DRRM";
    } else {
    code_position = code_position + split_sub_position[0,i].slice(0,1);
    }
  }

  if (position) {
    if (sub_position) {
      position = position + " ";
      sub_position = "(" + sub_position + ")";
      full_position = position + sub_position;
      
      document.getElementById("description").value = full_position;
    } else {
      document.getElementById("description").value = position;
    }
  }
  document.getElementById("pos_code").value = code_position;
    return false;
}


function addPositionTextv() {
  let position = $('#v_position').val();
  let sub_position = $('#v_sub_position').val();

  let split_position = position.split(" ");
  let split_sub_position = sub_position.split(" ");

  let code_position = "";

  for (let i = 0; i < split_position.length; i++) {
    if (split_position[0,i]=="I" || split_position[0,i]=="i") {
    code_position = code_position + '1';
    } else if (split_position[0,i]=="II" || split_position[0,i]=="ii") {
    code_position = code_position + '2';
    } else if (split_position[0,i]=="III" || split_position[0,i]=="iii") {
    code_position = code_position + '3';
    } else if (split_position[0,i]=="IV" || split_position[0,i]=="iv") {
    code_position = code_position + '4';
    } else if (split_position[0,i]=="V" || split_position[0,i]=="v") {
    code_position = code_position + '5';
    } else if (split_position[0,i]=="VI" || split_position[0,i]=="vi") {
    code_position = code_position + '6';
    } else if (split_position[0,i]=="VII" || split_position[0,i]=="vii") {
    code_position = code_position + '7';
    } else if (split_position[0,i]=="ASSISTANT" || split_position[0,i]=="assistant") {
    code_position = code_position + "AST";
    } else if (split_position[0,i]=="SECRETARY" || split_position[0,i]=="secretary") {
    code_position = code_position + "SECY";
    } else if (split_position[0,i]=="DRRM" || split_position[0,i]=="drrm") {
    code_position = code_position + "DRRM";
    } else {
    code_position = code_position + split_position[0,i].slice(0,1);
    }
  }

  if (sub_position) {
    code_position = code_position + "-";
  }

  for (let i = 0; i < split_sub_position.length; i++) {
    if (split_sub_position[0,i]=="I" || split_sub_position[0,i]=="i") {
    code_position = code_position + '1';
    } else if (split_sub_position[0,i]=="II" || split_sub_position[0,i]=="ii") {
    code_position = code_position + '2';
    } else if (split_sub_position[0,i]=="III" || split_sub_position[0,i]=="iii") {
    code_position = code_position + '3';
    } else if (split_sub_position[0,i]=="IV" || split_sub_position[0,i]=="iv") {
    code_position = code_position + '4';
    } else if (split_sub_position[0,i]=="V" || split_sub_position[0,i]=="v") {
    code_position = code_position + '5';
    } else if (split_sub_position[0,i]=="VI" || split_sub_position[0,i]=="vi") {
    code_position = code_position + '6';
    } else if (split_sub_position[0,i]=="VII" || split_sub_position[0,i]=="vii") {
    code_position = code_position + '7';
    } else if (split_sub_position[0,i]=="ASSISTANT" || split_sub_position[0,i]=="assistant") {
    code_position = code_position + "AST";
    } else if (split_sub_position[0,i]=="SECRETARY" || split_sub_position[0,i]=="secretary") {
    code_position = code_position + "SECY";
    } else if (split_sub_position[0,i]=="DRRM" || split_sub_position[0,i]=="drrm") {
    code_position = code_position + "DRRM";
    } else {
    code_position = code_position + split_sub_position[0,i].slice(0,1);
    }
  }

  if (position) {
    if (sub_position) {
      position = position + " ";
      sub_position = "(" + sub_position + ")";
      full_position = position + sub_position;
      
      document.getElementById("v_description").value = full_position;
    } else {
      document.getElementById("v_description").value = position;
    }
  }
  document.getElementById("v_pos_code").value = code_position;
    return false;
}

//------ UPDATE FUNCTION

$(function () {
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
        var form = document.getElementById('myFormUpdate');
        var formData = new FormData(form);
        var tempID = "";

        $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "<?= base_url() ?>/Master/updatePosition",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function (data) {
            Swal.fire(
              'Success!',
              'Successfully Updated Position',
              'success'
            )
          },
          error: function (e) {
            alert(e.toString());
          }
        });     
        
        setTimeout(function(){
        location.reload();
        }, 2500);
      }
    })
  });
});

  function viewPosition(id) {
    $.ajax({
      url: '<?php echo base_url(); ?>/dynamic/viewPosition/' + id,
      method: "POST",
      data: {
        id: id
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        for (i = 0; i < data.length; i++) {
          document.getElementById("v_id").value = data[i].id.toUpperCase();
          document.getElementById("v_position").value = data[i].position.toUpperCase();
          document.getElementById("v_sub_position").value = data[i].sub_position.toUpperCase();
          document.getElementById("v_description").value = data[i].description.toUpperCase();
          document.getElementById("v_pos_code").value = data[i].pos_code.toUpperCase();
        }
      },
      timeout: 5000 // sets timeout to 5 seconds
    });   

    $('#modal-view').modal('show');
  }

</script>