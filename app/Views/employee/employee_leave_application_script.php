<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>


  $(document).ready(function () {
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

            document.querySelectorAll('button[type="submit"]').forEach(button => {
              button.addEventListener('click', function(e) {
                const clickedButtonId = this.id;
                console.log('Button ID:', clickedButtonId);
                // You can use the ID as needed
            alert(clickedButtonId)
              });
            });

          }
        })
      });
    });
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

            document.getElementById("startingDate").value = moment(data[i].startingDate).format('MMMM DD, YYYY').toUpperCase();
            document.getElementById("employeeName").value = data[i].lastname.toUpperCase() + ", " + data[i].firstname.toUpperCase() + ", " + data[i].middlename.toUpperCase();
            document.getElementById("position").value = data[i].position.toUpperCase();
            document.getElementById("sg_code").value = data[i].sg_code.toUpperCase();     
            document.getElementById("department").value = data[i].department.toUpperCase();                
          }
          
        },
      timeout: 5000 // sets timeout to 5 seconds
      });

      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/viewLeaveCredit/' + id,
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function (data) {

          for (i = 0; i < data.length; i++) {

            const vacation = '0';
            const sick = '0';
            
            document.getElementById("vacation_credit").innerText = getVacationLeaveCredit(data[i].startingDate, data[i].vacation);  
            document.getElementById("sick_credit").innerText = getSickLeaveCredit(data[i].startingDate, data[i].sick); 
            document.getElementById("maternity_credit").innerText = getMaternity(data[i].maternity, data[i].gender);  
            document.getElementById("paternity_credit").innerText = getPaternity(data[i].paternity, data[i].gender);  
            document.getElementById("spl_credit").innerText = getSPL(data[i].spl);  
            document.getElementById("solo_credit").innerText = getSolo(data[i].solo, data[i].solo_parent);  

          }
        },
        timeout: 5000 // sets timeout to 5 seconds
      });  

      return false;
    }

    function getVacationLeaveCredit(targetDate, numLeave) {

      const today = new Date();
      // const date = today.toISOString().split('T')[0];
      const startYear = today.getFullYear();
      const startMonth = today.getMonth(); // 0-indexed (January is 0)

      const endDate = new Date(targetDate);
      const endYear = endDate.getFullYear();
      const endMonth = endDate.getMonth(); // 0-indexed (January is 0)

      months = ((startYear - 1) - endYear) * 12;
      months = months - endMonth;
      months = months + (startMonth + 1)

      earnedCredit = months * 1.250
      remainingCredit = earnedCredit - numLeave;

      return remainingCredit;
    }
    
    function getSickLeaveCredit(targetDate, numLeave) {
      const today = new Date();
      // const date = today.toISOString().split('T')[0];
      const startYear = today.getFullYear();
      const startMonth = today.getMonth(); // 0-indexed (January is 0)

      const endDate = new Date(targetDate);
      const endYear = endDate.getFullYear();
      const endMonth = endDate.getMonth(); // 0-indexed (January is 0)

      months = ((startYear - 1) - endYear) * 12;
      months = months - endMonth;
      months = months + (startMonth + 1)

      earnedCredit = months * 1.250
      remainingCredit = earnedCredit - numLeave;

      return remainingCredit;
    }
    
    function getMaternity(numLeave, gender) {
      if (gender=="Female"){
        result = 105 - numLeave;
      }else{
        result = "N/A";
      }
      return result;
    }
    
    function getPaternity(numLeave, gender) {
      if (gender=="Male"){
        result = 7 - numLeave;
      }else{
        result = "N/A";
      }
      return result;
    }
    
    function getSPL(numLeave) {
      remainingCredit = 3 - numLeave;
      return remainingCredit;
    }
    
    function getSolo(numLeave, soloparent) {
      if (soloparent=="yes"){
        result = 7 - numLeave;
      }else{
        result = "N/A";
      }
      return result;
    }
  }
 
  function computeDays() {
    
    $start_date = document.getElementById("start_date").value;
    $end_date = document.getElementById("end_date").value;

    const startDate = new Date($start_date);
    const endDate = new Date($end_date);
    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 

    console.log(diffDays + " days"); // Output: "36 days"

    let count = 0;
    const currentDate = new Date(startDate);
    
    // Loop through each day
    while (currentDate <= endDate) {
        const day = currentDate.getDay(); // 0 = Sunday, 6 = Saturday
        if (day === 0 || day === 6) {
            count++;
        }
        currentDate.setDate(currentDate.getDate() + 1);
    }

    // alert(count);

    if ($end_date) {
      document.getElementById("number_days").value = diffDays - count + ' days';
    // alert(diffDays);
    }
  }

</script>