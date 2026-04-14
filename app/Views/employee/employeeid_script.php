<?php $session = \Config\Services::session(); ?>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>
    $(document).ready(function () {

    //------ INITIALIZATION
    
        // CSS to make QR code responsive inside the card
        $("<style>")
            .prop("type", "text/css")
            .html("\
                #qrcode { width: 100% !important; }\
                #qrcode canvas, #qrcode img { width: 100% !important; height: auto !important; }")
            .appendTo("head");
    
        // FORM SUBMIT INTERCEPTOR
        $('#upload_form').on('submit', function(e) {
            // 1. Find the generated QR code (Canvas or Img)
            var canvas = document.querySelector('#qrcode canvas');
            var img = document.querySelector('#qrcode img');
            var dataField = $('#qr_code_data');
    
            if (canvas) {
                dataField.val(canvas.toDataURL("image/png"));
            } else if (img && img.src.includes('data:image')) {
                dataField.val(img.src);
            }
    
            // 2. Validation: Ensure we have a QR code before sending
            if (dataField.val() === "") {
                alert("Please select an employee to generate a QR code first.");
                e.preventDefault();
                return false;
            }
            
            // Change button text to show progress
            $(this).find('button[type="submit"]').text('Uploading...').addClass('disabled');
        });
    
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


        //----- DOWNLOAD QRCODE
        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        };
        function downloadQR() {
            lastname = document.getElementById("lastname").value;
            firstname = document.getElementById("firstname").value;
            
            var filename = lastname.toUpperCase().replace(/ /g,'')+firstname.toUpperCase().replace(/ /g,'');
            let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
            downloadURI(dataUrl, filename + '-qrcode.png');
        };
    //----- DOWNLOAD QRCODE

    function getDetail(id) {
      
        if (id) {
          $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/viewDetail/' + id,
            method: "POST",
            data: {
              id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
              var i;
              $('#qrcode').empty();
              
              for (i = 0; i < data.length; i++) {
                var uniqueid = s4() + s4() + "-" + s4() + "-" + s4() + "-" + s4() + s4() + s4();
                document.getElementById("uniqueid").value = uniqueid;
                document.getElementById("unique_id").value = uniqueid;
                document.getElementById("pgbid").value = data[i].pgbid.toUpperCase();
                document.getElementById("pgbid2").value = data[i].pgbid.toUpperCase();
                document.getElementById("nickname").value = data[i].nickname.toUpperCase();
                document.getElementById("lastname").value = data[i].lastname.toUpperCase();
                document.getElementById("firstname").value = data[i].firstname.toUpperCase();
                document.getElementById("fullname").value = data[i].firstname.toUpperCase() + " " + data[i].middlename.toUpperCase() + " " + data[i].lastname.toUpperCase();
                document.getElementById("position").value = data[i].position.toUpperCase();
                document.getElementById("department").value = data[i].department.toUpperCase();
                document.getElementById("dept_code").value = data[i].dept_code.toUpperCase();
                document.getElementById("departmenthead").value = data[i].head.toUpperCase();
    
                document.getElementById("gsis").value = data[i].gsis.toUpperCase();
                document.getElementById("philhealth").value = data[i].philhealth.toUpperCase();
                document.getElementById("tin").value = data[i].tin.toUpperCase();
                document.getElementById("pagibig").value = data[i].pagibig.toUpperCase();
                document.getElementById("sss").value = data[i].sss.toUpperCase();
    
                document.getElementById("address").value = data[i].r_citymunicipal.toUpperCase() + ", " + data[i].r_province.toUpperCase();
                document.getElementById("contact").value = data[i].contact.toUpperCase();
                document.getElementById("e_person").value = data[i].e_firstname.toUpperCase() + " " + data[i].e_middlename.toUpperCase() + " " + data[i].e_lastname.toUpperCase();
                document.getElementById("e_contact").value = data[i].e_contact.toUpperCase();
    
                var filename = data[i].lastname.toUpperCase().replace(/ /g,'')+data[i].firstname.toUpperCase().replace(/ /g,'');
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: "verify.basilan.gov.ph/index.php?type=pgb&id="+uniqueid,
                    width: 512,  // Render at high res
                    height: 512, // Render at high res
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });              
    
                var base_url = window.location.origin;
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