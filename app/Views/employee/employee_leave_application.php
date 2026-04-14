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

  
        
  /* CSC Leave Types Color Coding */
  .vacation-leave {
      background-color: #d4edda;
      color: #155724;
  }
  
  .sick-leave {
      background-color: #fff3cd;
      color: #856404;
  }
  
  .mandatory-leave {
      background-color: #d1ecf1;
      color: #0c5460;
  }
  
  .special-leave {
      background-color: #f8d7da;
      color: #721c24;
  }
</style>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Leave Application</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Leave Application</li>
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
      
        <div class="col-lg-3 col-sm-12"><!-- START OF COL 4 -->   
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

        <div class="col-lg-6 col-sm-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-file-signature me-2"></i></span>
                </div>
              <h5 class="">Leave Application Form (CSC Form No. 6)</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">  
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Employee Name</span>
                        </div>
                        <input type="text" class="form-control" id="employeeName" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Starting Date</span>
                        </div>
                        <input type="text" class="form-control" id="startingDate" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Position</span>
                        </div>
                        <input type="text" class="form-control" id="position" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Current Grade</span>
                        </div>
                        <input type="text" class="form-control" id="sg_code" name="" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Department</span>
                        </div>
                        <input type="text" class="form-control" id="department" name="" placeholder="" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Type of Leave</span>
                        </div>
                        <select class="form-select" id="leave_type" required>
                            <option value="0">Select leave type</option>
                            <option value="1">Vacation Leave</option>
                            <option value="2">Sick Leave</option>
                            <option value="3">Mandatory/Forced Leave</option>
                            <option value="4">Maternity Leave</option>
                            <option value="5">Paternity Leave</option>
                            <option value="6">Solo Parent Leave</option>
                            <option value="7">Study Leave</option>
                            <option value="8">Rehabilitation Privilege</option>
                            <option value="9">Special Privilege Leave</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Leave Sub-Type</span>
                        </div>
                        <select class="form-select" id="leave_sub_type">
                            <option value="0">Select sub-type if applicable</option>
                            <option value="1">Within the Philippines</option>
                            <option value="2">Abroad (Vacation Only)</option>
                            <option value="3">More than 60 days (Sick Leave)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Start Date</span>
                        </div>
                        <input type="date" class="form-control" id="start_date" onchange="computeDays()" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">End Date</span>
                        </div>
                        <input type="date" class="form-control" id="end_date" onchange="computeDays()" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: auto">Number of Days Applied</span>
                        </div>
                        <input type="text" class="form-control" id="number_days" name="" placeholder="" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: 145px">Commutation</span>
                        </div>
                        <select class="form-select" id="commutation">
                            <option value="1">Not Requested</option>
                            <option value="2">Requested</option>
                            <option value="3">Not Applicable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12" style="">
                      <div class="input-group p-1 ml-0 mb-0">
                        <div class="input-group-prepend">
                          <span for="justification" class="input-group-text required-field" style="width: 145px">Reason/Purpose</span>
                        </div>
                        <textarea class="form-control" id="reason" rows="3" placeholder="" onchange="computeDays()"></textarea>
                      </div>                    
                      <div class="form-text pl-1 mt-0">For Sick Leave exceeding 5 days, attach medical certificate</div>
                    </div>
                    <div class="col-lg-8 col-md-12 ml-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: auto">Contact Details During Leave</span>
                        </div>
                        <input type="text" class="form-control" id="contact_details" placeholder="Mobile number/Email/Address" required>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-0">
                      <div class="input-group p-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width: auto">Supporting Documents</span>
                        </div>
                        <div class="border p-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="med_cert">
                                <label class="form-check-label" for="med_cert">Medical Certificate (for Sick Leave >5 days)</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="travel_order">
                                <label class="form-check-label" for="travel_order">Travel Order (for Vacation Leave Abroad)</label>
                            </div>
                            <div class="mb-3">
                                <label for="otherDocs" class="form-label">Other Documents</label>
                                <input class="form-control" type="file" id="other_docs" multiple>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="d-flex justify-content-between ml-1 mr-1 mb-0 mt-3">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <div>
                      <button type="submit" class="btn btn-outline-primary me-2" id="draftButton">
                        <i class="fas fa-save me-2"></i>Save Draft
                      </button>
                      <button type="submit" class="btn btn-primary mr-2" id="addButton">
                          <i class="fas fa-paper-plane me-2"></i>Submit Application
                      </button>
                    </div>
                  </div>
                </div> 
              </form>
            </div>
          </div>          
        </div>

        <!-- Right Panel - Information -->
        <div class="col-lg-3 col-sm-12">
          <!-- Approval Workflow -->
          <div class="card mb-4">
            <div class=" bg-primary bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-calendar-check me-2"></i></span>
                </div>
              <h5 class="">Leave Credits</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Vacation Leave</h6>
                        <h3 id="vacation_credit" class="text-center text-primary">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Sick Leave</h6>
                        <h3 id="sick_credit" class="text-center text-warning">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Maternity Leave</h6>
                        <h3 id="maternity_credit" class="text-center text-info">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Paternity Leave</h6>
                        <h3 id="paternity_credit" class="text-center text-danger">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Special Previledge Leave</h6>
                        <h3 id="spl_credit" class="text-center text-info">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
                <div class="col-6 mb-1">
                    <div class="leave-balance-card pt-2">
                        <h6 class="text-center">Solo Parent Leave</h6>
                        <h3 id="solo_credit" class="text-center text-danger">0</h3>
                        <p class="small text-center mb-0">days available</p>
                    </div>
                </div>
            </div>
            <hr>
            <p class="small text-muted mb-0">* Leave credits as of <?php echo date('F j, Y'); ?></p>
            </div>
          </div>

          <!-- Salary History -->
          <div class="card mb-4">
            <div class=" bg-info bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-history me-2"></i></span>
                </div>
              <h5 class="">Recent Leave Applications</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="badge vacation-leave leave-type-badge">VL</span>
                            <small class="text-muted">Jun 1-5, 2023</small>
                        </div>
                        <p class="mb-1">Vacation Leave (5 days)</p>
                        <span class="badge bg-success">Approved</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="badge sick-leave leave-type-badge">SL</span>
                            <small class="text-muted">Apr 10-12, 2023</small>
                        </div>
                        <p class="mb-1">Sick Leave (3 days)</p>
                        <span class="badge bg-success">Approved</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="badge mandatory-leave leave-type-badge">ML</span>
                            <small class="text-muted">Dec 20-22, 2022</small>
                        </div>
                        <p class="mb-1">Mandatory Leave (3 days)</p>
                        <span class="badge bg-success">Approved</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="badge special-leave leave-type-badge">SPL</span>
                            <small class="text-muted">Aug 5, 2022</small>
                        </div>
                        <p class="mb-1">Special Privilege (1 day)</p>
                        <span class="badge bg-success">Approved</span>
                    </a>
                </div>
            </div>
          </div>

          <!-- System Information -->
          <div class="card mb-4">
            <div class=" bg-secondary bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-info-circle me-2"></i></span>
                </div>
              <h5 class="">CSC Leave Policies</h5>
            </div>
            <div class="card-body p-10">
              <div class="m-2">
                <ul class="list-unstyled small">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Vacation Leave max of 15 days/year</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Sick Leave max of 15 days/year</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 5-day Mandatory Leave (Dec 20-22 & 27-29)</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Maternity Leave: 105 days</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Paternity Leave: 7 days</li>
                </ul>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>