<?php $session = \Config\Services::session(); ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for BOM
$contents = file_get_contents(__FILE__);
if (substr($contents, 0, 3) == "\xEF\xBB\xBF") {
    die("ERROR: File has UTF-8 BOM. Please save as UTF-8 without BOM.");
}
?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee Attendance Registry</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employee List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      
      <!-- Search Filters -->
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-search mr-2"></i>Search Filters</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                  <label>Department</label>
                  <select class="form-control select2" id="filterDept" name="filterDept">
                    <option value="0">-- All Departments --</option>
                    <?php if ($department) : ?>
                    <?php foreach ($department->getResult() as $post) : ?>
                        <option value="<?php echo $post->department ?>"><?php echo strtoupper($post->department) ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                  <label>Month</label>
                  <select class="form-control" id="filterMonth" name="filterMonth">
                    <option value="0">-- Month --</option>
                    <option value="1">January</option>
                    <option value="2" selected>February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                  <label>Year</label>
                  <select class="form-control" id="filterYear" name="filterYear">
                    <option value="2025">2025</option>
                    <option value="2026" selected>2026</option>
                    <option value="2027">2027</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                  <label>Search Employee</label>
                  <input type="text" class="form-control" id="searchEmployee" placeholder="Name or ID...">
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 mb-2 d-flex align-items-end">
                  <button class="btn btn-primary btn-block" onclick="loadEmployeeList()">
                    <i class="fas fa-search"></i> Search
                  </button>
                </div>
              </div>
              
              <div class="row mt-2">
                <div class="col-12">
                  <div class="form-group mb-0">
                    <label class="mr-3">Status Filter:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="showRegular" checked>
                      <label class="form-check-label" for="showRegular">Regular</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="showProbationary" checked>
                      <label class="form-check-label" for="showProbationary">Probationary</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="showContractual" checked>
                      <label class="form-check-label" for="showContractual">Contractual</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="showJO" checked>
                      <label class="form-check-label" for="showJO">Job Order</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Statistics Cards -->
      <div class="row" id="statsCards" style="display: none;">
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h4 id="statTotalEmployees">0</h4>
              <p>Total Employees</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h4 id="statPerfectAttendance">0</h4>
              <p>Perfect Attendance</p>
            </div>
            <div class="icon"><i class="fas fa-award"></i></div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h4 id="statGoodStanding">0</h4>
              <p>Good Standing</p>
            </div>
            <div class="icon"><i class="fas fa-thumbs-up"></i></div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h4 id="statWithIssues">0</h4>
              <p>With Issues</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h4 id="statPoorAttendance">0</h4>
              <p>Poor Attendance</p>
            </div>
            <div class="icon"><i class="fas fa-user-times"></i></div>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h4 id="statOnLeave">0</h4>
              <p>On Leave/AWOL</p>
            </div>
            <div class="icon"><i class="fas fa-procedures"></i></div>
          </div>
        </div>
      </div>

      <!-- Employee List Table -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-dark d-flex justify-content-between align-items-center">
              <h3 class="card-title text-white mb-0">
                <i class="fas fa-list-alt mr-2"></i>Employee Attendance Details
              </h3>
              <div>
                <button type="button" class="btn btn-sm btn-success mr-2" onclick="exportToExcel()">
                  <i class="fas fa-file-excel"></i> Export Excel
                </button>
                <button type="button" class="btn btn-sm btn-info" onclick="printReport()">
                  <i class="fas fa-print"></i> Print
                </button>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-bordered table-striped table-sm" id="employeeListTable">
                <thead class="thead-dark text-center" style="font-size: 11px;">
                  <tr>
                    <th style="width: 3%">#</th>
                    <th style="width: 8%">ID No.</th>
                    <th style="width: 15%">Employee Name</th>
                    <th style="width: 12%">Department</th>
                    <th style="width: 8%">Position</th>
                    <th style="width: 5%">Status</th>
                    <th style="width: 6%">WDays</th>
                    <th style="width: 6%">Present</th>
                    <th style="width: 6%">Absent</th>
                    <th style="width: 6%">Late (m)</th>
                    <th style="width: 6%">Undertime</th>
                    <th style="width: 7%">Total Hrs</th>
                    <th style="width: 7%">Avg Hrs/Day</th>
                    <th style="width: 8%">Attendance %</th>
                    <th style="width: 8%">Action</th>
                  </tr>
                </thead>
                <tbody id="employeeListBody" style="font-size: 11px;">
                  <tr>
                    <td colspan="15" class="text-center text-muted py-5">
                      <i class="fas fa-search fa-3x mb-3"></i><br>
                      <h5>Select filters and click "Search" to view employees</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer bg-light">
              <div class="row">
                <div class="col-md-6">
                  <span id="showingInfo" class="text-muted">Showing 0 to 0 of 0 entries</span>
                </div>
                <div class="col-md-6">
                  <nav aria-label="Page navigation" class="float-right">
                    <ul class="pagination pagination-sm mb-0" id="pagination">
                      <!-- Pagination generated by JS -->
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<!-- Employee Detail Modal -->
<div class="modal fade" id="employeeDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-user-circle mr-2"></i>Employee Attendance Details</h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-md-6">
            <table class="table table-sm table-borderless">
              <tr><td class="font-weight-bold" width="30%">ID Number:</td><td id="modalEmpId">-</td></tr>
              <tr><td class="font-weight-bold">Name:</td><td id="modalEmpName">-</td></tr>
              <tr><td class="font-weight-bold">Department:</td><td id="modalEmpDept">-</td></tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-sm table-borderless">
              <tr><td class="font-weight-bold" width="30%">Position:</td><td id="modalEmpPosition">-</td></tr>
              <tr><td class="font-weight-bold">Employment:</td><td id="modalEmpStatus">-</td></tr>
              <tr><td class="font-weight-bold">Period:</td><td id="modalPeriod">-</td></tr>
            </table>
          </div>
        </div>
        
        <div class="row text-center mb-3">
          <div class="col-3">
            <div class="p-2 bg-success text-white rounded">
              <h4 id="modalPresent">0</h4>
              <small>Days Present</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-danger text-white rounded">
              <h4 id="modalAbsent">0</h4>
              <small>Days Absent</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-warning text-dark rounded">
              <h4 id="modalLate">0</h4>
              <small>Late (min)</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-info text-white rounded">
              <h4 id="modalAttendanceRate">0%</h4>
              <small>Attendance Rate</small>
            </div>
          </div>
        </div>

        <div class="alert alert-secondary">
          <h6 class="font-weight-bold">Attendance Summary:</h6>
          <p class="mb-1" id="modalSummaryText">Employee has maintained good attendance record with no major issues.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="viewFullDTR()">
          <i class="fas fa-clock"></i> View Full DTR
        </button>
      </div>
    </div>
  </div>
</div>

<!-- CS Form 48 - Daily Time Record Modal -->
<div class="modal fade" id="csForm48Modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" style="max-width: 95%; width: 1000px;">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fas fa-file-alt mr-2"></i>CS Form 48 - Daily Time Record</h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        
        <!-- CS Form 48 Content -->
        <div id="csForm48Content" style="font-family: 'Times New Roman', Times, serif; font-size: 11px; line-height: 1.2; padding: 20px; background: white;">
          
          <!-- Header -->
          <div style="text-align: center; margin-bottom: 15px; border-bottom: 2px solid #000; padding-bottom: 10px;">
            <h1 style="font-size: 16px; margin: 0; text-transform: uppercase; font-weight: bold;">Civil Service Commission</h1>
            <h2 style="font-size: 14px; margin: 5px 0; font-weight: bold;">CS Form 48</h2>
            <p style="margin: 3px 0; font-size: 10px;">Revised 2018</p>
            <h2 style="font-size: 14px; margin: 5px 0; font-weight: bold;">DAILY TIME RECORD</h2>
          </div>
          
          <!-- Employee Info -->
          <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 11px;">
            <div style="flex: 1;">
              <strong>Name:</strong> <span id="dtrName">-</span><br>
              <strong>Employee ID:</strong> <span id="dtrEmpId">-</span>
            </div>
            <div style="flex: 1; text-align: center;">
              <strong>Department:</strong> <span id="dtrDept">-</span><br>
              <strong>For the period of:</strong> <span id="dtrPeriod">-</span>
            </div>
            <div style="flex: 1; text-align: right;">
              <strong>Official Hours:</strong><br>
              <span style="font-size: 9px;">(Regular days: 8:00 AM - 12:00 PM; 1:00 PM - 5:00 PM)</span>
            </div>
          </div>
          
          <!-- DTR Table -->
          <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 10px; border: 1px solid #000;">
            <thead>
              <tr style="background-color: #f0f0f0;">
                <th rowspan="2" style="border: 1px solid #000; padding: 4px; text-align: center; width: 5%;">Day</th>
                <th rowspan="2" style="border: 1px solid #000; padding: 4px; text-align: center; width: 8%;">Date</th>
                <th colspan="2" style="border: 1px solid #000; padding: 4px; text-align: center;">A.M.</th>
                <th colspan="2" style="border: 1px solid #000; padding: 4px; text-align: center;">P.M.</th>
                <th rowspan="2" style="border: 1px solid #000; padding: 4px; text-align: center; width: 8%;">Actual<br>Work<br>(Hours)</th>
                <th rowspan="2" style="border: 1px solid #000; padding: 4px; text-align: center; width: 8%;">Late<br>(Minutes)</th>
                <th rowspan="2" style="border: 1px solid #000; padding: 4px; text-align: center; width: 15%;">Remarks</th>
              </tr>
              <tr style="background-color: #f0f0f0;">
                <th style="border: 1px solid #000; padding: 4px; text-align: center; width: 10%;">Arrival</th>
                <th style="border: 1px solid #000; padding: 4px; text-align: center; width: 10%;">Departure</th>
                <th style="border: 1px solid #000; padding: 4px; text-align: center; width: 10%;">Arrival</th>
                <th style="border: 1px solid #000; padding: 4px; text-align: center; width: 10%;">Departure</th>
              </tr>
            </thead>
            <tbody id="dtrTableBody">
              <!-- Generated by JavaScript -->
            </tbody>
          </table>
          
          <!-- Certification -->
          <div style="margin-top: 10px; font-size: 9px; font-style: italic;">
            I certify on my honor that the above is a true and correct record of the hours of work performed, 
            record of which was made daily at the time of arrival and departure from office.
          </div>
          
          <!-- Signatures -->
          <div style="margin-top: 20px; display: flex; justify-content: space-between;">
            <div style="width: 45%; text-align: center;">
              <div style="border-top: 1px solid #000; margin-top: 30px; padding-top: 5px; font-weight: bold;">
                <span id="dtrSignatureName">-</span><br>
                <span style="font-size: 9px; font-weight: normal;">Employee Signature</span>
              </div>
            </div>
            <div style="width: 45%; text-align: center;">
              <div style="border-top: 1px solid #000; margin-top: 30px; padding-top: 5px; font-weight: bold;">
                _________________________<br>
                <span style="font-size: 9px; font-weight: normal;">Supervisor/Department Head</span>
              </div>
            </div>
          </div>
          
          <!-- Footer -->
          <div style="margin-top: 15px; font-size: 8px; text-align: center; border-top: 1px solid #ccc; padding-top: 5px;">
            CS Form 48 (Revised 2018) - For the month of <span id="dtrFooterMonth">-</span>
          </div>
          
        </div>
        
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printCSForm48()">
          <i class="fas fa-print"></i> Print CS Form 48
        </button>
        <button type="button" class="btn btn-success" onclick="exportCSForm48ToPDF()">
          <i class="fas fa-file-pdf"></i> Export to PDF
        </button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- 3. Load Select2 (if you use it) -->
<script src="<?php echo base_url('public/assets/plugins/select2/js/select2.full.min.js'); ?>"></script>

<!-- 4. Load YOUR script LAST -->
<script>
    // Define base URL for use in external JS
    var BASE_URL = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url('assets/js/attendance.js'); ?>?v=<?php echo time(); ?>"></script>

<style>
@media print {
    .card-header .btn, .pagination, .form-group, .modal, .no-print {
        display: none !important;
    }
    .card {
        border: none !important;
        box-shadow: none !important;
    }
    .content-wrapper {
        margin-left: 0 !important;
    }
}
.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    position: relative;
    display: block;
    margin-bottom: 20px;
}
.small-box > .inner {
    padding: 10px;
}
.small-box h4 {
    font-size: 1.8rem;
    font-weight: bold;
    margin: 0 0 5px 0;
}
.small-box p {
    font-size: 0.9rem;
    margin-bottom: 0;
}
.small-box .icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 40px;
    color: rgba(0,0,0,0.15);
}
.cursor-pointer {
    cursor: pointer;
}
.table td, .table th {
    vertical-align: middle !important;
}
.badge {
    font-size: 85%;
    padding: 0.4em 0.6em;
}

/* CS Form 48 Specific Styles */
#csForm48Modal .modal-body {
    max-height: 80vh;
    overflow-y: auto;
}
</style>