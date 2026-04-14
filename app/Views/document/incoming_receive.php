

<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">Receive Incoming</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height:85vh">
            <div class="row">
              <div class="col-lg-2 col-sm-12">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-information-tab" data-toggle="pill" href="#vert-tabs-information" role="tab" aria-controls="vert-tabs-information" aria-selected="true">Information</a>
                  <a class="nav-link" id="vert-tabs-employment-tab" data-toggle="pill" href="#vert-tabs-employment" role="tab" aria-controls="vert-tabs-employment" aria-selected="false">Employment</a>
                  <a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="false">Contact Information</a>
                  <a class="nav-link" id="vert-tabs-educback-tab" data-toggle="pill" href="#vert-tabs-educback" role="tab" aria-controls="vert-tabs-educback" aria-selected="false">Educational Background</a>
                  <a class="nav-link" id="vert-tabs-eligibility-tab" data-toggle="pill" href="#vert-tabs-eligibility" role="tab" aria-controls="vert-tabs-eligibility" aria-selected="false">Eligibility</a>
                </div>
              </div>
              <div class="col-lg-10 col-sm-12 mt-lg-0 mt-3">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-information" role="tabpanel" aria-labelledby="vert-tabs-information-tab">
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
                              <select class="form-control" id="gender" name="gender" style="width: 65.3%;">
                                <option selected="selected">--</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Civil Status</span>
                              </div>
                              <select class="form-control" id="civilstatus" name="civilstatus"
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
                              <select class="form-control" id="prof_code" name="prof_code"
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

                  <div class="tab-pane fade" id="vert-tabs-employment" role="tabpanel" aria-labelledby="vert-tabs-employment-tab">
                    <div class="card card-primary">
                      <div class="card-header bg-dark bg-gradient text-white">
                        <h3 class="card-title">Employment</h3>
                      </div>
                      <div class="card-body" style="padding: 5px">
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Status</span>
                          </div>
                          <select class="form-control" id="status" name="status" style="width: 84.9%;" onChange="checkJOID()">
                            <option value="" selected="selected">--</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Casual">Casual</option>
                            <option value="JO">Job Order</option>
                            <option value="Contractual">Contractual</option>
                          </select>
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Department</span>
                          </div>
                          <select class="form-control" id="dept_code" name="dept_code"
                            style="width: 84.9%;" onChange="checkJOID()">
                            <option selected="0">--</option>
                            <?php if ($department) : ?>
                            <?php foreach ($department->getResult() as $post) : ?>
                            <option value="<?php echo strtoupper($post->id_) ?>">
                              <?php echo strtoupper($post->department) ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Position</span>
                          </div>
                          <select class="form-control" id="pos_code" name="pos_code" style="width: 79.8%;">
                            <option selected="0">--</option>
                            <?php if ($position) : ?>
                            <?php foreach ($position->getResult() as $post) : ?>
                            <option value=<?php echo strtoupper($post->id) ?>>
                              <?php echo strtoupper($post->position); if($post->sub_position) { echo "-".$post->sub_position; } ?></option>
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
                          <select class="form-control" id="sg_code" name="sg_code" style="width: 84.9%;">
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
                          <input type="text" class="form-control" id="pgbid" name="pgbid" onChange="checkDuplicateID(this.value)">
                        </div>
                      </div>
                    </div>                  
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
                    <div class="card card-primary">
                      <div class="card-header bg-dark bg-gradient text-white">
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
                              <select class="form-control" id="e_relation" name="e_relation"
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
                      <div class="card-header bg-dark bg-gradient text-white">
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
                          <select class="form-control" id="r_province" name="r_province"
                            style="width: 33.4%;">
                            <option value="" selected="selected">Province</option>
                            <?php if ($province) : ?>
                            <?php foreach ($province->getResult() as $post) : ?>
                            <option value="<?php echo strtoupper($post->psgcCode) ?>">
                              <?php echo strtoupper($post->provDesc) ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <select class="form-control" id="r_citymunicipal" name="r_citymunicipal"
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
                      <div class="card-header bg-dark bg-gradient text-white">
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
                          <select class="form-control" id="p_province" name="p_province"
                            style="width: 33.4%;">
                            <option value="" selected="selected">Province</option>
                            <?php if ($province) : ?>
                            <?php foreach ($province->getResult() as $post) : ?>
                            <option value="<?php echo strtoupper($post->psgcCode) ?>">
                              <?php echo strtoupper($post->provDesc) ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <select class="form-control" id="p_citymunicipal" name="p_citymunicipal"
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

                  <div class="tab-pane fade" id="vert-tabs-educback" role="tabpanel" aria-labelledby="vert-tabs-educback-tab">
                    <div class="card card-primary">
                      <div class="card-header bg-dark bg-gradient text-white">
                        <h3 class="card-title">Educational Background</h3>
                      </div>
                      <div class="card-body" style="padding: 5px">
                        <div class="input-group mb-1">
                          <select class="form-control" id="category" name="category" style="width: 18%;">
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

                  <div class="tab-pane fade" id="vert-tabs-eligibility" role="tabpanel" aria-labelledby="vert-tabs-eligibility-tab">  
                    <div class="card card-primary">
                      <div class="card-header bg-dark bg-gradient text-white">
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
          <div class="modal-footer">
            <div class="col-5">
              <div class="row pl-2 pr-2 mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end">   
                <button type="button" class="col-5 btn btn-dark mr-1 bg-red border-0" data-dismiss="modal">Close</button>
                <button type="submit" class="col-5 btn btn-dark" id="addButton" disabled>Add Employee</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
