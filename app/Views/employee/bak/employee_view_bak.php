<?php $session = \Config\Services::session(); ?>

<section class="content">
  <div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <form id="myFormUpdate" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">View Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height:70vh">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1 bg-dark bg-gradient text-white">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                          href="#v_employee_information" role="tab" aria-controls="custom-tabs-one-home"
                          aria-selected="true">Employee Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#v_employment"
                          role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Employment</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                          href="#v_contact_information" role="tab" aria-controls="custom-tabs-one-messages"
                          aria-selected="false">Contact Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                          href="#v_educational_background" role="tab" aria-controls="custom-tabs-one-settings"
                          aria-selected="false">Educational Background</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#v_civil_service"
                          role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Civil Service
                          Eligibility</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="v_employee_information" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">
                        <div class="card card-primary">
                          <div class="card-header bg-dark bg-gradient text-white">
                            <h3 class="card-title">Information</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="row">
                              <div class="col-5">
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Lastname</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_lastname" name="v_lastname"
                                    onChange="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Firstame</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_firstname" name="v_firstname"
                                    onChange="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Middlename</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_middlename" name="v_middlename"
                                    onChange="">
                                  <input type="text" class="form-control col-2" id="v_initial" name="v_initial"
                                    placeholder="initial" style="width:10px">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Big ID Name</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_nickname" name="v_nickname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Date of Birth</span>
                                  </div>
                                  <input type="text" class="form-control datemask" id="v_birthdate" name="v_birthdate"
                                  data-inputmask='"mask": "99-99-9999"' data-mask onChange="checkFormatDate(this.value)">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Place of Birth</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_birthplace" name="v_birthplace"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Gender</span>
                                  </div>
                                  <select class="form-control select2" id="v_gender" name="v_gender"
                                    style="width: 65.3%;">
                                    <option value="" selected="selected">--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Civil Status</span>
                                  </div>
                                  <select class="form-control select2" id="v_civilstatus" name="v_civilstatus"
                                    style="width: 65.3%;">
                                    <option value="--" selected="selected">--</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Other/s">Other/s</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-4">
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Title/Profession</span>
                                  </div>
                                  <select class="form-control select2" id="v_prof_code" name="v_prof_code"
                                    style="width: 56.3%;">
                                    <option value="--" selected="selected">--</option>
                                    <?php if ($profession) : ?>
                                    <?php foreach ($profession->getResult() as $post) : ?>
                                    <option value="<?php echo strtoupper($post->prof_code) ?>">
                                      <?php echo strtoupper($post->profession) ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                  </select>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Ext. Name</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_exname" name="v_exname" placeholder="">
                                </div>
                                <div class="input-group mb-1 invisible">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">hidden</span>
                                  </div>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Height</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_height" name="v_height" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Weight</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_weight" name="v_weight" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Blood Type</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_bloodtype" name="v_bloodtype"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Mobile No.</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_contact" name="v_contact"
                                    data-inputmask='"mask": "9999-999-9999"' data-mask>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Email Address</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_email" name="v_email" placeholder="">
                                </div>
                              </div>

                              <div class="col-3">
                                <div class="input-group mb-1 invisible">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">hidden</span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="input-group mb-1 invisible">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">hidden</span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="input-group mb-1 invisible">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">hidden</span>
                                  </div>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">GSIS</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_gsis" name="v_gsis" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">Pag-Ibig</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_pagibig" name="v_pagibig" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">Philhealth</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_philhealth" name="v_philhealth"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">SSS</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_sss" name="v_sss" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">TIN</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_tin" name="v_tin" placeholder="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="v_employment" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Employment</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Status</span>
                              </div>
                              <select class="form-control select2" id="v_status" name="v_status" style="width: 84.9%;">
                                <option value="--" selected="selected">--</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Casual">Casual</option>
                                <option value="JO">Job Order</option>
                                <option value="Retired">Retired</option>
                                <option value="Disease">Disease</option>
                              </select>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Department</span>
                              </div>
                              <select class="form-control select2" id="v_dept_code" name="v_dept_code" style="width: 84.9%;">
                                <option value="--" selected="selected">--</option>
                                <?php if ($department) : ?>
                                <?php foreach ($department->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->dept_code) ?>">
                                  <?php echo strtoupper($post->department) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Position</span>
                              </div>
                              <select class="form-control select2" id="v_pos_code" name="v_pos_code" style="width: 79.8%;">
                                <?php if ($position) : ?>
                                <?php foreach ($position->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->id) ?>">
                                <?php echo strtoupper($post->position) ?>
                                </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <button type="button" class="btn btn-primary ml-1" id="addPosition" data-toggle="modal" data-target="#modal-addPosition" style="width:50px"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Salary Grade</span>
                              </div>
                              <select class="form-control select2" id="v_sg_code" name="v_sg_code" style="width: 84.9%;">
                                <?php if ($salarygrade) : ?>
                                <?php foreach ($salarygrade->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->sg_code) ?>">
                                  <?php echo strtoupper($post->sg) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Employee ID Number</span>
                              </div>
                              <input type="text" class="form-control" id="v_pgbid" name="v_pgbid" onChange="checkDuplicateID(this.value)">
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="tab-pane fade" id="v_contact_information" role="tabpanel"
                        aria-labelledby="custom-tabs-one-messages-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Contact Information</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="row">
                              <div class="col-6" style="padding: 1px">
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Lastname</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_e_lastname" name="v_e_lastname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Firstname</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_e_firstname" name="v_e_firstname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Middlename</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_e_middlename" name="v_e_middlename"
                                    placeholder="">
                                </div>
                              </div>
                              <div class="col-6" style="padding: 1px">
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Relation</span>
                                  </div>
                                  <select class="form-control select2" id="v_e_relation" name="v_e_relation" 
                                    style="width: 77%;">
                                    <option selected="selected">--</option>
                                    <option>Father</option>
                                    <option>Mother</option>
                                    <option>Husband</option>
                                    <option>Wife</option>
                                    <option>Son</option>
                                    <option>Daughter</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Others</option>
                                  </select>
                                </div>                                
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Ext. Name</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_e_extname" name="v_e_extname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Contact #</span>
                                  </div>
                                  <input type="text" class="form-control" id="v_e_contact" name="v_e_contact"
                                  data-inputmask='"mask": "9999-999-9999"' data-mask>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Residential Addressd</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <input type="text" class="form-control col-4" id="v_r_lot" name="v_r_lot"
                                placeholder="House/Block/Lot No.">
                              <input type="text" class="form-control col-4" id="v_r_street" name="v_r_street"
                                placeholder="Street">
                              <input type="text" class="form-control col-4" id="v_r_village" name="v_r_village"
                                placeholder="Subdivision/Village">
                            </div>
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="v_r_province" name="v_r_province"
                                  style="width: 33.4%;">
                                <option value="--" selected="selected">Province</option>
                                <?php if ($province) : ?>
                                <?php foreach ($province->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->psgcCode) ?>">
                                  <?php echo strtoupper($post->provDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <select class="form-control select2" id="v_r_citymunicipal" name="v_r_citymunicipal"
                                  style="width: 33.3%;">
                                <option value="--" selected="selected">City / Municipal</option>
                                <?php if ($citymunicipal) : ?>
                                <?php foreach ($citymunicipal->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->citymunCode) ?>">
                                  <?php echo strtoupper($post->citymunDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <input type="text" class="form-control col-4" id="v_r_barangay" name="v_r_barangay"
                                placeholder="Barangay">
                            </div>
                          </div>
                        </div>
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Permanent Addressd</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <input type="text" class="form-control col-4" id="v_p_lot" name="v_p_lot"
                                placeholder="House/Block/Lot No.">
                              <input type="text" class="form-control col-4" id="v_p_street" name="v_p_street"
                                placeholder="Street">
                              <input type="text" class="form-control col-4" id="v_p_village" name="v_p_village"
                                placeholder="Subdivision/Village">
                            </div>
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="v_p_province" name="v_p_province"
                                  style="width: 33.4%;">
                                <option value="--" selected="selected">Province</option>
                                <?php if ($province) : ?>
                                <?php foreach ($province->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->psgcCode) ?>">
                                  <?php echo strtoupper($post->provDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <select class="form-control select2" id="v_p_citymunicipal" name="v_p_citymunicipal"
                                  style="width: 33.3%;">
                                <option value="--" selected="selected">City / Municipal</option>
                                <?php if ($citymunicipal) : ?>
                                <?php foreach ($citymunicipal->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->citymunCode) ?>">
                                  <?php echo strtoupper($post->citymunDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <input type="text" class="form-control col-4" id="v_p_barangay" name="v_p_barangay"
                                placeholder="Barangay">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="v_educational_background" role="tabpanel"
                        aria-labelledby="custom-tabs-one-settings-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Educational Background</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="v_category" name="v_category" style="width: 18%;">
                                <option selected="selected">--</option>
                                <option value="Elementary">Elementary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Vocational">Vocational</option>
                                <option value="College">College</option>
                                <option value="Graduate Studies">Graduate Studies</option>
                              </select>
                              <input type="text" class="form-control" id="v_name_school" name="v_name_school"
                                placeholder="Name of School">
                            </div>
                            <div class="input-group mb-1">
                              <input type="text" class="form-control" id="v_degree" name="v_degree"
                                placeholder="Basic Education/Degree/Course">
                              <input type="text" class="form-control col-2" id="v_level_earned" name="v_level_earned"
                                placeholder="Level Earned">
                              <input type="text" class="form-control col-2" id="v_year_graduate" name="v_year_graduate"
                                placeholder="Year Graduated">
                            </div>
                            <div>
                              <button type="button" class="v_add-row-education btn btn-primary col-2">Add</button>
                              <button type="button" class="v_delete-row-education btn btn-danger col-2">Delete
                                Row</button>
                            </div>
                            
                            <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                              style="margin-top:10px">
                              <thead style="text-align: center">
                                <tr style="line-height: 10px">
                                  <th style="width:5%"></th>
                                  <th style="width:10%"></th>
                                  <th style="width:35%">School name</th>
                                  <th style="width:30%">Course</th>
                                  <th style="width:10%">Level Earned</th>
                                  <th style="width:10%">Year Graduated</th>
                                </tr>
                              </thead>
                              <tbody id="v_education" name="v_education" style="font-size:14px">

                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="v_civil_service" role="tabpanel"
                        aria-labelledby="custom-tabs-one-settings-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Civil Service Eligibility</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <input type="text" class="form-control" id="v_eligibility" name="v_eligibility"
                                placeholder="Eligibility">
                              <input type="text" class="form-control col-2" id="v_licensenumber" name="v_licensenumber"
                                placeholder="Number">
                              <input type="text" class="form-control col-2" id="v_validity" name="v_validity"
                                placeholder="Validity">
                            </div>
                            <div>
                              <button type="button" class="v_add-row-eligibility btn btn-primary col-2">Add</button>
                              <button type="button" class="v_delete-row-eligibility btn btn-danger col-2">Delete
                                Row</button>
                            </div>
                        
                            <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                              style="margin-top:10px">
                              <thead style="text-align: center">
                                  <th style="width:5%"></th>
                                  <th style="width:50%">Eligibility</th>
                                  <th style="width:25%">License Number</th>
                                  <th style="width:20%">Validity</th>
                                </tr>
                              </thead>
                              <tbody id="v_eligibility_table" name="v_eligibility_table" style="font-size:14px">

                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="text" class="form-control invisible" id="v_id" name="v_id">
            <button type="button" class="btn btn-default col-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary col-2" id="updateButton">Update Employee</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>