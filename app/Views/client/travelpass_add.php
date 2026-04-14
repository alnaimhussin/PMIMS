  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Travel Pass Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Travel Pass Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    $directory = FCPATH . '/public/assets/img/' . date('mdY');
    if (!file_exists($directory)) {
      mkdir($directory, 0777, TRUE);
    }
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
          onSubmit="return checkform()" action="<?= base_url() ?>/travelpass/save">
          <div class="card-body">
            <div class="box-body">
              <div class="col-sm-12 col-lg-8">
                <input type="text" class="form-control" id="timestamp" name="timestamp"
                  value="<?php echo date("Y-m-d H:i:s"); ?>" placeholder="timestamp" hidden>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Lastname</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                    value="<?php if ($posts) { echo $posts['lastname']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="firstname" class="col-sm-12 col-lg-2 col-form-label">Firstname</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                    value="<?php if ($posts) { echo $posts['firstname']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="middlename" class="col-sm-12 col-lg-2 col-form-lcol-sm-12 col-lg-2abel">Middlename</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename"
                    value="<?php if ($posts) { echo $posts['middlename']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="age" class="col-sm-12 col-lg-2 col-form-label">Age</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="age" name="age" placeholder="Age"
                    value="<?php if ($posts) { echo $posts['age']; } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="birthday" class="col-sm-12 col-lg-2 col-form-label">Birthday</label>
                <div class="col-sm-5 col-lg-2">
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
                <div class="col-sm-5 col-lg-2">
                  <select class="form-control" id="gender" name="gender">
                    <option>Select Gender</option>
                    <option <?php if ($posts) { if ($posts['gender'] == "Male") { echo "selected"; } } ?>>Male</option>
                    <option <?php if ($posts) { if ($posts['gender'] == "Female") { echo "selected"; } } ?>>Female
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="mobile" class="col-sm-12 col-lg-2 col-form-label">Mobile #</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile"
                    data-inputmask='"mask": "9999-999-9999"' data-mask
                    value="<?php if ($posts) { echo $posts['mobile']; } ?>">
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
                        <div class="col-sm-12 col-lg-7">
                          <div class="input-group" id="frontlinerid" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "1") { echo "hidden";} } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="frontlinerid_image"
                                name="frontlinerid_image" accept="image/png, image/jpeg, image/jpg, image/gif">
                              <label class="custom-file-label">Frontliner ID</label>
                            </div>
                          </div>
                          <div class="input-group" id="governmentid" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] == "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="governmentid_image"
                                name="governmentid_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Government ID</label>
                            </div>
                          </div>
                          <div class="input-group" id="businesspermit" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="businesspermit_image"
                                name="businesspermit_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Business Permit</label>
                            </div>
                          </div>
                          <div class="input-group" id="referral" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="referral_image" name="referral_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Referral or Appointment Letter</label>
                            </div>
                          </div>
                          <div class="input-group" id="medicalcert" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] == "") { echo "hidden";} } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="medicalcert_image"
                                name="medicalcert_image" accept="image/png, image/jpeg, image/jpg, image/gif">
                              <label class="custom-file-label">Medical Certificate</label>
                            </div>
                          </div>
                          <div class="input-group" id="chestxray" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "2") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="chestxray_image" name="chestxray_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Chest X-Ray</label>
                            </div>
                          </div>
                          <div class="input-group" id="vehiclepapers" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="vehiclepapers_image"
                                name="vehiclepapers_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Vehicle Papers</label>
                            </div>
                          </div>
                          <div class="input-group" id="travelorder" style="margin-bottom:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="travelorder_image"
                                name="travelorder_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Travel Order</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                <label for="contactperson" class="col-sm-12 col-lg-2 col-form-label">Contact Person</label>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Contact Name"
                    value="<?php if ($posts) { echo $posts['contactname']; } ?>">
                </div>
                <div class="col-sm-6 col-lg-2">
                  <select class="form-control" id="contactrelation" name="contactrelation">
                    <option value="">Relationship</option>
                    <option value="Husband"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Husband") { echo "selected"; } } ?>>Husband
                    </option>
                    <option value="Wife"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Wife") { echo "selected"; } } ?>>Wife
                    </option>
                    <option value="Father"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Father") { echo "selected"; } } ?>>Father
                    </option>
                    <option value="Mother"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Mother") { echo "selected"; } } ?>>Mother
                    </option>
                    <option value="Brother"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Brother") { echo "selected"; } } ?>>Brother
                    </option>
                    <option value="Sister"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Sister") { echo "selected"; } } ?>>Sister
                    </option>
                    <option value="Son"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Son") { echo "selected"; } } ?>>Son
                    </option>
                    <option value="Daughter"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Daughter") { echo "selected"; } } ?>>
                      Daughter</option>
                    <option value="Other"
                      <?php if ($posts) { if ($posts['contactrelation'] == "Other") { echo "selected"; } } ?>>Other
                    </option>
                  </select>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <input type="text" class="form-control" id="contactnumber" name="contactnumber"
                    placeholder="Contact #" data-inputmask='"mask": "9999-999-9999"' data-mask
                    value=<?php if ($posts) { echo $posts['contactnumber']; } ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="transpo" class="col-sm-12 col-lg-2 col-form-label">With Vehicle</label>
                <div class="col-sm-12 col-lg-2">
                  <select class="form-control" id="withvehicle" name="withvehicle" onchange="enableInput()">
                    <option value="No"
                      <?php if ($posts) { if ($posts['withvehicle'] == "Yes") { echo "selected"; } } ?>>No</option>
                    <option value="Yes" <?php if ($posts) { if ($posts['withvehicle'] == "No") { echo "selected"; } } ?>>
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
                  <div class="input-group" id="depart" >
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="departure" name="departure"
                      value="<?php if ($posts) { echo $posts['departure']; } ?>" placeholder="Date of Departure"
                      data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer">
            <div class="box-footer">
              <div class="col-lg-4" style=" margin-left: auto; margin-right: auto">
                <button type="submit" class="btn btn-success btn-block btn-flat"
                  style="height: 50px; font-size: 20px">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>

  <script>
    function checkform() {
    }

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

    function disable(id) {
      var fr = document.getElementById('fr');
      var govt = document.getElementById('govt');
      var business = document.getElementById('business');
      var patient = document.getElementById('patient');

      var requirements = document.getElementById('requirements');
      var frontlinerid = document.getElementById('frontlinerid');
      var governmentid = document.getElementById('governmentid');
      var businesspermit = document.getElementById('businesspermit');
      var referral = document.getElementById('referral');
      var medicalcert = document.getElementById('medicalcert');
      var chestxray = document.getElementById('chestxray');
      var travelorder = document.getElementById('travelorder');
      var vehiclepapers = document.getElementById('vehiclepapers');

      if (id == '1') {
        requirements.hidden = false;
        fr.hidden = false;
        govt.hidden = true;
        business.hidden = true;
        patient.hidden = true;

        frontlinerid.hidden = false;
        governmentid.hidden = true;
        businesspermit.hidden = true;
        referral.hidden = true;
        medicalcert.hidden = false;
        chestxray.hidden = true;
        travelorder.hidden = true;
        vehiclepapers.hidden = true;
      } else if (id == '2') {
        requirements.hidden = false;
        fr.hidden = true;
        govt.hidden = false;
        business.hidden = true;
        patient.hidden = true;

        frontlinerid.hidden = true;
        governmentid.hidden = false;
        businesspermit.hidden = true;
        referral.hidden = true;
        medicalcert.hidden = false;
        chestxray.hidden = false;
        travelorder.hidden = false;
        vehiclepapers.hidden = true;
      } else if (id == '3') {
        requirements.hidden = false;
        fr.hidden = true;
        govt.hidden = true;
        business.hidden = false;
        patient.hidden = true;

        frontlinerid.hidden = true;
        governmentid.hidden = true;
        businesspermit.hidden = false;
        referral.hidden = true;
        medicalcert.hidden = false;
        chestxray.hidden = false;
        travelorder.hidden = true;
        vehiclepapers.hidden = false;
      } else if (id == '4') {
        requirements.hidden = false;
        fr.hidden = true;
        govt.hidden = true;
        business.hidden = true;
        patient.hidden = false;

        frontlinerid.hidden = true;
        governmentid.hidden = true;
        businesspermit.hidden = true;
        referral.hidden = false;
        medicalcert.hidden = false;
        chestxray.hidden = false;
        travelorder.hidden = true;
        vehiclepapers.hidden = true;
      } else {
        requirements.hidden = true;
        fr.hidden = true;
        govt.hidden = true;
        business.hidden = true;
        patient.hidden = true;

        frontlinerid.hidden = true;
        governmentid.hidden = true;
        businesspermit.hidden = true;
        referral.hidden = true;
        medicalcert.hidden = true;
        chestxray.hidden = true;
        travelorder.hidden = true;
        vehiclepapers.hidden = true;
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
  </script>