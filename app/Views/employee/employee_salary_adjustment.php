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
          <h1>Employee Salary Adjustment</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Employee Salary Adjustment</li>
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
        <div class="col-9">
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
                  <div class="col-lg-4 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Employee ID</span>
                      </div>
                      <input type="text" class="form-control" id="search_pgbid" name="search_pgbid" placeholder="Employee ID">
                      <button class="btn btn-outline-secondary" type="button" id="searchEmployee">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Employee Name</span>
                      </div>
                      <input type="text" class="form-control" id="employeeName" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Current Grade</span>
                      </div>
                      <input type="text" class="form-control" id="" name="" placeholder="Current Grade" readonly>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Current Step</span>
                      </div>
                      <input type="text" class="form-control" id="" name="" placeholder="Current Grade" readonly>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Current Salary</span>
                      </div>
                      <input type="text" class="form-control" id="" name="" placeholder="Current Salary" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Department</span>
                      </div>
                      <input type="text" class="form-control" id="" name="" placeholder="Department" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Position</span>
                      </div>
                      <input type="text" class="form-control" id="" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-money-bill-wave"></i></span>
                </div>
              <h5 class="">Salary Adjustment Details</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Adjustment Type</span>
                      </div>
                      <select class="form-select" id="adjustmentType">
                          <option selected disabled value="">Select type</option>
                          <option value="annual">Annual Increment</option>
                          <option value="promotion">Promotion</option>
                          <option value="demotion">Demotion</option>
                          <option value="reclassification">Reclassification</option>
                          <option value="special">Special Adjustment</option>
                          <option value="correction">Correction</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Effective Date</span>
                      </div>
                      <input type="date" class="form-control" id="effectiveDate">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Approval Status</span>
                      </div>
                      <input type="text" class="form-control" id="approvalStatus" value="Pending" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">New Grade</span>
                      </div>
                      <select class="form-select" id="newGrade">
                        <option selected value="">Same as current</option>
                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>
                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">New Step</span>
                      </div>
                      <select class="form-select" id="newStep">
                        <option selected value="">Same as current</option>
                        <option value="1">Step 1</option>
                        <option value="2">Step 2</option>
                        <option value="3">Step 3</option>
                        <option value="4">Step 4</option>
                        <option value="5">Step 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">New Salary</span>
                      </div>
                      <input type="text" class="form-control" id="newSalary">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-0">
                      <div class="input-group-prepend">
                        <span for="justification" class="input-group-text required-field" style="width: 145px">Justification</span>
                      </div>
                      <textarea class="form-control" id="justification" rows="3" placeholder="Provide detailed justification for this adjustment"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 mt-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: auto">Supporting Documents</span>
                      </div>
                      <input type="file" class="form-control" id="supportingDocs" multiple>
                    </div>
                    <div class="form-text pl-1 mt-0">Upload supporting documents (PDF, JPG, PNG)</div>
                  </div>
                </div>
                <div class="row">
                  <div class="d-flex justify-content-between ml-1 mr-1 mb-0 mt-3">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                  <div>
                  <button type="button" class="btn btn-outline-primary me-2">
                    <i class="fas fa-save me-2"></i>Save Draft
                  </button>
                  <button type="button" class="btn btn-primary mr-2">
                      <i class="fas fa-paper-plane me-2"></i>Submit for Approval
                  </button>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>

        <!-- Right Panel - Information -->
        <div class="col-3">
          <!-- Approval Workflow -->
          <div class="card mb-4">
            <div class=" bg-primary bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-project-diagram me-2"></i></span>
                </div>
              <h5 class="">Approval Workflow</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>1. Initiator</span>
                    <span class="badge bg-success approval-badge">Completed</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>2. Department Head</span>
                    <span class="badge bg-warning text-dark approval-badge">Pending</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>3. HR Officer</span>
                    <span class="badge bg-secondary approval-badge">Not Started</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>4. Finance</span>
                    <span class="badge bg-secondary approval-badge">Not Started</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>5. Final Approval</span>
                    <span class="badge bg-secondary approval-badge">Not Started</span>
                </li>
              </ul>   
            </div>
          </div>

          <!-- Salary History -->
          <div class="card mb-4">
            <div class=" bg-info bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-history me-2"></i></span>
                </div>
              <h5 class="">Salary Adjustment History</h5>
            </div>
            <div class="card-body">
                <div class="history-item">
                    <h6>Promotion to Grade 2</h6>
                    <small class="text-muted">Effective: 01/01/2023</small><br>
                    <span class="badge bg-success">Approved</span>
                    <p class="mb-0 mt-1">Salary increased from P33,200 to P30,500</p>
                </div>
                <div class="history-item">
                    <h6>Annual Increment</h6>
                    <small class="text-muted">Effective: 01/01/2022</small><br>
                    <span class="badge bg-success">Approved</span>
                    <p class="mb-0 mt-1">Salary increased from P30,000 to P33,200</p>
                </div>
                <div class="history-item">
                    <h6>Initial Hiring</h6>
                    <small class="text-muted">Effective: 15/06/2021</small><br>
                    <span class="badge bg-success">Approved</span>
                    <p class="mb-0 mt-1">Initial salary set at P30,000</p>
                </div>
            </div>
          </div>

          <!-- System Information -->
          <div class="card mb-4">
            <div class=" bg-secondary bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-info-circle me-2"></i></span>
                </div>
              <h5 class="">System Information</h5>
            </div>
            <div class="card-body p-10">
              <div class="m-2">
                <dl class="row">
                  <dt class="col-sm-5">Created By:</dt>
                  <dd class="col-sm-7">Admin User</dd>
                  
                  <dt class="col-sm-5">Created On:</dt>
                  <dd class="col-sm-7">2023-06-15 10:30 AM</dd>
                  
                  <dt class="col-sm-5">Last Modified:</dt>
                  <dd class="col-sm-7">2023-06-15 10:30 AM</dd>
                  
                  <dt class="col-sm-5">Reference No:</dt>
                  <dd class="col-sm-7">SA-2023-00615</dd>
                </dl>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>