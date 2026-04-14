  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Inbound Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Inbound Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Inbound Details</h3>
        </div>
        <?php if ($posts) : ?>
          <?php foreach ($posts->getResult() as $post) : ?>
            <form id="myForm" class="form-horizontal">
              <div class="card-body">
                <div class="box-body">
                  <div class="form-group row">
                    <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Lastname</label>
                    <div class="col-sm-12 col-lg-8">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?php echo strtoupper($post->lastname); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="firstname" class="col-sm-12 col-lg-2 col-form-label">Firstname</label>
                    <div class="col-sm-12 col-lg-8">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?php echo strtoupper($post->firstname); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="middlename" class="col-sm-12 col-lg-2 col-form-lcol-sm-12 col-lg-2abel">Middlename</label>
                    <div class="col-sm-12 col-lg-8">
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" value="<?php echo strtoupper($post->middlename); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="age" class="col-sm-12 col-lg-2 col-form-label">Age</label>
                    <div class="col-sm-5 col-lg-2">
                      <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo strtoupper($post->age); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="birthday" class="col-sm-12 col-lg-2 col-form-label">Birthday</label>
                    <div class="col-sm-5 col-lg-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="birthday" name="birthday" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask value="<?php echo strtoupper($post->birthday); ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="gender" class="col-sm-12 col-lg-2 col-form-label">Gender</label>
                    <div class="col-sm-5 col-lg-2">
                      <select class="form-control" style="font-size: 16px; color:black" id="gender" name="gender" disabled>
                        <option>Select Gender</option>
                        <option <?php if ($post->gender == "Male") {
                                  echo "selected";
                                } ?>>Male</option>
                        <option <?php if ($post->gender == "Female") {
                                  echo "selected";
                                } ?>>Female
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mobile" class="col-sm-12 col-lg-2 col-form-label">Mobile #</label>
                    <div class="col-sm-5 col-lg-2">
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" data-inputmask='"mask": "9999-999-9999"' data-mask value="<?php echo strtoupper($post->mobile); ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="category" class="col-sm-12 col-lg-2 col-form-label">Category</label>
                    <div class="col-sm-12 col-lg-4">
                      <select class="form-control" id="category" name="category" onchange="disable(this.value)" disabled>
                        <option value="">Select Category</option>
                        <option value="1" <?php if ($post->category == "1") {
                                            echo "selected";
                                          } ?>>LSI
                          (Local Stranded Individual)</option>
                        <option value="2" <?php if ($post->category == "2") {
                                            echo "selected";
                                          } ?>>ROF
                          (Returning Overseas Filipino)</option>
                        <option value="3" <?php if ($post->category == "3") {
                                            echo "selected";
                                          } ?>>APOR
                          (Authorized Person outside Residence)</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" id="requirements" <?php if ($post->category == "") {
                                                                  echo "hidden";
                                                                } ?>>
                    <label for="requirements" class="col-sm-12 col-lg-2 col-form-label"></label>
                    <div class="col-sm-12 col-lg-8">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Requirements</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-lg-6" id="medicalcert" <?php if ($post->category == "") {
                                                                                echo "hidden";
                                                                              } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Medical Certificate</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->medicalcert_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="travelauth" <?php if ($post->category == "") {
                                                                                echo "hidden";
                                                                              } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Travel Authority</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->travelauth_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="residency" <?php if ($post->category == "3") {
                                                                              echo "hidden";
                                                                            } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Proof of Residency</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->residency_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="owwa" <?php if ($post->category != "2") {
                                                                          echo "hidden";
                                                                        } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">OWWA Coordination</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->owwa_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="companyid" <?php if ($post->category != "3") {
                                                                              echo "hidden";
                                                                            } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Company ID</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->companyid_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="employmentcert" <?php if ($post->category != "3") {
                                                                                    echo "hidden";
                                                                                  } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Employment Certification</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->employmentcert_image); ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-lg-6" id="travelorder" <?php if ($post->category != "3") {
                                                                                echo "hidden";
                                                                              } ?>>
                              <div class="">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Travel Order</h3>
                                  </div>
                                  <div class="card-body">
                                    <img class="col-sm-12 col-lg-12" src="<?php echo strtoupper(base_url() . $post->travelorder_image); ?>">
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
                    <label for="origins" class="col-sm-12 col-lg-2 col-form-label">Address of Origin</label>
                    <div class="col-sm-12 col-lg-4">
                      <select class="form-control" id="province" name="province" onchange="getRefCityMun()" disabled>
                        <option value="">Select Province</option>
                        <?php if ($province) : ?>
                          <?php foreach ($province->getResult() as $post2) : ?>
                            <option value="<?php echo strtoupper($post2->provCode); ?>" <?php if ($post->province == $post2->provCode) {
                                                                                          echo "selected";
                                                                                        } ?>>
                              <?php echo $post2->provDesc; ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                      <select class="form-control" id="citymun" name="citymun" disabled>
                        <option value="<?php echo strtoupper($post->citymun); ?>">
                          <?php echo strtoupper($post->citymun); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                    <div class="col-sm-12 col-lg-8">
                      <input type="text" class="form-control" id="address1" name="address1" placeholder="Address" value="<?php echo strtoupper($post->address1); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="destination" class="col-sm-12 col-lg-2 col-form-label">Address in Basilan</label>
                    <div class="col-sm-12 col-lg-4">
                      <select class="form-control" id="lgu" name="lgu" onchange="getBarangay()" disabled>
                        <option value="">Select LGU</option>
                        <?php if ($lgu) : ?>
                          <?php foreach ($lgu->getResult() as $post2) : ?>
                            <option value="<?php echo strtoupper($post2->lguCode); ?>" <?php if ($post->lgu == $post2->lguCode) {
                                                                                          echo "selected";
                                                                                        }  ?>>
                              <?php echo strtoupper($post2->lguName); ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                      <select class="form-control" id="barangay" name="barangay" disabled>
                        <option value="<?php echo strtoupper($post->barangay); ?>">
                          <?php echo strtoupper($post->barangay); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="origins" class="col-sm-12 col-lg-2 col-form-label"></label>
                    <div class="col-sm-12 col-lg-8">
                      <input type="text" class="form-control" id="address2" name="address2" placeholder="Address" value="<?php echo strtoupper($post->address2); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="contactperson" class="col-sm-12 col-lg-2 col-form-label">Contact Person</label>
                    <div class="col-sm-12 col-lg-3">
                      <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Contact Name" value="<?php echo strtoupper($post->contactname); ?>" disabled>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                      <select class="form-control" id="contactrelation" name="contactrelation" disabled>
                        <option value="">Relationship</option>
                        <option value="Husband" <?php if ($post->contactrelation == "Husband") {
                                                  echo "selected";
                                                } ?>>
                          Husband
                        </option>
                        <option value="Wife" <?php if ($post->contactrelation == "Wife") {
                                                echo "selected";
                                              } ?>>Wife
                        </option>
                        <option value="Father" <?php if ($post->contactrelation == "Father") {
                                                  echo "selected";
                                                } ?>>Father
                        </option>
                        <option value="Mother" <?php if ($post->contactrelation == "Mother") {
                                                  echo "selected";
                                                } ?>>Mother
                        </option>
                        <option value="Brother" <?php if ($post->contactrelation == "Brother") {
                                                  echo "selected";
                                                } ?>>
                          Brother
                        </option>
                        <option value="Sister" <?php if ($post->contactrelation == "Sister") {
                                                  echo "selected";
                                                } ?>>Sister
                        </option>
                        <option value="Son" <?php if ($post->contactrelation == "Son") {
                                              echo "selected";
                                            } ?>>Son
                        </option>
                        <option value="Daughter" <?php if ($post->contactrelation == "Daughter") {
                                                    echo "selected";
                                                  } ?>>
                          Daughter</option>
                        <option value="Other" <?php if ($post->contactrelation == "Other") {
                                                echo "selected";
                                              } ?>>Other
                        </option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                      <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Contact #" data-inputmask='"mask": "9999-999-9999"' data-mask value="<?php echo strtoupper($post->contactnumber); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="transpo" class="col-sm-12 col-lg-2 col-form-label">Mode of Transportation</label>
                    <div class="col-sm-12 col-lg-2">
                      <select class="form-control" id="transportation" name="transportation" onchange="enableInput()" disabled>
                        <option value="">Select Transportation</option>
                        <option value="air" <?php if ($post->transportation == "air") {
                                              echo "selected";
                                            } ?>>Air</option>
                        <option value="sea" <?php if ($post->transportation == "sea") {
                                              echo "selected";
                                            } ?>>Sea</option>
                        <option value="land" <?php if ($post->transportation == "land") {
                                                echo "selected";
                                              } ?>>Land
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="transpo" class="col-sm-12 col-lg-2 col-form-label"></label>
                    <div class="col-sm-6 col-lg-2">
                      <select class="form-control" id="airline" name="airline" <?php if ($post->transportation != "air") {
                                                                                  echo " hidden";
                                                                                } ?> disabled>
                        <option value="">Select Airline</option>
                        <option value="Philippine Airlines" <?php if ($post->airline == "Philippine Airlines") {
                                                              echo "selected";
                                                            } ?>>Philippine Airlines
                        </option>
                        <option value="Cebu Pacific" <?php if ($post->airline == "Cebu Pacific") {
                                                        echo "selected";
                                                      } ?>>
                          Cebu Pacific</option>
                        <option value="Air Asia" <?php if ($post->airline == "Air Asia") {
                                                    echo "selected";
                                                  } ?>>Air Asia
                        </option>
                        <option value="Other" <?php if ($post->airline == "Other") {
                                                echo "selected";
                                              } ?>>Other</option>
                      </select>
                      <select class="form-control" id="sea_vessel" name="sea_vessel" <?php if ($post->transportation != "sea") {
                                                                                        echo " hidden";
                                                                                      } ?> disabled>
                        <option value="">Select Sea Vessel</option>
                        <option value="2GO" <?php if ($post->sea_vessel == "2GO") {
                                              echo "selected";
                                            } ?>>2GO</option>
                        <option value="MV Stephanie" <?php if ($post->sea_vessel == "MV Stephanie") {
                                                        echo "selected";
                                                      } ?>>
                          MV Stephanie</option>
                        <option value="Other" <?php if ($post->sea_vessel == "Other") {
                                                echo "selected";
                                              } ?>>Other</option>
                      </select>
                      <input type="text" class="form-control" id="plate_no" name="plate_no" value="<?php echo strtoupper($post->plate_no); ?>" placeholder="Plate Number" <?php if ($post->transportation != "land") {
                                                                                                                                                                            echo " hidden";
                                                                                                                                                                          } ?> disabled>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                      <input type="text" class="form-control" id="ref_air" name="ref_air" value="<?php echo strtoupper($post->ref_air); ?>" placeholder="Airline Reference #" <?php if ($post->transportation != "air") {
                                                                                                                                                                                echo " hidden";
                                                                                                                                                                              } ?> disabled>
                      <input type="text" class="form-control" id="ref_sea" name="ref_sea" value="<?php echo strtoupper($post->ref_sea); ?>" placeholder="Sea Vessel Reference #" <?php if ($post->transportation != "sea") {
                                                                                                                                                                                    echo " hidden";
                                                                                                                                                                                  } ?> disabled>
                      <input type="text" class="form-control" id="vehicle_color_made" name="vehicle_color_made" value="<?php echo strtoupper($post->vehicle_color_made); ?>" placeholder="Vehicle Color / Made" <?php if ($post->transportation != "land") {
                                                                                                                                                                                                                  echo " hidden";
                                                                                                                                                                                                                } ?> disabled>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                      <div class="input-group" id="depart" <?php if ($post->transportation == "") {
                                                              echo " hidden";
                                                            } ?>>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" id="departure" name="departure" value="<?php echo strtoupper($post->departure); ?>" placeholder="Date of Departure" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask disabled>
                      </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                      <div class="input-group" id="departtime" <?php if ($post->transportation == "" || $post->transportation == "land") {
                                                                  echo " hidden";
                                                                } ?>>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-clock"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" id="departure_time" name="departure_time" value="<?php echo strtoupper($post->departure_time); ?>" placeholder="Time of Departure" data-inputmask-alias="datetime" data-inputmask-inputformat="hh:MM TT" data-mask disabled>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-footer">
                <div class="box-footer">
                  <div class="row">
                    <div class="col-lg-3" style="margin-left: auto;">
                      <button type="button" class="btn btn-success btn-block btn-flat" style="height: 50px; font-size: 20px" onclick="callme(<?php echo strtoupper($post->id) ?>)">Edit</button>
                    </div>
                    <div class="col-lg-3" style=" margin-right: auto">
                      <button type="button" class="btn btn-primary btn-block btn-flat" style="height: 50px; font-size: 20px" onclick="verify(<?php echo strtoupper($post->id) ?>)">Verify Requirement</button>
                    </div>
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
    function callme(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
      }).then((result) => {
        if (result.value) {
          $id = id;
          window.location.href = "<?php echo base_url() . '/inbound/edit/'; ?>" + id;
        }
      })
    }

    function verify(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "Verify Requirements!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verify it!'
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            title: 'Verified!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.value) {}
          })
        }
      })
    }
  </script>