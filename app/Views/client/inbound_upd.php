  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Inbound Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Inbound Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <?= \Config\Services::validation()->listErrors(); ?>
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Inbound Details</h3>
        </div>
        <?php if ($posts) : ?>
        <?php foreach ($posts->getResult() as $post) : ?>
        <form id="myForm" class="form-horizontal" method="post" onSubmit="return checkform()"
          action="<?= base_url() ?>/Inbound/update/<?php echo strtoupper($post->id); ?>">
          <div class="card-body">
            <div class="box-body" style="font-size: 16px">
              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Lastname</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                    value="<?php echo strtoupper($post->lastname); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="firstname" class="col-sm-12 col-lg-2 col-form-label">Firstname</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                    value="<?php echo strtoupper($post->firstname); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="middlename" class="col-sm-12 col-lg-2 col-form-lcol-sm-12 col-lg-2abel">Middlename</label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename"
                    value="<?php echo strtoupper($post->middlename); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="age" class="col-sm-12 col-lg-2 col-form-label">Age</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="age" name="age" placeholder="Age"
                    value="<?php echo strtoupper($post->age); ?>">
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
                      value="<?php echo strtoupper($post->birthday); ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="gender" class="col-sm-12 col-lg-2 col-form-label">Gender</label>
                <div class="col-sm-5 col-lg-2">
                  <select class="form-control" id="gender" name="gender">
                    <option>Select Gender</option>
                    <option <?php if ($post->gender == "Male") { echo "selected"; } ?>>Male</option>
                    <option <?php if ($post->gender == "Female") { echo "selected"; } ?>>Female
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="mobile" class="col-sm-12 col-lg-2 col-form-label">Mobile #</label>
                <div class="col-sm-5 col-lg-2">
                  <input type="text" class="form-control" id="mobile" name="mobile"
                    placeholder="Mobile" data-inputmask='"mask": "9999-999-9999"' data-mask
                    value="<?php echo strtoupper($post->mobile); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="category" class="col-sm-12 col-lg-2 col-form-label">Category</label>
                <div class="col-sm-12 col-lg-4">
                  <input type="text" class="form-control" id="category" name="category" placeholder="category"
                    value="<?php echo strtoupper($post->category); ?>" hidden>
                  <select class="form-control" id="" name=""
                    onchange="disable(this.value)" disabled>
                    <option value="">Select Category</option>
                    <option value="1" <?php if ($post->category == "1") { echo "selected"; } ?>>LSI
                      (Local Stranded Individual)</option>
                    <option value="2" <?php if ($post->category == "2") { echo "selected"; } ?>>ROF
                      (Returning Overseas Filipino)</option>
                    <option value="3" <?php if ($post->category == "3") { echo "selected"; } ?>>APOR
                      (Authorized Person outside Residence)</option>
                  </select>
                </div>
              </div>
              <div class="form-group row" id="requirements" <?php  if ($post->category == "") { echo "hidden"; } ?>>
                <label for="requirements" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Requirements</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-sm-12 col-lg-5">
                          <div id="lsi" <?php if ($post->category != "1") { echo "hidden"; } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Medical Certificate (C/MHO) <br>
                                - Travel Authority (JTF Shield PNP) <br>
                                - Identification proof that you are a resident of Basilan
                              </div>
                            </div>
                          </div>
                          <div id="rof" <?php if ($post->category != "2") { echo "hidden"; } ?>>
                            <div class="card card-primary">
                              <div class="card-body">
                                - Coordination with OWWA <br>
                                - Medical Certificate (C/MHO) <br>
                                - Travel Authority (JTF Shield PNP) <br>
                                - Identification proof that you are a resident of Basilan
                              </div>
                            </div>
                          </div>
                          <div id="apor" <?php if ($post->category != "3") { echo "hidden"; } ?>>
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
                            <?php if ($post->category == "") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="medicalcert_image" disabled>
                              <label class="custom-file-label">Medical Certificate</label>
                            </div>
                          </div>
                          <div class="input-group" id="travelauth" style="margin-top:10px;"
                            <?php if ($post->category == "") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="travelauth_image" disabled>
                              <label class="custom-file-label">Travel Authority</label>
                            </div>
                          </div>
                          <div class="input-group" id="residency" style="margin-top:10px;"
                            <?php if ($post->category == "3" ) { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="residency_image" disabled>
                              <label class="custom-file-label">Proof of Residency</label>
                            </div>
                          </div>
                          <div class="input-group" id="owwa" style="margin-top:10px;"
                            <?php if ($post->category != "2") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="owwa_image" disabled>
                              <label class="custom-file-label">OWWA Coordination</label>
                            </div>
                          </div>
                          <div class="input-group" id="companyid" style="margin-top:10px;"
                            <?php if ($post->category != "3") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="companyid_image" disabled>
                              <label class="custom-file-label">Company ID</label>
                            </div>
                          </div>
                          <div class="input-group" id="employmentcert" style="margin-top:10px;"
                            <?php if ($post->category != "3") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="employmentcert_image" disabled>
                              <label class="custom-file-label">Employment Certificate</label>
                            </div>
                          </div>
                          <div class="input-group" id="travelorder" style="margin-top:10px;"
                            <?php if ($post->category != "3") { echo "hidden"; } ?>>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="travelorder_image" disabled>
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
                    <?php foreach ($province->getResult() as $post2) : ?>
                    <option value="<?php echo strtoupper($post2->provCode); ?>"
                      <?php if ($post->province == $post2->provCode) { echo "selected"; } ?>>
                      <?php echo $post2->provDesc; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="citymun" name="citymun">
                    <option value="<?php echo strtoupper($post->citymun); ?>">
                      <?php echo strtoupper($post->citymun); ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="address1" name="address1" placeholder="Address"
                    value="<?php echo strtoupper($post->address1); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="destination" class="col-sm-12 col-lg-2 col-form-label">Address in Basilan</label>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="lgu" name="lgu" onchange="getBarangay()">
                    <option value="">Select LGU</option>
                    <?php if ($lgu) : ?>
                    <?php foreach ($lgu->getResult() as $post2) : ?>
                    <option value="<?php echo strtoupper($post2->lguCode); ?>"
                      <?php if ($post->lgu == $post2->lguCode) { echo "selected"; }  ?>>
                      <?php echo strtoupper($post2->lguName); ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-sm-12 col-lg-4">
                  <select class="form-control" id="barangay" name="barangay">
                    <option value="<?php echo strtoupper($post->barangay); ?>">
                      <?php echo strtoupper($post->barangay); ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-12 col-lg-8">
                  <input type="text" class="form-control" id="address2" name="address2" placeholder="Address"
                    value="<?php echo strtoupper($post->address2); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="contactperson" class="col-sm-12 col-lg-2 col-form-label">Contact Person</label>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Contact Name"
                    value="<?php echo strtoupper($post->contactname); ?>">
                </div>
                <div class="col-sm-6 col-lg-2">
                  <select class="form-control" id="contactrelation" name="contactrelation">
                    <option value="">Relationship</option>
                    <option value="Husband" <?php if ($post->contactrelation == "Husband") { echo "selected"; } ?>>
                      Husband
                    </option>
                    <option value="Wife" <?php if ($post->contactrelation == "Wife") { echo "selected"; } ?>>Wife
                    </option>
                    <option value="Father" <?php if ($post->contactrelation == "Father") { echo "selected"; } ?>>Father
                    </option>
                    <option value="Mother" <?php if ($post->contactrelation == "Mother") { echo "selected"; } ?>>Mother
                    </option>
                    <option value="Brother" <?php if ($post->contactrelation == "Brother") { echo "selected"; } ?>>
                      Brother
                    </option>
                    <option value="Sister" <?php if ($post->contactrelation == "Sister") { echo "selected"; } ?>>Sister
                    </option>
                    <option value="Son" <?php if ($post->contactrelation == "Son") { echo "selected"; } ?>>Son
                    </option>
                    <option value="Daughter" <?php if ($post->contactrelation == "Daughter") { echo "selected"; } ?>>
                      Daughter</option>
                    <option value="Other" <?php if ($post->contactrelation == "Other") { echo "selected"; } ?>>Other
                    </option>
                  </select>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <input type="text" class="form-control" id="contactnumber" name="contactnumber"
                    placeholder="Contact #" data-inputmask='"mask": "9999-999-9999"' data-mask
                    value=<?php echo strtoupper($post->contactnumber); ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="transpo" class="col-sm-12 col-lg-2 col-form-label">Mode of Transportation</label>
                <div class="col-sm-12 col-lg-2">
                  <select class="form-control" id="transportation" name="transportation" onchange="enableInput()">
                    <option value="">Select Transportation</option>
                    <option value="air" <?php if ($post->transportation == "air") { echo "selected"; } ?>>Air</option>
                    <option value="sea" <?php if ($post->transportation == "sea") { echo "selected"; } ?>>Sea</option>
                    <option value="land" <?php if ($post->transportation == "land") { echo "selected"; } ?>>Land
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="transpo" class="col-sm-12 col-lg-2 col-form-label"></label>
                <div class="col-sm-6 col-lg-2">
                  <select class="form-control" id="airline" name="airline"
                    <?php if ($post->transportation != "air") { echo " hidden"; } ?>>
                    <option value="">Select Airline</option>
                    <option value="Philippine Airlines" <?php if ($post->airline == "Philippine Airlines") { echo "selected"; } ?>>Philippine Airlines</option>
                    <option value="Cebu Pacific" <?php if ($post->airline == "Cebu Pacific") { echo "selected"; } ?>>Cebu Pacific</option>
                    <option value="Air Asia" <?php if ($post->airline == "Air Asia") { echo "selected"; } ?>>Air Asia</option>
                    <option value="Other" <?php if ($post->airline == "Other") { echo "selected"; } ?>>Other</option>
                  </select>
                  <select class="form-control" id="sea_vessel" name="sea_vessel"
                    <?php if ($post->transportation != "sea") { echo " hidden"; } ?>>
                    <option value="">Select Sea Vessel</option>
                    <option value="2GO" <?php if ($post->sea_vessel == "2GO") { echo "selected"; } ?>>2GO</option>
                    <option value="MV Stephanie" <?php if ($post->sea_vessel == "MV Stephanie") { echo "selected"; } ?>>MV Stephanie</option>
                    <option value="Other" <?php if ($post->sea_vessel == "Other") { echo "selected"; } ?>>Other</option>
                  </select>
                  <input type="text" class="form-control" id="plate_no" name="plate_no"
                    value="<?php echo strtoupper($post->plate_no); ?>" placeholder="Plate Number"
                    <?php if ($post->transportation != "land") { echo " hidden"; } ?>>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <input type="text" class="form-control" id="ref_air" name="ref_air"
                    value="<?php echo strtoupper($post->ref_air); ?>" placeholder="Airline Reference #"
                    <?php if ($post->transportation != "air") { echo " hidden"; } ?>>
                  <input type="text" class="form-control" id="ref_sea" name="ref_sea"
                    value="<?php echo strtoupper($post->ref_sea); ?>" placeholder="Sea Vessel Reference #"
                    <?php if ($post->transportation != "sea") { echo " hidden"; } ?>>
                  <input type="text" class="form-control" id="vehicle_color_made" name="vehicle_color_made"
                    value="<?php echo strtoupper($post->vehicle_color_made); ?>" placeholder="Vehicle Color / Made"
                    <?php if ($post->transportation != "land") { echo " hidden"; } ?>>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <div class="input-group" id="depart" <?php if ($post->transportation == "") { echo " hidden"; } ?>>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="departure" name="departure"
                      value="<?php echo strtoupper($post->departure); ?>" placeholder="Date of Departure"
                      data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                  <div class="input-group" id="departtime"
                    <?php if ($post->transportation == "" || $post->transportation == "land") { echo " hidden"; } ?>>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-clock"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="departure_time" name="departure_time"
                      value="<?php echo strtoupper($post->departure_time); ?>" placeholder="Time of Departure"
                      data-inputmask-alias="datetime" data-inputmask-inputformat="hh:MM TT" data-mask>
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
          <?php endforeach; ?>
          <?php endif; ?>
        </form>
      </div>
    </section>
  </div>

  <script>
    function checkform() {
      var transpo = $('#transportation').val();
      var airline = $('#airline').val();
      var ref_air = $('#ref_air').val();
      var sea_vessel = $('#sea_vessel').val();
      var ref_sea = $('#ref_sea').val();
      var plate_no = $('#plate_no').val();
      var vehicle_color_made = $('#vehicle_color_made').val();
      var departure = $('#departure').val();
      var departure_time = $('#departure_time').val();
      var plate_no = $('#plate_no').val();

      if (transpo == "air") {
        if (airline == "") {
          alert('Please select airline.');
          return false;
        }
        if (ref_air == "") {
          alert('Please enter airline reference #.');
          return false;
        }
        if (departure == "") {
          alert('Please enter departure date.');
          return false;
        }
        if (departure_time == "") {
          alert('Please enter departure time.');
          return false;
        }
      } else if (transpo == "sea") {
        if (sea_vessel == "") {
          alert('Please select sea vessel.');
          return false;
        }
        if (ref_sea == "") {
          alert('Please enter sea vessel reference #.');
          return false;
        }
        if (departure == "") {
          alert('Please enter departure date.');
          return false;
        }
        if (departure_time == "") {
          alert('Please enter departure time.');
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
      var ref_air = document.getElementById("ref_air");
      var sea_vessel = document.getElementById("sea_vessel");
      var ref_sea = document.getElementById("ref_sea");
      var plate_no = document.getElementById("plate_no");
      var vehicle_color_made = document.getElementById("vehicle_color_made");
      var depart = document.getElementById("depart");
      var departtime = document.getElementById("departtime");
      if (transpo == "air") {
        /-- date --/
        depart.hidden = false;
        departtime.hidden = false;
        /-- air --/
        airline.hidden = false;
        airline.selectedIndex = 0;
        ref_air.hidden = false;
        ref_air.value = "";
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        ref_sea.hidden = true;
        ref_sea.value = "";
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      } else if (transpo == "sea") {
        /-- date --/
        depart.hidden = false;
        departtime.hidden = false;
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        ref_air.hidden = true;
        ref_air.value = "";
        /-- sea --/
        sea_vessel.hidden = false;
        sea_vessel.selectedIndex = 0;
        ref_sea.hidden = false;
        ref_sea.value = "";
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      } else if (transpo == "land") {
        /-- date --/
        depart.hidden = false;
        departtime.hidden = true;
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        ref_air.hidden = true;
        ref_air.value = "";
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        ref_sea.hidden = true;
        ref_sea.value = "";
        /-- land --/
        plate_no.hidden = false;
        plate_no.value = "";
        vehicle_color_made.hidden = false;
        vehicle_color_made.value = "";
      } else {
        /-- date --/
        depart.hidden = true;
        departtime.hidden = true;
        depart.value = "";
        departtime.value = "";
        /-- air --/
        airline.hidden = true;
        airline.selectedIndex = 0;
        ref_air.hidden = true;
        ref_air.value = "";
        /-- sea --/
        sea_vessel.hidden = true;
        sea_vessel.selectedIndex = 0;
        ref_sea.hidden = true;
        ref_sea.value = "";
        /-- land --/
        plate_no.hidden = true;
        plate_no.value = "";
        vehicle_color_made.hidden = true;
        vehicle_color_made.value = "";
      }
    }
  </script>