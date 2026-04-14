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
          <h1>Employee Service Record</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Employee Service Record</li>
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
        <div class="col-lg-6">
          <!-- START OF COL 12 --> 
          <div class="col-lg-12 col-sm-12">  
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
                    <div class="col-lg-6 col-md-12 ml-0">
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
                    <div class="col-lg-6 col-md-12" style="">
                      <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 200px;">
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
          </div>
          <!-- END OF COL 12 --> 
          <!-- START OF COL 12 --> 
          <div class="col-lg-12 col-sm-12">   
            <!-- EMPLOYEE INFORMATION -->
            <div class="card card-dark text-dark">
              <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                  <div class="card-icon">
                    <span class=""><i class="nav-icon fas fa-users"></i></span>
                  </div>
                <h5 class="">Employee Information</h5>
              </div>
              <div class="pt-2 pb-2" style="height:auto; padding:0px">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Employee Name</span>
                        </div>
                        <input type="text" class="form-control" id="employeeName" name="employeeName" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Department</span>
                        </div>
                        <input type="text" class="form-control" id="department" name="department" placeholder="" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Position</span>
                        </div>
                        <input type="text" class="form-control" id="position" name="position" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Salary Grade</span>
                        </div>
                        <input type="text" class="form-control" id="sg_code" name="sg_code" placeholder="" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Status</span>
                        </div>
                        <input type="text" class="form-control" id="status" name="status" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END OF EMPLOYEE INFORMATION  -->
          </div>
          <!-- END OF COL 12 -->
          <!-- START OF COL 12 --> 
          <div class="col-lg-12 col-sm-12">  
            <!-- SERVICE RECORD ENTRY -->
            <div class="card card-dark text-dark">
              <form id="uploadForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                    <div class="card-icon">
                      <span class=""><i class="nav-icon fas fa-file-alt me-2"></i></span>
                    </div>
                  <h5 class="">Service Record Entry</h5>
                </div>
                <div class="pt-2 pb-2" style="height:auto; padding:0px">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 ml-0" hidden>
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text required-field" style="width: 145px">id</span>
                          </div>
                          <input type="text" class="form-control" id="id_" name="id_" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12" style="">
                        <div class="input-group p-1 ml-0 mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text required-field" style="width: 100px">Start Date</span>
                          </div>
                          <input type="date" class="form-control" id="startDate" name="startDate">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12 ml-0">
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 100px">End Date</span>
                          </div>
                          <input type="date" class="form-control" id="endDate" name="endDate">
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 ml-0">
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text required-field" style="width: 145px">Position Title</span>
                          </div>
                          <input type="text" class="form-control" id="position_title" name="position_title">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12" style="">
                        <div class="input-group p-1 ml-0 mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: auto">Salary Grade/Step</span>
                          </div>
                          <input type="text" class="form-control" id="sg_step" name="sg_step">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12 ml-0">
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text required-field" style="width: 145px">Monthly Salary</span>
                          </div>
                          <input type="text" class="form-control" id="monthly_salary" name="monthly_salary">
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 ml-0">
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text required-field" style="width: auto">Appointment Status</span>
                          </div>
                          <select class="form-select"  id="appointment_status" name="appointment_status">
                            <option value="">Select status</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Co-Terminus">Co-Terminus</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Casual">Casual</option>
                            <option value="Elective">Elective</option>
                        </select>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12" style="">
                        <div class="input-group p-1 ml-0 mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text  required-field" style="width: auto">Department/Agency</span>
                          </div>
                          <input type="text" class="form-control" id="department_agency" name="department_agency" placeholder="Department" >
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12" style="">
                        <div class="input-group p-1 ml-0 mb-0">
                          <div class="input-group-prepend">
                            <span for="justification" class="input-group-text" style="width: 145px">Remarks</span>
                          </div>
                          <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                      <!-- <div class="col-lg-12 col-md-12 mt-0">
                        <div class="input-group p-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: auto">Supporting Documents</span>
                          </div>
                          <input type="file" class="form-control" id="uploadFile" name="uploadFile">
                        </div>
                        <div class="form-text pl-1 mt-0">Upload supporting documents (PDF, JPG, PNG)</div>
                      </div> -->
                    </div>
                    <!-- START OF BUTTON -->
                    <div class="row">
                      <div class="d-flex justify-content-between ml-1 mr-1 mb-0 mt-3">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </button>
                        <div>
                        <button type="submit" class="btn btn-outline-primary me-2">
                              <i class="fas fa-save me-2"></i>Save Record
                        </button>
                        <button type="button" class="btn btn-primary mr-2">
                              <i class="fas fa-print me-2"></i>Print Service Record
                        </button>
                        </div>
                      </div>
                    </div>
                    <!-- END OF BUTTON -->   
                  </div>
                </div>  
              </form>
            </div>
            <!-- END OF SERVICE RECORD ENTRY -->
          </div>
          <!-- END OF COL 12 -->   
        </div>  
        <div class="col-lg-6">
          <!-- SERVICE RECORD LIST -->          
          <div class="card card-dark text-dark">
            <div class=" bg-success bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Service Records</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="service_record_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                  <thead style="text-align: center">
                    <tr style="line-height: 20px">
                      <th style="width:15%">Period</th>
                      <th style="width:20%">Position Title</th>
                      <th style="width:10%">Salary Grade/Step</th>
                      <th style="width:10%">Monthly Salary</th>
                      <th style="width:10%">Appointment Status</th>
                      <th style="width:20%">Department/Agency</th>
                      <th style="width:10%">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="search" name="search" style="font-size:12px">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END OF SERVICE RECORD LIST -->
        </div>  
      </div>
    </div>
  </section>
</div>