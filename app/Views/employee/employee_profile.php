<?php $session = \Config\Services::session(); ?>

<style>  
  /* Adjust spacing for input-group */
  .group-no-space {
      margin-left: -20px;
  }
  .form-control, .form-select {
      border-radius: 0 !important;
      background-color: #ffffff; /* White background for normal inputs */
  }
  /* Disabled state */
  .form-control:disabled {
      background-color: #ffffff;
  }
  /* Read-only inputs */
  .form-control[readonly] {
      /* background-color: #f0f0f0; Light gray for readonly */      
      background-color: #ffffff; Light gray for readonly
      color: #555;
  }
  /* Focus state */
  .form-control:focus, .form-select:focus {
      background-color: #fff8e1; /* Light yellow on focus */
      border-color: #003366;
      box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.25);
  }
  /* History item */  
  .history-item {
      border-left: 3px solid #0d6efd;
      padding-left: 10px;
      margin-left: 10px;
      margin-top: 10px;
      margin-bottom: 10px;
  }
  .required-field::after {
      content: " *";
      color: red;
  }
  .approval-badge {
      font-size: 0.8rem;
  }
</style>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Employee Profile</li>
          </ol>
        </div>
      </div>
    </div>
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

  <section class="content">
    <div class="container-fluid">      
      <div class="row p-1 mt-2">
        <div class="col-lg-4 col-sm-12"><!-- START OF COL 4 -->   
          <!-- SEARCH EMPLOYEE -->
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Employee Search</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body">
                <div class="row p-2">
                  <div class="col-lg-12 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Employee ID</span>
                      </div>
                      <input type="text" class="form-control" id="search_employee_id" name="search_employee_id" onchange="searchID()">
                    </div>
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Last Name</span>
                      </div>
                      <input type="text" class="form-control" id="search_employee_last_name" onchange="searchName()">
                    </div>
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">First Name</span>
                      </div>
                      <input type="text" class="form-control" id="search_employee_first_name" onchange="searchName()">
                    </div>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-lg-12 col-md-12" style="">
                    <div class="card">
                      <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-bordered table-head-fixed table-striped table-hover text-wrap">
                          <thead>
                            <tr>
                              <th style="width:20%">Fullname</th>
                              <th style="width:25%">Department</th>
                            </tr>
                          </thead>
                          <tbody id="search_table" name="search_table">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>                  
                </div>                
              </div>
            </div>
          </div>
          <!-- END OF EMPLOYEE INFORMATION  -->           
        </div><!-- END OF COL 4 -->

        <div class="col-lg-8 col-sm-12"><!-- START OF COL --> 
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="card card-secondary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-three-Profile-tab" data-toggle="pill" href="#custom-tabs-three-Profile" role="tab" aria-controls="custom-tabs-three-Profile" aria-selected="true">Personal Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-employment-tab" data-toggle="pill" href="#custom-tabs-three-employment" role="tab" aria-controls="custom-tabs-three-employment" aria-selected="false">Employment Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-contact-tab" data-toggle="pill" href="#custom-tabs-three-contact" role="tab" aria-controls="custom-tabs-three-contact" aria-selected="false">Contact Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-education-tab" data-toggle="pill" href="#custom-tabs-three-education" role="tab" aria-controls="custom-tabs-three-education" aria-selected="false">Education Background</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-eligibility-tab" data-toggle="pill" href="#custom-tabs-three-eligibility" role="tab" aria-controls="custom-tabs-three-eligibility" aria-selected="false">Eligibility</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-service-tab" data-toggle="pill" href="#custom-tabs-three-service" role="tab" aria-controls="custom-tabs-three-service" aria-selected="false">Service Record</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-leave-tab" data-toggle="pill" href="#custom-tabs-three-leave" role="tab" aria-controls="custom-tabs-three-leave" aria-selected="false">Leave Credit</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active p-3" id="custom-tabs-three-Profile" role="tabpanel" aria-labelledby="custom-tabs-three-Profile-tab">
                      <!-- FIRST TAB -->
                      <div class="row"><!-- START OF ROW --> 
                        <div class="col-lg-12"><!-- START OF COL 12 --> 
                          <!-- EMPLOYEE INFORMATION -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Employee Profile</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-3 col-sm-6 mx-auto">
                                    <div class="container">
                                      <div class="image-container text-center">
                                        <img id="employee_picture" src="<?= base_url('assets/img/bg-employee.png') ?>" 
                                              alt="Description of image" 
                                              class="img-fluid rounded shadow">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-9 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6" style="">
                                        <div class="input-group p-1 ml-0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Last Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="lastname" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">First Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="firstname" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Middle Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="middlename" readonly>
                                        </div>                            
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Date of Birth</span>
                                          </div>
                                          <input type="text" class="form-control datemask" id="birthdate" name="birthdate"
                                          data-inputmask='"mask": "99-99-9999"' data-mask onChange="checkFormatDate(this.value)" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Place of Birth</span>
                                          </div>
                                          <input type="text" class="form-control" id="birthplace" name="birthplace"
                                            placeholder="" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6" style="">
                                        <div class="input-group p-1 ml-0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Title / Profession</span>
                                          </div>
                                          <input type="text" class="form-control" id="title" readonly>
                                        </div>
                                        <div class="input-group p-1 ml-0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Ext. Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="ext_name" readonly>
                                        </div>
                                        <div class="input-group mb-1 invisible">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 150px">hidden</span>
                                          </div>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Gender</span>
                                          </div>
                                          <input type="text" class="form-control" id="gender" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Civil Status</span>
                                          </div>
                                          <input type="text" class="form-control" id="civil_status" readonly>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF EMPLOYEE INFORMATION  -->  
                        </div>        
                      </div><!-- END OF COL 12  -->
                      <div class="row"><!-- START OF COL 6  -->
                        <div class="col-lg-6 col-md-12"><!-- START OF COL 6  -->
                          <!-- PERSONAL DETAILS -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Personal Details</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Height</span>
                                          </div>
                                          <input type="text" class="form-control" id="height" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Weight</span>
                                          </div>
                                          <input type="text" class="form-control" id="weight" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Blood Type</span>
                                          </div>
                                          <input type="text" class="form-control" id="blood_type" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Mobile Number</span>
                                          </div>
                                          <input type="text" class="form-control" id="mobile_number" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Email Address</span>
                                          </div>
                                          <input type="text" class="form-control" id="email_address" readonly>
                                        </div>
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF EMPLOYMENT DETAILS  --> 
                        </div><!-- END OF COL 6 -->          
                        <div class="col-lg-6 col-md-12"><!-- START OF COL 6  -->
                          <!--  GOVERNMENT ID -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Government ID</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">GSIS</span>
                                          </div>
                                          <input type="text" class="form-control" id="gsis" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Pag-Ibig</span>
                                          </div>
                                          <input type="text" class="form-control" id="pagibig" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Philhealth</span>
                                          </div>
                                          <input type="text" class="form-control" id="philhealth" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">SSS</span>
                                          </div>
                                          <input type="text" class="form-control" id="sss" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">TIN Number</span>
                                          </div>
                                          <input type="text" class="form-control" id="tin" readonly>
                                        </div>       
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF GOVERNMENT ID  --> 
                        </div><!-- END OF COL 6 -->
                      </div>
                      <!-- FIRST TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-employment" role="tabpanel" aria-labelledby="custom-tabs-three-employment-tab">
                      <!-- SECOND TAB -->
                      <div class="row"><!-- START OF COL 6  -->
                        <div class="col-lg-12 col-md-12"><!-- START OF COL 6  -->
                          <!-- EMPLOYMENT DETAILS -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Employment Details</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Starting Date</span>
                                          </div>
                                          <input type="text" class="form-control" id="startingDate" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Department</span>
                                          </div>
                                          <input type="text" class="form-control" id="department" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Position</span>
                                          </div>
                                          <input type="text" class="form-control" id="position" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">SG / Step</span>
                                          </div>
                                          <input type="text" class="form-control" id="salary_grade_step" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Monthly Rate</span>
                                          </div>
                                          <input type="text" class="form-control" id="monthly_rate" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">ID Number</span>
                                          </div>
                                          <input type="text" class="form-control" id="id_number" name="id_number">
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Status</span>
                                          </div>
                                          <input type="text" class="form-control" id="emp_status" name="emp_status" readonly>
                                        </div>
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF EMPLOYMENT DETAILS  --> 
                        </div><!-- END OF COL 6 -->       
                      </div>
                      <!-- SECOND TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-contact" role="tabpanel" aria-labelledby="custom-tabs-three-contact-tab">
                      <!-- THIRD TAB -->
                      <div class="row"><!-- START OF COL  -->
                        <div class="col-lg-12 col-md-12"><!-- START OF COL 12  -->
                          <!-- CONTACT DETAILS -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Contact Details</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Last Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_last_name" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">First Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_first_name" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Middle Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_middle_name" readonly>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Relation</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_relation" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Ext. Name</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_ext_name">
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Contact Number</span>
                                          </div>
                                          <input type="text" class="form-control" id="contact_contact_number" readonly>
                                        </div>
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF EMPLOYMENT DETAILS  --> 
                        </div><!-- END OF COL 12 -->       
                      </div>
                      <div class="row"><!-- START OF COL 6  -->
                        <div class="col-lg-6 col-md-12"><!-- START OF COL 6  -->
                          <!-- RESIDENTIAL ADDRESS -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Residential Address</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">House No.</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_lot" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Street</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_street" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Subd./Village</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_subdivision" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Province</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_province" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">City / Municipal</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_city_municipal" readonly>
                                        </div>    
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Barangay</span>
                                          </div>
                                          <input type="text" class="form-control" id="res_barangay" readonly>
                                        </div>     
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF RESIDENTIAL ADDRESS  --> 
                        </div><!-- END OF COL 6 -->          
                        <div class="col-lg-6 col-md-12"><!-- START OF COL 6  -->
                          <!--  PERMANENT ADDRESS -->
                          <div class="card card-dark text-dark">
                            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                                <div class="card-icon">
                                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                                </div>
                              <h5 class="">Permanent Address</h5>
                            </div>
                            <div class="pt-2 pb-2" style="height:auto; padding:0px">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-6" style="">
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">House No.</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_lot" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Street</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_street" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Subd./Village</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_subdivision" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Province</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_province" readonly>
                                        </div>
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">City / Municipal</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_city_municipal" readonly>
                                        </div>    
                                        <div class="input-group p-1">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px">Barangay</span>
                                          </div>
                                          <input type="text" class="form-control" id="per_barangay" readonly>
                                        </div>       
                                      </div>                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- END OF PERMANENT ADDRESS  --> 
                        </div><!-- END OF COL 6 -->
                      </div>
                      <!-- THIRD TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-education" role="tabpanel" aria-labelledby="custom-tabs-three-education-tab">
                      <!-- FOURTH TAB -->
                      <div class="card card-dark text-dark">
                        <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                          <h3 class="card-title">Educational Background</h3>
                        </div>
                        <div class="card-body" style="padding: 5px">
                                                 
                          <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                            style="margin-top:10px">
                            <thead style="text-align: center">
                              <tr style="line-height: 10px">
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
                      <!-- FOURTH TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-eligibility" role="tabpanel" aria-labelledby="custom-tabs-three-eligibility-tab">
                      <!-- FIFTH TAB -->
                      <div class="row"><!-- START OF COL  -->
                        <div class="card card-dark text-dark">
                          <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                            <h3 class="card-title">Eligibility</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                                                  
                            <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                              style="margin-top:10px">
                              <thead style="text-align: center">
                                  <th style="width:50%">Eligibility</th>
                                  <th style="width:25%">License Number</th>
                                  <th style="width:20%">Validity</th>
                                </tr>
                              </thead>
                              <tbody id="eligibility" name="eligibility" style="font-size:14px">

                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>  
                      <!-- FIFTH TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-service" role="tabpanel" aria-labelledby="custom-tabs-three-service-tab">
                      <!-- SIXTH TAB -->
                      <div class="row"><!-- START OF COL  -->
                        <div class="card card-dark text-dark">
                          <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                            <h3 class="card-title">Service Record</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                                                  
                            <table id="service_record_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                              <thead style="text-align: center">
                                <tr style="line-height: 20px">
                                  <th style="width:15%">Period</th>
                                  <th style="width:20%">Position Title</th>
                                  <th style="width:10%">Salary Grade/Step</th>
                                  <th style="width:10%">Monthly Salary</th>
                                  <th style="width:10%">Appointment Status</th>
                                  <th style="width:20%">Department/Agency</th>
                                </tr>
                              </thead>
                              <tbody id="search" name="search" style="font-size:12px">
  
                              
                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>  
                      <!-- SIXTH TAB -->
                    </div>
                    <div class="tab-pane fade p-3" id="custom-tabs-three-leave" role="tabpanel" aria-labelledby="custom-tabs-three-leave-tab">
                      <!-- SEVEN TAB -->
                      <div class="row"><!-- START OF COL  -->
                        <div class="card card-dark text-dark">
                          <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                            <h3 class="card-title">Leave Credit</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                                                  
                            <table class="table table-bordered table-head-fixed table-striped text-nowrap"
                              style="margin-top:10px">
                              <thead style="text-align: center">
                                <tr style="line-height: 10px">
                                  <th style="width:50%">Leave</th>
                                  <th style="width:50%">Earned/Remaining</th>
                                </tr>
                              </thead>
                              <tbody id="leave_credit" name="leave_credit" style="font-size:14px">

                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>  
                      <!-- SEVEN TAB -->
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div><!-- END OF COL 8 -->
      </div>
    </div>
  </section>
</div>