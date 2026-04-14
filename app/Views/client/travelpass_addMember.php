  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Travel Pass Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php

    $db_name = "basilangov_balikbasilan";
    $mysql_username = "root";
    $mysql_password = "";
    $server_name = "localhost";
    
    $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);

    do {
    // Create a random user id
    $pass_id = "";
    $pass_id = mt_rand(1200,999999999);

    $sql1 = "SELECT pass_id FROM travelpass WHERE pass_id LIKE '$pass_id' ORDER BY id ASC";
    $result1 = mysqli_query($conn, $sql1);

    } while ($result1->num_rows > 0);

    $session = \Config\Services::session();
    $session->set('pass_id', $pass_id);

?>

    <?php $set = \Config\Services::session()->getFlashdata('validation'); ?>
    <?php $error = \Config\Services::session()->getFlashdata('error'); ?>
    <?php $txt = \Config\Services::validation()->listErrors(); ?>
    <div class="col-lg-6" <?php if ($set != "true") { echo "hidden"; $set = "false"; } ?>>
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Fields Required</h3>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php echo $txt; ?>
          <?php echo $error; ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Travel Pass Details</h3>
        </div>
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data"
          onSubmit="return checkform()" action="<?= base_url() ?>/client/saveTravelPass">
          <div class="card-body">
            <div class="box-body">

              <div class="form-group row">
                <label for="pass_id" class="col-sm-12 col-lg-2 col-form-label">Pass ID</label>
                <div class="col-sm-12 col-lg-4">
                <input type="text" class="form-control" id="pass_id" name="pass_id"
                  value="<?php echo $pass_id; ?>" placeholder="pass_id">
                </div>
              </div>
              <div class="form-group row">
                <label for="timestamp" class="col-sm-12 col-lg-2 col-form-label">Timestamp</label>
                <div class="col-sm-12 col-lg-4">
                <input type="text" class="form-control" id="timestamp" name="timestamp"
                  value="<?php echo date("Y-m-d H:i:s"); ?>" placeholder="timestamp">
                </div>
              </div>
              <div class="form-group row">
                <label for="category" class="col-sm-12 col-lg-2 col-form-label">Category</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="category" name="category" onchange="disable(this.value)">
                    <option value="">Select Category</option>
                    <option value="1" <?php if ($posts) { if ($posts['category'] == "1") { echo "selected"; } } ?>>
                      MEDICAL FRONTLINER</option>
                    <option value="2" <?php if ($posts) { if ($posts['category'] == "2") { echo "selected"; } } ?>>
                      ESSENTIAL / APOR / GOV'T EMPLOYEE / PUBLIC SERVANT</option>
                    <option value="3" <?php if ($posts) { if ($posts['category'] == "3") { echo "selected"; } } ?>>
                      BUSINESS PURPOSE</option>
                    <option value="4" <?php if ($posts) { if ($posts['category'] == "4") { echo "selected"; } } ?>>
                      PATIENT & WATCHER</option>
                  </select>
                </div>
              </div>

              <div class="form-group row" id="requirements"
                <?php if (!$posts) { echo "hidden"; } else { if ($posts['category'] == "") { echo "hidden"; } } ?>>
                <label for="requirements" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Requirements</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-sm-12 col-lg-5">
                          <div id="fr"
                            <?php if (!$posts) { echo "hidden"; } else { if ($posts['category'] != "1") { echo "hidden"; } } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Frontliner ID <br>
                                - Medical Certificate (C/MHO)
                              </div>
                            </div>
                          </div>
                          <div id="govt"
                            <?php if (!$posts) { echo "hidden"; } else { if ($posts['category'] != "2") { echo "hidden"; } } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Government ID <br>
                                - Medical Certificate (C/MHO) <br>
                                - Chest X-Ray Result <br>
                                - Travel Order
                              </div>
                            </div>
                          </div>
                          <div id="business"
                            <?php if (!$posts) { echo "hidden"; } else { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Business Permit <br>
                                - Medical Certificate (C/MHO) <br>
                                - Chest X-Ray Result <br>
                                - Vehicle / Truck papers
                              </div>
                            </div>
                          </div>
                          <div id="patient"
                            <?php if (!$posts) { echo "hidden"; } else { if ($posts['category'] != "4") { echo "hidden"; } } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Referral or Appointment Letter <br>
                                - Medical Certificate (C/MHO) <br>
                                - Chest X-Ray Result <br>
                                &nbsp;&nbsp;&nbsp;(if emergency no x-ray needed)
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label">Purpose</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Purpose of travel"
                    value="<?php if ($posts) { echo $posts['purpose']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="destination" class="col-sm-12 col-lg-2 col-form-label">Address in Basilan</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="lgu" name="lgu" onchange="getBarangay()">
                    <option value="">Select LGU</option>
                    <?php if ($lgu) : ?>
                    <?php foreach ($lgu->getResult() as $post) : ?>
                    <option value="<?php echo $post->lguCode; ?>"
                      <?php if ($posts) { if ($posts['lgu'] == $post->lguCode) { echo "selected"; } } ?>>
                      <?php echo $post->lguName; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="barangay" name="barangay">
                    <option value="<?php if ($posts) { echo $posts['barangay']; } else { echo ""; } ?>">
                      <?php if ($posts) { echo $posts['barangay']; } else { echo "Select Barangay"; } ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="address1" name="address1" placeholder="Address"
                    value="<?php if ($posts) { echo $posts['address1']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label">Address of Destination</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="province" name="province" onchange="getRefCityMun()">
                    <option value="">Select Province</option>
                    <?php if ($province) : ?>
                    <?php foreach ($province->getResult() as $post) : ?>
                    <option value="<?php echo $post->provCode; ?>"
                      <?php if ($posts) { if ($posts['province'] == $post->provCode) { echo "selected"; } } ?>>
                      <?php echo $post->provDesc; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="citymun" name="citymun">
                    <option value="<?php if ($posts) { echo $posts['citymun']; } else { echo ""; } ?>">
                      <?php if ($posts) { echo $posts['citymun']; } else { echo "Select City / Municipal"; } ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="address2" name="address2" placeholder="Address"
                    value="<?php if ($posts) { echo $posts['address2']; } ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="transpo" class="col-sm-12 col-lg-2 col-form-label">With Vehicle</label>
                <div class="col-sm-12 col-lg-2">
                  <select class="form-control" id="withvehicle" name="withvehicle" onchange="enableInput()">
                    <option value="No"
                      <?php if ($posts) { if ($posts['withvehicle'] == "Yes") { echo "selected"; } } ?>>No</option>
                    <option value="Yes"
                      <?php if ($posts) { if ($posts['withvehicle'] == "No") { echo "selected"; } } ?>>
                      Yes</option>
                  </select>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <input type="text" class="form-control" id="plate_no" name="plate_no"
                    value="<?php if ($posts) { echo $posts['plate_no']; } ?>" placeholder="Plate Number"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['withvehicle'] != "land") { echo " hidden"; } } ?>>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <input type="text" class="form-control" id="vehicle_color_made" name="vehicle_color_made"
                    value="<?php if ($posts) { echo $posts['vehicle_color_made']; } ?>"
                    placeholder="Vehicle Color / Made"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['withvehicle'] != "land") { echo " hidden"; } } ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="departure" class="col-sm-12 col-lg-2 col-form-label">Departure</label>
                <div class="col-sm-12 col-lg-2">
                  <div class="input-group" id="depart">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="departure" name="departure"
                      value="<?php if ($posts) { echo $posts['departure']; } ?>" placeholder="Date of Departure"
                      data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask onchange="getDiffDate()">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="departure" class="col-sm-12 col-lg-2 col-form-label">Return</label>
                <div class="col-sm-12 col-lg-2">
                  <div class="input-group" id="depart">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="returndate" name="returndate"
                      value="<?php if ($posts) { echo $posts['returndate']; } ?>" placeholder="Date of Return"
                      data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask onchange="getDiffDate()">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Member</label>
                <div class="col-lg-2" style="margin-right: auto">
                  <button type="button" class="btn btn-success btn-block btn-flat" data-toggle="modal"
                    data-target="#exampleModal">+ Member</button>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <table id="member_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:5%">#</th>
                        <th style="width:50%">Name</th>
                        <th style="width:20%">Gender</th>
                        <th style="width:25%">Mobile #</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-lg-2" style="margin-right: auto">
                  <button type="button" id="submit" onclick="save()" class="btn btn-success btn-block btn-flat" disabled>Submit</button>
                  <!-- <button type="submit" class="btn btn-success btn-block btn-flat">Submit</button> -->
                </div>
              </div>

            </div>
          </div>
        </form>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group row">
                    <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Lastname</label>
                    <div class="col-sm-12 col-lg-10">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                        value="<?php if ($posts) { echo $posts['lastname']; } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="firstname" class="col-sm-12 col-lg-2 col-form-label">Firstname</label>
                    <div class="col-sm-12 col-lg-10">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                        value="<?php if ($posts) { echo $posts['firstname']; } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="middlename"
                      class="col-sm-12 col-lg-2 col-form-lcol-sm-12 col-lg-2abel">Middlename</label>
                    <div class="col-sm-12 col-lg-10">
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename"
                        value="<?php if ($posts) { echo $posts['middlename']; } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="age" class="col-sm-12 col-lg-2 col-form-label">Age</label>
                    <div class="col-sm-5 col-lg-4">
                      <input type="text" class="form-control" id="age" name="age" placeholder="Age"
                        value="<?php if ($posts) { echo $posts['age']; } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="birthday" class="col-sm-12 col-lg-2 col-form-label">Birthday</label>
                    <div class="col-sm-5 col-lg-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="birthday" name="birthday"
                          data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask
                          value="<?php if ($posts) { echo $posts['birthday']; } ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="gender" class="col-sm-12 col-lg-2 col-form-label">Gender</label>
                    <div class="col-sm-5 col-lg-4">
                      <select class="form-control" id="gender" name="gender">
                        <option>Select Gender</option>
                        <option <?php if ($posts) { if ($posts['gender'] == "Male") { echo "selected"; } } ?>>Male
                        </option>
                        <option <?php if ($posts) { if ($posts['gender'] == "Female") { echo "selected"; } } ?>>
                          Female
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mobile" class="col-sm-12 col-lg-2 col-form-label">Mobile #</label>
                    <div class="col-sm-5 col-lg-4">
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile"
                        data-inputmask='"mask": "9999-999-9999"' data-mask
                        value="<?php if ($posts) { echo $posts['mobile']; } ?>">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="addRow()" type="button" class="btn btn-primary"
                  data-dismiss="modal">Add</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>

  <script>
    var rowCount = 0;

    function getRefCityMun() {
      var provCode = $('#province').val();
      if (provCode) {
        $.ajax({
          url: '<?php echo base_url(); ?>/dynamic/fetch_citymun/' + provCode,
          method: "POST",
          data: {
            provCode: provCode
          },
          async: true,
          dataType: 'json',
          success: function (data) {
            var html = '';
            var i;
            html += '<option value="">Select City / Municipal</option>';
            for (i = 0; i < data.length; i++) {
              html += '<option value=' + data[i].citymunDesc + '>' + data[i].citymunDesc.toUpperCase() +
                '</option>';
            }
            $('#citymun').html(html);

          }
        });
        return false;
      }
    }

    function getBarangay(id) {
      var lgu = $('#lgu').val();
      if (lgu) {
        $.ajax({
          url: '<?php echo base_url(); ?>/dynamic/fetch_barangay/' + lgu,
          method: "POST",
          data: {
            lgu: lgu
          },
          async: true,
          dataType: 'json',
          success: function (data) {

            var html = '';
            var i;
            html += '<option>Select Barangay</option>';
            for (i = 0; i < data.length; i++) {
              html += '<option value=' + data[i].brgyName + '>' + data[i].brgyName.toUpperCase() + '</option>';
            }
            $('#barangay').html(html);

          }
        });
        return false;
      }
    }
    
    function getDiffDate() {
      var button = document.getElementById('submit');
      var date1 = document.getElementById('departure').value;
      var date2 = document.getElementById('returndate').value;

      var a = moment(date1,'M/D/YYYY');
      var b = moment(date2,'M/D/YYYY');
      var diffDays = b.diff(a, 'days');

      if (diffDays > 3) {
        Swal.fire({
            title: 'Invalid Entry',
            text: "Maximum of 3 days travel",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.value) {
              button.disabled = true;
            }
          })
      }else if (diffDays >= 0) {
              button.disabled = false;
      }else{
              button.disabled = true;
      }
    }

    function enableInput() {
      var transpo = document.getElementById("withvehicle").value;
      var plate_no = document.getElementById("plate_no");
      var vehicle_color_made = document.getElementById("vehicle_color_made");
      if (transpo == "Yes") {
        plate_no.hidden = false;
        plate_no.value = "";
        vehicle_color_made.hidden = false;
        vehicle_color_made.value = "";
      } else if (transpo == "No") {
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      }
    }
    

    function save() {
      var pass_id = document.getElementById('pass_id').value;
      var timestamp = document.getElementById('timestamp').value;
      var category = document.getElementById('category').value;
      var purpose = document.getElementById('purpose').value;
      var lgu = document.getElementById('lgu').value;
      var barangay = document.getElementById('barangay').value;
      var address1 = document.getElementById('address1').value;
      var province = document.getElementById('province').value;
      var citymun = document.getElementById('citymun').value;
      var address2 = document.getElementById('address2').value;
      var withvehicle = document.getElementById('withvehicle').value;
      var plate_no = document.getElementById('plate_no').value;
      var vehicle_color_made = document.getElementById('vehicle_color_made').value;
      var departure = document.getElementById('departure').value;
      var returndate = document.getElementById('returndate').value;
      
      var posts = {
            'pass_id': pass_id,
            'timestamp': timestamp,
            'category': category,
            'purpose': purpose,
            'lgu': lgu,
            'barangay': barangay,
            'address1': address1,
            'province': province,
            'citymun': citymun,
            'address2': address2,
            'withvehicle': withvehicle,
            'plate_no': plate_no,
            'vehicle_color_made': vehicle_color_made,
            'departure': departure,
            'returndate': returndate,
          }
          $.ajax({
            type: "POST",
            url: "<?php echo base_url().'/client/saveTravelPass'; ?>",
            data: posts
          })

      $('#member_table tr').each(function (row, tr) {
        if ($(tr).find('td:eq(0)').text() == "") {
        } else {
          var posts_table = {
            'pass_id': pass_id,
            'lastname': $(tr).find('td:eq(4)').text(),
            'firstname': $(tr).find('td:eq(5)').text(),
            'middlename': $(tr).find('td:eq(6)').text(),
            'age': $(tr).find('td:eq(7)').text(),
            'birthday': $(tr).find('td:eq(8)').text(),
            'gender': $(tr).find('td:eq(2)').text(),
            'mobile': $(tr).find('td:eq(3)').text(),
          }
          $.ajax({
            type: "POST",
            url: "<?php echo base_url().'/client/saveTravelMember'; ?>",
            data: posts_table
          })
        }
      })
      window.location.href = "<?php echo base_url() . '/client/successTravelpass'; ?>";
    }

    function addRow() {
      rowCount = rowCount + 1;
      var table = document.getElementById("member_table");
      var row = table.insertRow(rowCount);
      var n = rowCount.toString();

      var lastname = document.getElementById("lastname").value;
      var firstname = document.getElementById("firstname").value;
      var middlename = document.getElementById("middlename").value;
      var age = document.getElementById("age").value;
      var birthday = document.getElementById("birthday").value;
      var gender = document.getElementById("gender").value;
      var mobile = document.getElementById("mobile").value;

      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      var cell8 = row.insertCell(7);
      var cell9 = row.insertCell(8);

      $('#member_table th:nth-child(5)').hide();
      $('#member_table th:nth-child(6)').hide();
      $('#member_table th:nth-child(7)').hide();
      $('#member_table th:nth-child(8)').hide();
      $('#member_table th:nth-child(9)').hide();

      $('#member_table td:nth-child(5)').hide();
      $('#member_table td:nth-child(6)').hide();
      $('#member_table td:nth-child(7)').hide();
      $('#member_table td:nth-child(8)').hide();
      $('#member_table td:nth-child(9)').hide();

      cell1.innerHTML = n;
      cell2.innerHTML = lastname.toUpperCase() + ", " + firstname.toUpperCase() + " " + middlename.toUpperCase();
      cell3.innerHTML = gender.toUpperCase();
      cell4.innerHTML = mobile;
      cell5.innerHTML = lastname.toUpperCase();
      cell6.innerHTML = firstname.toUpperCase();
      cell7.innerHTML = middlename.toUpperCase();
      cell8.innerHTML = age.toUpperCase();
      cell9.innerHTML = birthday.toUpperCase();

      clear();
    }

    function clear() {
      var lastname = document.getElementById("lastname");
      var firstname = document.getElementById("firstname");
      var middlename = document.getElementById("middlename");
      var age = document.getElementById("age");
      var birthday = document.getElementById("birthday");
      var gender = document.getElementById("gender");
      var mobile = document.getElementById("mobile");

      lastname.value = "";
      firstname.value = "";
      middlename.value = "";
      age.value = "";
      birthday.value = "";
      gender.selectedIndex = 0;
      mobile.value = "";
    }
  </script>