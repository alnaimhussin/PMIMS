<?php $session = \Config\Services::session(); ?>

<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data"
          action="javascript:void(0)">
          <div class="modal-header">
            <h4 class="modal-title">Add New Employee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height:70vh">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                          href="#employee_information" role="tab" aria-controls="custom-tabs-one-home"
                          aria-selected="true">Employee Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#employment"
                          role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Employment</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                          href="#contact_information" role="tab" aria-controls="custom-tabs-one-messages"
                          aria-selected="false">Contact Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                          href="#educational_background" role="tab" aria-controls="custom-tabs-one-settings"
                          aria-selected="false">Educational Background</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#civil_service"
                          role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Civil Service
                          Eligibility</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="employee_information" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Information</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="row">
                              <div class="col-5">
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Lastname</span>
                                  </div>
                                  <input type="text" class="form-control" id="lastname" name="lastname"
                                    onChange="checkDuplicateName(lastname.value,firstname.value,middlename.value)">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Firstname</span>
                                  </div>
                                  <input type="text" class="form-control" id="firstname" name="firstname"
                                    onChange="checkDuplicateName(lastname.value,firstname.value,middlename.value)">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Middlename</span>
                                  </div>
                                  <input type="text" class="form-control" id="middlename" name="middlename"
                                    onChange="checkDuplicateName(lastname.value,firstname.value,middlename.value)">
                                  <input type="text" class="form-control col-2" id="initial" name="initial"
                                    placeholder="initial" style="width:10px">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Big ID Name</span>
                                  </div>
                                  <input type="text" class="form-control" id="nickname" name="nickname" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Date of Birth</span>
                                  </div>
                                  <input type="text" class="form-control datemask" id="birthdate" name="birthdate"
                                    data-inputmask='"mask": "99-99-9999"' data-mask
                                    onChange="checkFormatDate(this.value)">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Place of Birth</span>
                                  </div>
                                  <input type="text" class="form-control" id="birthplace" name="birthplace"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Gender</span>
                                  </div>
                                  <select class="form-control select2" id="gender" name="gender" style="width: 65.3%;">
                                    <option selected="selected">--</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Civil Status</span>
                                  </div>
                                  <select class="form-control select2" id="civilstatus" name="civilstatus"
                                    style="width: 65.3%;">
                                    <option selected="selected">--</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Widowed</option>
                                    <option>Separated</option>
                                    <option>Other/s</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-4">
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Title/Profession</span>
                                  </div>
                                  <select class="form-control select2" id="prof_code" name="prof_code"
                                    style="width: 56.3%;">
                                    <option selected="selected">--</option>
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
                                  <input type="text" class="form-control" id="exname" name="exname" placeholder="">
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
                                  <input type="text" class="form-control" id="height" name="height" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Weight</span>
                                  </div>
                                  <input type="text" class="form-control" id="weight" name="weight" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Blood Type</span>
                                  </div>
                                  <input type="text" class="form-control" id="bloodtype" name="bloodtype"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Mobile No.</span>
                                  </div>
                                  <input type="text" class="form-control" id="contact" name="contact"
                                    data-inputmask='"mask": "9999-999-9999"' data-mask>
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Email Address</span>
                                  </div>
                                  <input type="text" class="form-control" id="email" name="email" placeholder="">
                                </div>
                              </div>

                              <div class="col-3">
                                <div class="input-group mb-1">
                                  <button type="button" class="btn btn-primary ml-1" id="addProfession"
                                    data-toggle="modal" data-target="#modal-addProfession" style="width:50px"><i
                                      class="fas fa-plus"></i></button>
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
                                  <input type="text" class="form-control" id="gsis" name="gsis" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">Pag-Ibig</span>
                                  </div>
                                  <input type="text" class="form-control" id="pagibig" name="pagibig" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">Philhealth</span>
                                  </div>
                                  <input type="text" class="form-control" id="philhealth" name="philhealth"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">SSS</span>
                                  </div>
                                  <input type="text" class="form-control" id="sss" name="sss" placeholder="">
                                </div>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 110px">TIN</span>
                                  </div>
                                  <input type="text" class="form-control" id="tin" name="tin" placeholder="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="employment" role="tabpanel"
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
                              <select class="form-control select2" id="status" name="status" style="width: 84.9%;">
                                <option value="" selected="selected">--</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Casual">Casual</option>
                                <option value="JO">Job Order</option>
                              </select>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Department</span>
                              </div>
                              <select class="form-control select2" id="dept_code" name="dept_code"
                                style="width: 84.9%;">
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
                              <select class="form-control select2" id="pos_code" name="pos_code" style="width: 79.8%;">
                                <?php if ($position) : ?>
                                <?php foreach ($position->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->id) ?>">
                                  <?php echo strtoupper($post->position) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <button type="button" class="btn btn-primary ml-1" id="addPosition" data-toggle="modal"
                                data-target="#modal-addPosition" style="width:50px"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 160px">Salary Grade</span>
                              </div>
                              <select class="form-control select2" id="sg_code" name="sg_code" style="width: 84.9%;">
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
                              <input type="text" class="form-control" id="pgbid" name="pgbid"
                                onChange="checkDuplicateID(this.value)">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact_information" role="tabpanel"
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
                                  <input type="text" class="form-control" id="e_lastname" name="e_lastname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Firstname</span>
                                  </div>
                                  <input type="text" class="form-control" id="e_firstname" name="e_firstname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Middlename</span>
                                  </div>
                                  <input type="text" class="form-control" id="e_middlename" name="e_middlename"
                                    placeholder="">
                                </div>
                              </div>
                              <div class="col-6" style="padding: 1px">
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Relation</span>
                                  </div>
                                  <select class="form-control select2" id="e_relation" name="e_relation"
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
                                  <input type="text" class="form-control" id="e_extname" name="e_extname"
                                    placeholder="">
                                </div>
                                <div class="input-group mb-1 col-sm-12 col-lg-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Contact #</span>
                                  </div>
                                  <input type="text" class="form-control" id="e_contact" name="e_contact"
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
                              <input type="text" class="form-control col-4" id="r_lot" name="r_lot"
                                placeholder="House/Block/Lot No.">
                              <input type="text" class="form-control col-4" id="r_street" name="r_street"
                                placeholder="Street">
                              <input type="text" class="form-control col-4" id="r_village" name="r_village"
                                placeholder="Subdivision/Village">
                            </div>
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="r_province" name="r_province"
                                style="width: 33.4%;">
                                <option value="" selected="selected">Province</option>
                                <?php if ($province) : ?>
                                <?php foreach ($province->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->psgcCode) ?>">
                                  <?php echo strtoupper($post->provDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <select class="form-control select2" id="r_citymunicipal" name="r_citymunicipal"
                                style="width: 33.3%;">
                                <option value="" selected="selected">City / Municipal</option>
                                <?php if ($citymunicipal) : ?>
                                <?php foreach ($citymunicipal->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->citymunCode) ?>">
                                  <?php echo strtoupper($post->citymunDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <input type="text" class="form-control col-4" id="r_barangay" name="r_barangay"
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
                              <input type="text" class="form-control col-4" id="p_lot" name="p_lot"
                                placeholder="House/Block/Lot No.">
                              <input type="text" class="form-control col-4" id="p_street" name="p_street"
                                placeholder="Street">
                              <input type="text" class="form-control col-4" id="p_village" name="p_village"
                                placeholder="Subdivision/Village">
                            </div>
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="p_province" name="p_province"
                                style="width: 33.4%;">
                                <option value="" selected="selected">Province</option>
                                <?php if ($province) : ?>
                                <?php foreach ($province->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->psgcCode) ?>">
                                  <?php echo strtoupper($post->provDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <select class="form-control select2" id="p_citymunicipal" name="p_citymunicipal"
                                style="width: 33.3%;">
                                <option value="" selected="selected">City / Municipal</option>
                                <?php if ($citymunicipal) : ?>
                                <?php foreach ($citymunicipal->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->citymunCode) ?>">
                                  <?php echo strtoupper($post->citymunDesc) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                              <input type="text" class="form-control col-4" id="p_barangay" name="p_barangay"
                                placeholder="Barangay">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="educational_background" role="tabpanel"
                        aria-labelledby="custom-tabs-one-settings-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Educational Background</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <select class="form-control select2" id="category" name="category" style="width: 18%;">
                                <option selected="selected">--</option>
                                <option value="Elementary">Elementary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Vocational">Vocational</option>
                                <option value="College">College</option>
                                <option value="Graduate Studies">Graduate Studies</option>
                              </select>
                              <input type="text" class="form-control" id="name_school" name="name_school"
                                placeholder="Name of School">
                            </div>
                            <div class="input-group mb-1">
                              <input type="text" class="form-control" id="degree" name="degree"
                                placeholder="Basic Education/Degree/Course">
                              <input type="text" class="form-control col-2" id="level_earned" name="level_earned"
                                placeholder="Level Earned">
                              <input type="text" class="form-control col-2" id="year_graduate" name="year_graduate"
                                placeholder="Year Graduated">
                            </div>
                            <div>
                              <button type="button" class="add-row-education btn btn-primary col-2">Add</button>
                              <button type="button" class="delete-row-education btn btn-danger col-2">Delete
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
                              <tbody id="education" name="education" style="font-size:14px">

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="civil_service" role="tabpanel"
                        aria-labelledby="custom-tabs-one-settings-tab">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Civil Service Eligibility</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <input type="text" class="form-control" id="eligibility" name="eligibility"
                                placeholder="Eligibility">
                              <input type="text" class="form-control col-2" id="licensenumber" name="licensenumber"
                                placeholder="Number">
                              <input type="text" class="form-control col-2" id="validity" name="validity"
                                placeholder="Validity">
                            </div>
                            <div>
                              <button type="button" class="add-row-eligibility btn btn-primary col-2">Add</button>
                              <button type="button" class="delete-row-eligibility btn btn-danger col-2">Delete
                                Row</button>
                            </div>
                            <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                              style="margin-top:10px">
                              <thead style="text-align: center">
                                <tr style="line-height: 10px">
                                  <th style="width:5%"></th>
                                  <th style="width:50%">Eligibility</th>
                                  <th style="width:25%">License Number</th>
                                  <th style="width:20%">Validity</th>
                                </tr>
                              </thead>
                              <tbody id="eligibility_table" name="eligibility_table" style="font-size:14px">

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
            <button type="button" class="btn btn-default col-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary col-2" id="addButton" disabled>Add Employee</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-addPosition">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info color-palette">
          <h4 class="modal-title">Add Position</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form id="formPosition" class="form-horizontal" method="post" enctype="multipart/form-data"
          action="javascript:void(0)">
          <div class="modal-body bg-light disabled color-palette">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Position</span>
              </div>
              <input type="text" class="form-control col-12" id="position" name="position" placeholder="position">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Description</span>
              </div>
              <input type="text" class="form-control col-12" id="description" name="description"
                placeholder="Description">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Code</span>
              </div>
              <input type="text" class="form-control" id="pos_code" name="pos_code" placeholder="Position Code">
            </div>
          </div>
          <div class="modal-footer bg-info color-palette">
            <input type="text" class="invisible" id="caller" name="caller" placeholder="" value="employee">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal"
              onclick="addPosition()">Add Position</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-addProfession">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info color-palette">
          <h4 class="modal-title">Add Profession</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form id="formProfession" class="form-horizontal" method="post" enctype="multipart/form-data"
          action="javascript:void(0)">
          <div class="modal-body bg-light disabled color-palette">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Profession</span>
              </div>
              <input type="text" class="form-control col-12" id="profession" name="profession" placeholder="Profession">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Description</span>
              </div>
              <input type="text" class="form-control col-12" id="description" name="description"
                placeholder="Description">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Code</span>
              </div>
              <input type="text" class="form-control" id="prof_code" name="prof_code" placeholder="Profession Code">
            </div>
          </div>
          <div class="modal-footer bg-info color-palette">
            <input type="text" class="invisible" id="caller" name="caller" placeholder="" value="employee">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal"
              onclick="addProfession()">Add Profession</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>