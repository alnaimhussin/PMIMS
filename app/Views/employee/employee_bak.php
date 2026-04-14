<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employee List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php $set = \Config\Services::session()->getFlashdata('validation'); ?>
  <?php $error = \Config\Services::session()->getFlashdata('error'); ?>
  <?php $txt = \Config\Services::validation()->listErrors(); ?>

  <div class="col-lg-6" <?php if ($set != "true") { echo "hidden"; $set = "false"; } ?>>
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row" style=" margin-bottom: 10px">
        <div class="col-12">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"
            style="width: 200px">Add New Employee</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-transfer"
            style="width: 200px">Edit Employee</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg"
            style="width: 200px">Delete Employee</button>
        </div>
      </div>

      <div class="row" style=" margin-bottom: 10px">
        <div class="col-12">
          <div class="row">
            <div class="col-4">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width: 150px">Department</span>
                </div>
                <select class="form-control select2" id="searchDept" name="searchDept" style="width: 75%;">
                  <option selected="selected" value="0">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                  <option value="<?php echo strtoupper($post->dept_code) ?>"><?php echo strtoupper($post->department) ?>
                  </option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width: 150px">Position</span>
                </div>
                <select class="form-control select2" id="searchPos" name="searchPos" style="width: 75%;">
                  <option selected="selected" value="0">--</option>
                  <?php if ($position) : ?>
                  <?php foreach ($position->getResult() as $post) : ?>
                  <option value="<?php echo strtoupper($post->pos_code) ?>"><?php echo strtoupper($post->position) ?>
                  </option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-1">
              <button class="btn btn-primary form-control" onclick="search()">Search</button>
            </div>
            <div class="col-1">
              <button class="btn btn-success form-control" onclick="">All</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Employee List</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: auto;">
              <table class="table table-bordered table-head-fixed table-striped text-nowrap">
                <thead style="text-align: center">
                  <tr style="line-height: 10px">
                    <th style="width:10%">PGB ID #</th>
                    <th style="width:20%">Fullname</th>
                    <th style="width:5%">Sex</th>
                    <th style="width:10%">Birthday</th>
                    <th>Department</th>
                    <th style="width:15%">Position</th>
                    <th style="width:10%">Salary Grade</th>
                    <th style="width:10%">Status</th>
                  </tr>
                </thead>
                <tbody id="search" name="search" style="font-size:14px">
                  <?php $n=1; if ($employee) : ?>
                  <?php foreach ($employee->getResult() as $post) : ?>
                  <tr style="line-height: 10px">
                    <td><?php echo strtoupper($post->pgbid) ?></td>
                    <td><?php echo strtoupper($post->lastname . ', ' . $post->firstname . ' ' . $post->middlename) ?>
                    </td>
                    <td><?php echo strtoupper($post->gender) ?></td>
                    <td><?php echo strtoupper($post->birthdate) ?></td>
                    <td><?php echo strtoupper($post->department) ?></td>
                    <td><?php if ($post->position != "na") {echo strtoupper($post->position . ' ( ' . $post->pos_code . ' )' );} ?></td>
                    <td><?php if ($post->sg_code != "na") {echo strtoupper($post->sg_code);} ?></td>
                    <td><?php echo strtoupper($post->status) ?></td>
                  </tr>
                  <?php $n=$n+1; endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
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
                                      onChange="checkDuplicateName()">
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="width: 150px">Firstame</span>
                                    </div>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                      onChange="checkDuplicateName()">
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="width: 150px">Middlename</span>
                                    </div>
                                    <input type="text" class="form-control" id="middlename" name="middlename"
                                      onChange="checkDuplicateName()">
                                    <input type="text" class="form-control col-2" id="initial" name="initial"
                                      placeholder="initial" style="width:10px">
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="width: 150px">Big ID Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="nickname" name="nickname"
                                      placeholder="">
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="width: 150px">Date of Birth</span>
                                    </div>
                                    <input type="text" class="form-control datemask" id="birthdate" name="birthdate"
                                    data-inputmask='"mask": "99-99-9999"' data-mask onChange="checkFormatDate(this.value)">
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
                                    <select class="form-control select2" id="gender" name="gender"
                                      style="width: 65.3%;">
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
                                    <select class="form-control select2" id="profession" name="profession"
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
                                    <button type="button" class="btn btn-primary ml-1" id="addProfession" data-toggle="modal" data-target="#modal-addProfession" style="width:50px"><i class="fas fa-plus"></i></button>
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
                                <select class="form-control select2" id="dept_code" name="dept_code" style="width: 84.9%;">
                                  <option value="na" selected="selected">--</option>
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
                                  <option value="na" selected="selected">--</option>
                                  <?php if ($position) : ?>
                                  <?php foreach ($position->getResult() as $post) : ?>
                                  <option value="<?php echo strtoupper($post->pos_code) ?>">
                                    <?php echo strtoupper($post->position) ?></option>
                                  <?php endforeach; ?>
                                  <?php endif; ?>
                                </select>
                                <button type="button" class="btn btn-primary ml-1" id="addPosition" data-toggle="modal" data-target="#modal-addPosition" style="width:50px"><i class="fas fa-plus"></i></button>
                              </div>
                              <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" style="width: 160px">Salary Grade</span>
                                </div>
                                <select class="form-control select2" id="sg_code" name="sg_code" style="width: 84.9%;">
                                  <option value="na" selected="selected">--</option>
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
                                <input type="text" class="form-control" id="pgbid" name="pgbid" onChange="checkDuplicateID()">
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
          <form id="formPosition" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
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
                <input type="text" class="form-control col-12" id="description" name="description" placeholder="Description">
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
              <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal" onclick="addPosition()">Add Position</button>
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
          <form id="formProfession" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
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
                <input type="text" class="form-control col-12" id="description" name="description" placeholder="Description">
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
              <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal" onclick="addProfession()">Add Profession</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
</div>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  $(document).ready(function () {

//------ INITIALIZATION

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('.datemask').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })

//------ ADD ROW FUNCTION

    $(".add-row-education").click(function () {
      
      var name_school = document.getElementById("name_school");
      var degree = document.getElementById("degree");
      var level_earned = document.getElementById("level_earned");
      var year_graduate = document.getElementById("year_graduate");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + category.value + "</td>"+
                   "<td name='td(2)'>" + name_school.value + "</td>"+
                   "<td name='td(3)'>" + degree.value + "</td>"+
                   "<td name='td(4)'>" + level_earned.value + "</td>"+
                   "<td name='td(5)'>" + year_graduate.value + "</td>"+
                   "</tr>";
      
      $("#education").append(markup);

      category.selectedIndex = 0;
      name_school.value = "";
      degree.value = "";
      level_earned.value = "";
      year_graduate.value = "";
      
    });

    // Find and remove selected table rows
    $(".delete-row-education").click(function () {
      $("#education").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });

    $(".add-row-eligibility").click(function () {
      var eligibility = document.getElementById("eligibility");
      var licensenumber = document.getElementById("licensenumber");
      var validity = document.getElementById("validity");

      var markup = "<tr name='' style='line-height: 10px'>"+
                   "<td><input type='checkbox' name='record'></td>"+
                   "<td name='td(1)'>" + eligibility.value + "</td>"+
                   "<td name='td(2)'>" + licensenumber.value + "</td>"+
                   "<td name='td(3)'>" + validity.value + "</td>"+
                   "</tr>";

      $("#eligibility_table").append(markup);

      eligibility.value = "";
      licensenumber.value = "";
      validity.value = "";
    });

    // Find and remove selected table rows
    $(".delete-row-eligibility").click(function () {
      $("#eligibility_table").find('input[name="record"]').each(function () {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });

    $("#modal-add").on("hidden.bs.modal", function () {
      // $('#myForm')[0].reset();
    });
  });

//------ SAVE FUNCTION

  $(function () {

    // // Adding form validation
    // $('#myForm').validate();

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
          // OR var formData = $(this).serialize();

          //We can add more values to form data
          //formData.append("key", "value");

          $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>/Employee/add",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
              tempID = data;

              var education = new Array();
              var eligibility = new Array();

              $('#education tr').each(function (row, tr) {
                  var education = {
                    'id_' : tempID,
                    'category': $(tr).find('td:eq(1)').text(),
                    'name_school': $(tr).find('td:eq(2)').text(),
                    'degree': $(tr).find('td:eq(3)').text(),
                    'level_earned': $(tr).find('td:eq(4)').text(),
                    'year_graduate': $(tr).find('td:eq(5)').text(),
                  }

                  $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>/Employee/addEducation/",
                    data: education,
                    success: function (data) {
                      // alert(data);
                    }
                  });      
              });

              $('#eligibility_table tr').each(function (row, tr) {              
                  var eligibility = {
                    'id_' : tempID,
                    'eligibility': $(tr).find('td:eq(1)').text(),
                    'license': $(tr).find('td:eq(2)').text(),
                    'validity': $(tr).find('td:eq(3)').text(),
                  }       

                  $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>/Employee/addEligibility/",
                    data: eligibility,
                    success: function (data) {
                      // alert(data);
                    }
                  });
              });
            },
            error: function (e) {
            }
          });      
          window.location = "<?= base_url() ?>/Employee";
        }
      })
    });
  });

  function addPosition() {

    var form = document.getElementById('formPosition');
    var formData = new FormData(form);

    // alert("here");
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "<?= base_url() ?>/Master/addPosition",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
      swal.fire(
          'Save',
          data,
          'success'
        )
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/refreshPos',
        method: "POST",
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          html += '<option value="na" selected="selected">--</option>';
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].pos_code.toUpperCase() +'">' +  data[i].position.toUpperCase() + '</option>'
          }
          $('#pos_code').html(html);
        }
      });
      }
    }); 
  }

function addProfession() {

  var form = document.getElementById('formProfession');
  var formData = new FormData(form);

  $.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "<?= base_url() ?>/Master/addProfession",
    data: formData,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
    swal.fire(
        'Save',
        data,
        'success'
      )
    $.ajax({
      url: '<?php echo base_url(); ?>/dynamic/refreshProf',
      method: "POST",
      async: true,
      dataType: 'json',
      success: function (data) {
        var html = '';
        var i;
        html += '<option value="na" selected="selected">--</option>';
        for (i = 0; i < data.length; i++) {
          html += '<option value="' + data[i].prof_code.toUpperCase() +'">' +  data[i].profession.toUpperCase() + '</option>'
        }
        $('#profession').html(html);
      }
    });
    }
  }); 
}

//------ CHECK FORMAT FUNCTION

  function checkFormatDate(thisDate) {
    var arr = thisDate.split('-');
    if (arr[0]>12) {
      showAlert("warning","Incorrect Format !!!","Incorrect month.");
      document.getElementById("birthdate").className += " is-invalid";
    }else if (arr[1]>31) {
      showAlert("warning","Incorrect Format !!!","Incorrect day.");
      document.getElementById("birthdate").className += " is-invalid";
    } else {
      document.getElementById("birthdate").className = document.getElementById("birthdate").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
    }
    disableButton();
  }

//------ CHECK DUPLICATE FUNCTION

  function checkDuplicateID(thisID) {
    var pgbid = document.getElementById('pgbid');

    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/checkDuplicateID/' + pgbid,
      method: "POST",
      data: {
        pgbid: pgbid.value
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate PGB ID !!!",data);
          document.getElementById("pgbid").className += " is-invalid";
        }else{
          document.getElementById("pgbid").className = document.getElementById("pgbid").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }
  
  function checkDuplicateName() {
    
    var lastname = $('#lastname').val();
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();

    if (middlename!=""){
      var str = middlename;
      var matches = str.match(/\b(\w)/g);
      var initial = matches.join('.');
      
      document.getElementById("initial").value = initial + ".";
    }    

    $.ajax({
      url: '<?php echo base_url(); ?>/Employee/checkDuplicateName/' + lastname + "/" + firstname + "/" + middlename,
      method: "POST",
      data: {
        lastname: lastname,
        firstname: firstname,
        middlename: middlename
      },
      async: true,
      dataType: 'json',
      success: function (data) {
        if (data >= 1) {
          showAlert("warning","Duplicate Name !!!",data);
          document.getElementById("lastname").className += " is-invalid";
          document.getElementById("firstname").className += " is-invalid";
          document.getElementById("middlename").className += " is-invalid";
        }else{
          document.getElementById("lastname").className = document.getElementById("lastname").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
          document.getElementById("firstname").className = document.getElementById("firstname").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
          document.getElementById("middlename").className = document.getElementById("middlename").className.replace( /(?:^|\s)is-invalid(?!\S)/g , '' )
        }
        disableButton();
      }
    });
  }

//------ BUTTON DISABLE FUNCTION

  function checkField() {    
    var lastname = $('#lastname').val();
    var firstname = $('#firstname').val();
    var middlename = $('#middlename').val();
    var nickname = $('#nickname').val();

    var status = $('#status').val();
    var dept_code = $('#dept_code').val();
    var pos_code = $('#pos_code').val();
    var sg_code = $('#sg_code').val();
    var pgbid = $('#pgbid').val();
    
    var e_lastname = $('#e_lastname').val();
    var e_firstname = $('#e_firstname').val();
    var e_middlename = $('#e_middlename').val();
    var e_contact = $('#e_contact').val();

    if (!lastname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!firstname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!middlename) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
    
    if (!nickname) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
  }

  function disableButton() {
    // checkField();
    if ( document.getElementById("lastname").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("birthdate").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else if ( document.getElementById("pgbid").className.match(/(?:^|\s)is-invalid(?!\S)/) ) {
      document.getElementById("addButton").disabled = true;
    } else {
      document.getElementById("addButton").disabled = false;
    }
  }


//------ SEARCH FUNCTION

  function search() {
    var searchDept = $('#searchDept').val();
    var searchPos = $('#searchPos').val();

    if (searchDept != "0") {      
        if (searchPos != 0) {
          $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchByDeptPos/' + searchDept + "/" + searchPos,
            method: "POST",
            data: {
              searchDept: searchDept,
              searchPos: searchPos
            },
            async: true,
            dataType: 'json',
            success: function (data) {
              var html = '';
              var i;
              for (i = 0; i < data.length; i++) {
                html += '<tr>';
                html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
                html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</td>'
                html += '<td>' + data[i].gender.toUpperCase() + '</td>';
                html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
                html += '<td>' + data[i].department.toUpperCase() + '</td>';
                html += '<td>' + data[i].position.toUpperCase() + '( ' + data[i].pos_code.toUpperCase() + ' )' +
                  '</td>';
                html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
                html += '<td>' + data[i].status.toUpperCase() + '</td>';
                html += '</tr>';
              }
              $('#search').html(html);
            }
          });
          return false;
        } else {
          $.ajax({
            url: '<?php echo base_url(); ?>/dynamic/searchByDept/' + searchDept,
            method: "POST",
            data: {
              searchDept: searchDept
            },
            async: true,
            dataType: 'json',
            success: function (data) {
              var html = '';
              var i;
              for (i = 0; i < data.length; i++) {
                html += '<tr>';
                html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
                html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase() + '</td>'
                html += '<td>' + data[i].gender.toUpperCase() + '</td>';
                html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
                html += '<td>' + data[i].department.toUpperCase() + '</td>';
                html += '<td>' + data[i].position.toUpperCase() + '( ' + data[i].pos_code.toUpperCase() + ' )' +
                  '</td>';
                html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
                html += '<td>' + data[i].status.toUpperCase() + '</td>';
                html += '</tr>';
              }
              $('#search').html(html);
            }
          });
          return false;
        }
    } else if (searchPos != "0") {
      $.ajax({
        url: '<?php echo base_url(); ?>/dynamic/searchByPos/' + searchPos,
        method: "POST",
        data: {
          searchPos: searchPos
        },
        async: true,
        dataType: 'json',
        success: function (data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr>';
            html += '<td>' + data[i].pgbid.toUpperCase() + '</td>';
            html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' + data[
              i].middlename.toUpperCase() + '</td>'
            html += '<td>' + data[i].gender.toUpperCase() + '</td>';
            html += '<td>' + data[i].birthdate.toUpperCase() + '</td>';
            html += '<td>' + data[i].department.toUpperCase() + '</td>';
            html += '<td>' + data[i].position.toUpperCase() + '( ' + data[i].pos_code.toUpperCase() + ' )' +
              '</td>';
            html += '<td>' + data[i].sg_code.toUpperCase() + '</td>';
            html += '<td>' + data[i].status.toUpperCase() + '</td>';
            html += '</tr>';
          }
          $('#search').html(html);
        }
      });
      return false;
    }
  }
</script>