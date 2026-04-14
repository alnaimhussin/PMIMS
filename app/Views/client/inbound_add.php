  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Inbound Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Inbound Details</li>
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
    <div class="col-lg-12" <?php if ($set != "true") { echo "hidden"; $set = "false"; } ?>>
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Fields Required</h3>
        </div>
        <div class="card-body">
          <?php echo $txt; ?>
          <?php echo $error; ?>
        </div>
      </div>
    </div>
    <section class="content">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Inbound Details</h3>
        </div>
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data"
          onSubmit="return checkform()" action="<?= base_url() ?>/Client/saveInbound">
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
                    value="<?php if ($posts) {
                                                                                                                        echo $posts['lastname'];
                                                                                                                      } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="firstname" class="col-sm-12 col-lg-2 col-form-label">Firstname</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                    value="<?php if ($posts) {
                                                                                                                            echo $posts['firstname'];
                                                                                                                          } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="middlename" class="col-sm-12 col-lg-2 col-form-lcol-sm-12 col-lg-2abel">Middlename</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename"
                    value="<?php if ($posts) {
                                                                                                                              echo $posts['middlename'];
                                                                                                                            } ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="age" class="col-sm-12 col-lg-2 col-form-label">Age</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php if ($posts) {
                                                                                                          echo $posts['age'];
                                                                                                        } ?>">
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
                      value="<?php if ($posts) {
                                                                                                                                                                                      echo $posts['birthday'];
                                                                                                                                                                                    } ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="gender" class="col-sm-12 col-lg-2 col-form-label">Gender</label>
                <div class="col-sm-5 col-lg-2">
                  <select class="form-control" id="gender" name="gender">
                    <option>Select Gender</option>
                    <option <?php if ($posts) {
                              if ($posts['gender'] == "Male") {
                                echo "selected";
                              }
                            } ?>>Male</option>
                    <option <?php if ($posts) {
                              if ($posts['gender'] == "Female") {
                                echo "selected";
                              }
                            } ?>>Female
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="mobile" class="col-sm-12 col-lg-2 col-form-label">Mobile #</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile"
                    data-inputmask='"mask": "9999-999-9999"' data-mask
                    value="<?php if ($posts) {
                                                                                                                                                                      echo $posts['mobile'];
                                                                                                                                                                    } ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="category" class="col-sm-12 col-lg-2 col-form-label">Category</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="category" name="category" onchange="disable(this.value)">
                    <option value="">Select Category</option>
                    <option value="1" <?php if ($posts) {
                                        if ($posts['category'] == "1") {
                                          echo "selected";
                                        }
                                      } ?>>LSI
                      (Local Stranded Individual)</option>
                    <option value="2" <?php if ($posts) {
                                        if ($posts['category'] == "2") {
                                          echo "selected";
                                        }
                                      } ?>>ROF
                      (Returning Overseas Filipino)</option>
                    <option value="3" <?php if ($posts) {
                                        if ($posts['category'] == "3") {
                                          echo "selected";
                                        }
                                      } ?>>APOR
                      (Authorized Person outside Residence)</option>
                  </select>
                </div>
              </div>
              <div class="form-group row" id="requirements" <?php if (!$posts) {
                                                              echo "hidden";
                                                            } else {
                                                              if ($posts['category'] == "") {
                                                                echo "hidden";
                                                              }
                                                            } ?>>
                <label for="requirements" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Requirements</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-sm-12 col-lg-5">
                          <div id="lsi" <?php if (!$posts) {
                                          echo "hidden";
                                        } else {
                                          if ($posts['category'] != "1") {
                                            echo "hidden";
                                          }
                                        } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Medical Certificate (C/MHO) <br>
                                - Travel Authority (JTF Shield PNP) <br>
                                - Identification proof that you are a resident of Basilan
                              </div>
                            </div>
                          </div>
                          <div id="rof" <?php if (!$posts) {
                                          echo "hidden";
                                        } else {
                                          if ($posts['category'] != "2") {
                                            echo "hidden";
                                          }
                                        } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Coordination with OWWA <br>
                                - Medical Certificate (C/MHO) <br>
                                - Travel Authority (JTF Shield PNP) <br>
                                - Identification proof that you are a resident of Basilan
                              </div>
                            </div>
                          </div>
                          <div id="apor" <?php if (!$posts) {
                                            echo "hidden";
                                          } else {
                                            if ($posts['category'] != "3") {
                                              echo "hidden";
                                            }
                                          } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Medical Certificate (C/MHO) <br>
                                - Travel Authority (JTF Shield PNP) <br>
                                - Company ID <br>
                                - Certifacate of Employment <br>
                                - Company Travel Order
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-7">
                          <div class="input-group" id="medicalcert"
                            <?php if ($posts) { if ($posts['category'] == "") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="medicalcert_image"
                                name="medicalcert_image" accept="image/png, image/jpeg, image/jpg, image/gif">
                              <label class="custom-file-label">Medical Certificate</label>
                            </div>
                          </div>
                          <div class="input-group" id="travelauth" style="margin-top:10px;"
                            <?php if ($posts) { if ($posts['category'] == "") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="travelauth_image" name="travelauth_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Travel Authority</label>
                            </div>
                          </div>
                          <div class="input-group" id="residency" style="margin-top:10px;"
                            <?php if ($posts) { if ($posts['category'] == "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="residency_image" name="residency_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Proof of Residency</label>
                            </div>
                          </div>
                          <div class="input-group" id="owwa" style="margin-top:10px;"
                            <?php if ($posts) { if ($posts['category'] != "2") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="owwa_image" name="owwa_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">OWWA Coordination</label>
                            </div>
                          </div>
                          <div class="input-group" id="companyid" style="margin-top:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="companyid_image" name="companyid_image"
                                accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Company ID</label>
                            </div>
                          </div>
                          <div class="input-group" id="employmentcert" style="margin-top:10px;"
                            <?php if ($posts) { if ($posts['category'] != "3") { echo "hidden"; } } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="employmentcert_image"
                                name="employmentcert_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Employment Certificate</label>
                            </div>
                          </div>
                          <div class="input-group" id="travelorder" style="margin-top:10px;"
                            <?php if ($posts) {if ($posts['category'] != "3") {echo "hidden";}} ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="travelorder_image"
                                name="travelorder_image" accept="image/png, image/jpeg, image/gif">
                              <label class="custom-file-label">Company Travel Order</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label">Address of Origin</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="province" name="province" onchange="getRefCityMun()">
                    <option value="">Select Province</option>
                    <?php if ($province) : ?>
                    <?php foreach ($province->getResult() as $post) : ?>
                    <option value="<?php echo $post->provCode; ?>"
                      <?php if ($posts) { if ($posts['province'] == $post->provCode) {echo "selected"; } } ?>>
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
                  <input type="text" class="form-control" id="address1" name="address1" placeholder="Address"
                    value="<?php if ($posts) { echo $posts['address1']; } ?>">
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
                  <input type="text" class="form-control" id="address2" name="address2" placeholder="Address"
                    value="<?php if ($posts) { echo $posts['address2'];} ?>">
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
                <label for="transpo" class="col-sm-12 col-lg-2 col-form-label">Mode of Transportation</label>
                <div class="col-sm-6 col-lg-3">
                  <select class="form-control" id="transportation" name="transportation" onchange="enableInput()">
                    <option value="">Select Transportation</option>
                    <option value="air"
                      <?php if ($posts) { if ($posts['transportation'] == "air") { echo "selected"; } } ?>>Air</option>
                    <option value="sea"
                      <?php if ($posts) { if ($posts['transportation'] == "sea") { echo "selected"; } } ?>>Sea</option>
                    <option value="land"
                      <?php if ($posts) { if ($posts['transportation'] == "land") { echo "selected"; } } ?>>Land
                    </option>
                  </select>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <div class="input-group" id="depart"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['transportation'] == "") { echo " hidden"; } } ?>>
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
                <div class="col-sm-6 col-lg-2">
                  <select class="form-control" id="airline" name="airline"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['transportation'] != "air") { echo " hidden"; } } ?>>
                    <option value="">Select Airline</option>
                    <option value="Philippine Airlines"
                      <?php if ($posts) { if ($posts['airline'] == "Philippine Airlines") { echo "selected"; } } ?>>
                      Philippine Airlines</option>
                    <option value="Cebu Pacific"
                      <?php if ($posts) { if ($posts['airline'] == "Cebu Pacific") { echo "selected"; } } ?>>Cebu
                      Pacific</option>
                    <option value="Air Asia Zest"
                      <?php if ($posts) { if ($posts['airline'] == "Air Asia Zest") { echo "selected"; } } ?>>Air Asia
                      Zest
                    </option>
                    <option value="Other"
                      <?php if ($posts) { if ($posts['airline'] == "Other") { echo "selected"; } } ?>>Other</option>
                  </select>
                  <select class="form-control" id="sea_vessel" name="sea_vessel"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['transportation'] != "sea") { echo " hidden"; } } ?>>
                    <option value="">Select Sea Vessel</option>
                    <option value="2GO"
                      <?php if ($posts) { if ($posts['sea_vessel'] == "2GO") { echo "selected"; } } ?>>2GO</option>
                    <option value="Other"
                      <?php if ($posts) { if ($posts['sea_vessel'] == "Other") { echo "selected"; } } ?>>Other</option>
                  </select>
                  <input type="text" class="form-control " class="" id="plate_no" name="plate_no"
                    value="<?php if ($posts) { echo $posts['plate_no']; } ?>" placeholder="Plate Number"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['transportation'] != "land") { echo " hidden"; } } ?>>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <input type="text" class="form-control" id="vehicle_color_made" name="vehicle_color_made"
                    value="<?php if ($posts) { echo $posts['vehicle_color_made']; } ?>"
                    placeholder="Vehicle Color / Made"
                    <?php if (!$posts) { echo "hidden"; } else { if ($posts['transportation'] != "land") { echo " hidden"; } } ?>>
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
      var transpo = $('#transportation').val();
      var airline = $('#airline').val();
      var sea_vessel = $('#sea_vessel').val();
      var plate_no = $('#plate_no').val();
      var vehicle_color_made = $('#vehicle_color_made').val();
      var departure = $('#departure').val();
      var plate_no = $('#plate_no').val();

      if (transpo == "air") {
        if (airline == "") {
          alert('Please select airline.');
          return false;
        }
        if (departure == "") {
          alert('Please enter departure date.');
          return false;
        }
      } else if (transpo == "sea") {
        if (sea_vessel == "") {
          alert('Please select sea vessel.');
          return false;
        }
        if (departure == "") {
          alert('Please enter departure date.');
          return false;
        }
      } else if (transpo == "land") {
        if (plate_no == "") {
          alert('Please enter plate number.');
          return false;
        }
        if (vehicle_color_made == "") {
          alert('Please enter color and made of vehicle.');
          return false;
        }
        if (departure == "") {
          alert('Please enter departure date.');
          return false;
        }
      }
      return true;
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
      var lsi = document.getElementById('lsi');
      var rof = document.getElementById('rof');
      var apor = document.getElementById('apor');

      var requirements = document.getElementById('requirements');
      var owwa = document.getElementById('owwa');
      var medicalcert = document.getElementById('medicalcert');
      var travelauth = document.getElementById('travelauth');
      var residency = document.getElementById('residency');
      var companyid = document.getElementById('companyid');
      var employmentcert = document.getElementById('employmentcert');
      var travelorder = document.getElementById('travelorder');

      if (id == '1') {
        requirements.hidden = false;
        lsi.hidden = false;
        rof.hidden = true;
        apor.hidden = true;

        owwa.hidden = true;
        medicalcert.hidden = false;
        travelauth.hidden = false;
        residency.hidden = false;
        companyid.hidden = true;
        employmentcert.hidden = true;
        travelorder.hidden = true;
      } else if (id == '2') {
        requirements.hidden = false;
        lsi.hidden = true;
        rof.hidden = false;
        apor.hidden = true;

        owwa.hidden = false;
        medicalcert.hidden = false;
        travelauth.hidden = false;
        residency.hidden = false;
        companyid.hidden = true;
        employmentcert.hidden = true;
        travelorder.hidden = true;
      } else if (id == '3') {
        requirements.hidden = false;
        lsi.hidden = true;
        rof.hidden = true;
        apor.hidden = false;

        owwa.hidden = true;
        medicalcert.hidden = false;
        travelauth.hidden = false;
        residency.hidden = true;
        companyid.hidden = false;
        employmentcert.hidden = false;
        travelorder.hidden = false;
      } else {
        requirements.hidden = true;
        lsi.hidden = true;
        rof.hidden = true;
        apor.hidden = true;

        owwa.hidden = true;
        medicalcert.hidden = true;
        travelauth.hidden = true;
        residency.hidden = true;
        companyid.hidden = true;
        employmentcert.hidden = true;
        travelorder.hidden = true;
      }
    }

    function enableInput() {
      var transpo = document.getElementById("transportation").value;
      var airline = document.getElementById("airline");
      var sea_vessel = document.getElementById("sea_vessel");
      var plate_no = document.getElementById("plate_no");
      var vehicle_color_made = document.getElementById("vehicle_color_made");
      var depart = document.getElementById("depart");
      if (transpo == "air") {
        /-- date --/
        depart.hidden = false;
        /-- air --/
        airline.hidden = false;
        airline.selectedIndex = 0;
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      } else if (transpo == "sea") {
        /-- date --/
        depart.hidden = false;
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        /-- sea --/
        sea_vessel.hidden = false;
        sea_vessel.selectedIndex = 0;
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      } else if (transpo == "land") {
        /-- date --/
        depart.hidden = false;
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        /-- land --/
        plate_no.hidden = false;
        plate_no.value = "";
        vehicle_color_made.hidden = false;
        vehicle_color_made.value = "";
      } else {
        /-- date --/
        depart.hidden = true;
        depart.value = "";
        departtime.value = "";
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      }
    }
  </script>