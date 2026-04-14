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
  .deduction-card {
            border-left: 4px solid var(--ph-gov-blue);
            transition: all 0.3s;
            margin-bottom: 15px;
        }
        
        .gsis-card {
            border-left-color: var(--gsis-blue);
        }
        
        .philhealth-card {
            border-left-color: var(--philhealth-blue);
        }
        
        .pagibig-card {
            border-left-color: var(--pagibig-orange);
        }
        
        .bir-card {
            border-left-color: var(--bir-red);
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--ph-gov-blue);
        }
        
        .nav-pills .nav-link {
            color: var(--ph-gov-blue);
        }
        
        .deduction-badge {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
        
        .agency-logo {
            height: 30px;
            margin-right: 10px;
        }
</style>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Deduction and Contribution</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Deduction and Contribution</li>
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
        <div class="col-6"><!-- START OF COL 4 -->   
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
                  <div class="col-lg-8 col-md-12 ml-0">
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
          <!-- END OF SEARCH EMPLOYEE  -->  
          <!-- EMPLOYEE INFORMATION -->
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Employee Details</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Employee Name</span>
                      </div>
                      <input type="text" class="form-control" id="employeeName" readonly>
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
                <div class="row">
                  <div class="col-lg-6 col-md-12" style="">
                    <div class="input-group p-1 ml-0 mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Salary Grade</span>
                      </div>
                      <input type="text" class="form-control" id="" name="" placeholder="" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 ml-0">
                    <div class="input-group p-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 145px">Status</span>
                      </div>
                      <input type="text" class="form-control" id="" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF EMPLOYEE INFORMATION  -->           
        </div><!-- END OF COL 4 -->
        <div class="col-6"><!-- START OF COL 6 -->   
          <!-- DEDUCTION AND CONTRIBUTION -->          
          <div class="card card-dark text-dark">
            <div class=" bg-success bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Deductions and Contributions</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body p-3">

                <!-- Landbank Loan -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-success bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <img src="<?php echo base_url('img/landbank.png'); ?>" alt="Landbank Logo" class="agency-logo">
                      </div>
                    <h5 class="">Landbank Loan</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Loan</span>
                            </div>
                            <input type="text" class="form-control" id="membership" readonly>
                          </div>
                        </div>                        
                      </div>                      
                    </div>
                  </div>
                </div>  
                
                <!-- GSIS Deductions -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <img src="<?php echo base_url('img/gsis.svg'); ?>" alt="GSIS Logo" class="agency-logo">   
                      </div>
                    <h5 class="">GSIS Deductions</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Membership</span>
                            </div>
                            <input type="text" class="form-control" id="membership" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Policy Loan</span>
                            </div>
                            <input type="text" class="form-control" id="policy_loan" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Emergency Loan</span>
                            </div>
                            <input type="text" class="form-control" id="emergency_loan" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Consolidated Loan</span>
                            </div>
                            <input type="text" class="form-control" id="consolidated_loan" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Educ. Asst. Loan</span>
                            </div>
                            <input type="text" class="form-control" id="educ_asst_loan" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">GFAL Loan</span>
                            </div>
                            <input type="text" class="form-control" id="gfal_loan" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">MPL Loan</span>
                            </div>
                            <input type="text" class="form-control" id="mpl_loan" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">MPL Lite Loan</span>
                            </div>
                            <input type="text" class="form-control" id="mpl_lite_loan" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Computer Loan</span>
                            </div>
                            <input type="text" class="form-control" id="computer_loan" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1 ml-0 mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Total GSIS Loan</span>
                            </div>
                            <input type="text" class="form-control" id="total_gsis_loan" name="" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>       
              
                <!-- Philhealth Contribution -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <img src="<?php echo base_url('img/philhealth.png'); ?>" alt="PhilHealth Logo" class="agency-logo">
                      </div>
                    <h5 class="">Philhealth Contribution</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Monthly Cont.</span>
                            </div>
                            <input type="text" class="form-control" id="monthly_contribution" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Addt'l Payment</span>
                            </div>
                            <input type="text" class="form-control" id="additional_payment" readonly>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>  

                <!-- Pagibig Contribution -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <img src="<?php echo base_url('img/pagibig.png'); ?>" alt="Pag-Ibig Logo" class="agency-logo">
                      </div>
                    <h5 class="">Pag-Ibig Contribution</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Monthly Savings</span>
                            </div>
                            <input type="text" class="form-control" id="monthly_savings" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Housing Loan</span>
                            </div>
                            <input type="text" class="form-control" id="housing_loan" readonly>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>  

                <!-- BIR Tax Withholdings -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <img src="<?php echo base_url('img/bir.png'); ?>" alt="BIR Logo" class="agency-logo">
                      </div>
                    <h5 class="">BIR Tax Withholdings</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Withholding Tax</span>
                            </div>
                            <input type="text" class="form-control" id="withholding_tax" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Tax Adjustment</span>
                            </div>
                            <input type="text" class="form-control" id="tax_adjustment" readonly>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>   

                <!-- Other Deduction -->                  
                <div class="card card-dark text-dark">
                  <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                      <div class="card-icon">
                        <span class=""><i class="nav-icon fas fa-users"></i></span>
                      </div>
                    <h5 class="">Other Deductions</h5>
                  </div>
                  <div class="pt-2 pb-2" style="height:auto; padding:0px">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12" style="">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Salary Loan</span>
                            </div>
                            <input type="text" class="form-control" id="salary_loan" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Cooperative</span>
                            </div>
                            <input type="text" class="form-control" id="cooperative" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ml-0">
                          <div class="input-group p-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 145px">Other</span>
                            </div>
                            <input type="text" class="form-control" id="other" readonly>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>  

                <!-- START OF BUTTON -->
                <div class="row">
                  <div class="d-flex justify-content-between ml-1 mr-1 mb-0 mt-3">
                    <button type="button" class="btn btn-outline-secondary" disabled>
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <div>
                    <button type="button" class="btn btn-outline-primary mr-2">
                          <i class="fas fa-save me-2"></i>Save Deduction
                    </button>
                    <button type="button" class="btn btn-primary mr-2">
                          <i class="fas fa-print me-2"></i>Print Payslip
                    </button>
                    </div>
                  </div>
                </div>
                <!-- END OF BUTTON -->  

              </div>
            </div>
          </div> 
          <!-- END OF DEDUCTION AND CONTRIBUTION -->      
        </div><!-- END OF COL 6 -->
      </div>
    </div>
  </section>
</div>