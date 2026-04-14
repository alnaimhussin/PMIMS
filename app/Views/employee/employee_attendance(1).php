<?php $session = \Config\Services::session(); ?>

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
                        <option value="<?php echo $post->id_ ?>"><?php echo strtoupper($post->department) ?></option>
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

<script>
// Sample employee data with individual attendance details
const sampleEmployeeData = [
    {
        id: "PGB0359",
        name: "HAFIDZ KUMAR",
        department: "Provincial Agriculture Office",
        position: "Agricultural Technologist",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 14,
        daysAbsent: 6,
        lateMinutes: 26,
        undertimeCount: 2,
        totalHours: 110.64,
        avgHoursPerDay: 7.90,
        attendanceRate: 70.0,
        classification: "poor"
    },
    {
        id: "PGB0360",
        name: "MARIA SANTOS",
        department: "Provincial Agriculture Office",
        position: "Senior Agriculturist",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 20,
        daysAbsent: 0,
        lateMinutes: 0,
        undertimeCount: 0,
        totalHours: 160.00,
        avgHoursPerDay: 8.00,
        attendanceRate: 100.0,
        classification: "perfect"
    },
    {
        id: "PGB0361",
        name: "JUAN DELA CRUZ",
        department: "Provincial Agriculture Office",
        position: "Agricultural Technician",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 18,
        daysAbsent: 2,
        lateMinutes: 15,
        undertimeCount: 1,
        totalHours: 143.50,
        avgHoursPerDay: 7.97,
        attendanceRate: 90.0,
        classification: "good"
    },
    {
        id: "PGB0362",
        name: "ANA REYES",
        department: "Provincial Health Office",
        position: "Nurse II",
        employmentStatus: "Probationary",
        workingDays: 20,
        daysPresent: 19,
        daysAbsent: 1,
        lateMinutes: 5,
        undertimeCount: 0,
        totalHours: 151.80,
        avgHoursPerDay: 7.99,
        attendanceRate: 95.0,
        classification: "good"
    },
    {
        id: "PGB0363",
        name: "PEDRO GARCIA",
        department: "Provincial Health Office",
        position: "Medical Technologist",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 20,
        daysAbsent: 0,
        lateMinutes: 2,
        undertimeCount: 0,
        totalHours: 159.90,
        avgHoursPerDay: 8.00,
        attendanceRate: 100.0,
        classification: "perfect"
    },
    {
        id: "PGB0364",
        name: "LUISA MAGTANGGOL",
        department: "Provincial Engineering Office",
        position: "Engineer II",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 16,
        daysAbsent: 4,
        lateMinutes: 45,
        undertimeCount: 3,
        totalHours: 124.80,
        avgHoursPerDay: 7.80,
        attendanceRate: 80.0,
        classification: "issues"
    },
    {
        id: "PGB0365",
        name: "ROBERTO PASCUAL",
        department: "Provincial Engineering Office",
        position: "Engineer I",
        employmentStatus: "Contractual",
        workingDays: 20,
        daysPresent: 12,
        daysAbsent: 8,
        lateMinutes: 120,
        undertimeCount: 5,
        totalHours: 92.40,
        avgHoursPerDay: 7.70,
        attendanceRate: 60.0,
        classification: "poor"
    },
    {
        id: "PGB0366",
        name: "CARMEN VILLANUEVA",
        department: "Provincial Treasurer's Office",
        position: "Accountant",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 19,
        daysAbsent: 1,
        lateMinutes: 0,
        undertimeCount: 0,
        totalHours: 152.00,
        avgHoursPerDay: 8.00,
        attendanceRate: 95.0,
        classification: "good"
    },
    {
        id: "PGB0367",
        name: "JOSEPH MENDOZA",
        department: "Provincial Treasurer's Office",
        position: "Budget Officer",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 17,
        daysAbsent: 3,
        lateMinutes: 30,
        undertimeCount: 2,
        totalHours: 134.40,
        avgHoursPerDay: 7.91,
        attendanceRate: 85.0,
        classification: "issues"
    },
    {
        id: "PGB0368",
        name: "MARISSA FLORES",
        department: "Human Resource Management",
        position: "HR Officer",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 20,
        daysAbsent: 0,
        lateMinutes: 0,
        undertimeCount: 0,
        totalHours: 160.00,
        avgHoursPerDay: 8.00,
        attendanceRate: 100.0,
        classification: "perfect"
    },
    {
        id: "PGB0369",
        name: "ANTONIO LIM",
        department: "Human Resource Management",
        position: "Administrative Officer",
        employmentStatus: "Job Order",
        workingDays: 20,
        daysPresent: 15,
        daysAbsent: 5,
        lateMinutes: 60,
        undertimeCount: 4,
        totalHours: 116.00,
        avgHoursPerDay: 7.73,
        attendanceRate: 75.0,
        classification: "issues"
    },
    {
        id: "PGB0370",
        name: "PATRICIA CRUZ",
        department: "Provincial Agriculture Office",
        position: "Veterinarian",
        employmentStatus: "Regular",
        workingDays: 20,
        daysPresent: 0,
        daysAbsent: 20,
        lateMinutes: 0,
        undertimeCount: 0,
        totalHours: 0.00,
        avgHoursPerDay: 0.00,
        attendanceRate: 0.0,
        classification: "leave"
    }
];

let currentPage = 1;
let itemsPerPage = 10;
let filteredData = [];

function loadEmployeeList() {
    const dept = document.getElementById('filterDept').value;
    const month = document.getElementById('filterMonth').value;
    const year = document.getElementById('filterYear').value;
    const searchText = document.getElementById('searchEmployee').value.toLowerCase();
    
    // Get status filters
    const showRegular = document.getElementById('showRegular').checked;
    const showProbationary = document.getElementById('showProbationary').checked;
    const showContractual = document.getElementById('showContractual').checked;
    const showJO = document.getElementById('showJO').checked;
    
    if (month == 0) {
        alert('Please select a month');
        return;
    }
    
    // Show loading
    document.getElementById('employeeListBody').innerHTML = `
        <tr><td colspan="15" class="text-center py-4"><i class="fas fa-spinner fa-spin fa-2x"></i><br>Loading...</td></tr>
    `;
    
    // Simulate AJAX delay
    setTimeout(() => {
        // Filter data
        filteredData = sampleEmployeeData.filter(emp => {
            // Department filter
            if (dept != 0 && !emp.department.includes(document.querySelector('#filterDept option:checked').text)) {
                return false;
            }
            
            // Search text filter
            if (searchText && !emp.name.toLowerCase().includes(searchText) && !emp.id.toLowerCase().includes(searchText)) {
                return false;
            }
            
            // Employment status filter
            const status = emp.employmentStatus.toLowerCase();
            if (status === 'regular' && !showRegular) return false;
            if (status === 'probationary' && !showProbationary) return false;
            if (status === 'contractual' && !showContractual) return false;
            if (status === 'job order' && !showJO) return false;
            
            return true;
        });
        
        renderEmployeeTable();
        updateStatistics();
        document.getElementById('statsCards').style.display = 'flex';
        
    }, 600);
}

function renderEmployeeTable() {
    const tbody = document.getElementById('employeeListBody');
    tbody.innerHTML = '';
    
    if (filteredData.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="15" class="text-center text-muted py-5">
                    <i class="fas fa-inbox fa-3x mb-3"></i><br>
                    <h5>No employees found matching your criteria</h5>
                </td>
            </tr>
        `;
        document.getElementById('showingInfo').textContent = 'Showing 0 to 0 of 0 entries';
        return;
    }
    
    // Pagination
    const totalPages = Math.ceil(filteredData.length / itemsPerPage);
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const pageData = filteredData.slice(start, end);
    
    pageData.forEach((emp, index) => {
        const tr = document.createElement('tr');
        
        // Determine row color based on attendance rate
        let rowClass = '';
        if (emp.attendanceRate === 100) rowClass = 'table-success';
        else if (emp.attendanceRate >= 95) rowClass = 'table-primary';
        else if (emp.attendanceRate >= 85) rowClass = 'table-info';
        else if (emp.attendanceRate >= 75) rowClass = 'table-warning';
        else if (emp.attendanceRate === 0) rowClass = 'table-secondary';
        else rowClass = 'table-danger';
        
        tr.className = rowClass;
        
        // Status badge
        let statusBadge = '';
        switch(emp.employmentStatus.toLowerCase()) {
            case 'regular': statusBadge = '<span class="badge badge-success">Regular</span>'; break;
            case 'probationary': statusBadge = '<span class="badge badge-warning">Probationary</span>'; break;
            case 'contractual': statusBadge = '<span class="badge badge-info">Contractual</span>'; break;
            case 'job order': statusBadge = '<span class="badge badge-secondary">JO</span>'; break;
        }
        
        // Attendance rate badge
        let rateBadge = '';
        if (emp.attendanceRate === 100) rateBadge = '<span class="badge badge-success">100%</span>';
        else if (emp.attendanceRate >= 90) rateBadge = `<span class="badge badge-primary">${emp.attendanceRate.toFixed(1)}%</span>`;
        else if (emp.attendanceRate >= 75) rateBadge = `<span class="badge badge-warning">${emp.attendanceRate.toFixed(1)}%</span>`;
        else if (emp.attendanceRate === 0) rateBadge = '<span class="badge badge-secondary">0%</span>';
        else rateBadge = `<span class="badge badge-danger">${emp.attendanceRate.toFixed(1)}%</span>`;
        
        tr.innerHTML = `
            <td class="text-center">${start + index + 1}</td>
            <td class="font-weight-bold text-monospace">${emp.id}</td>
            <td class="font-weight-bold">${emp.name}</td>
            <td>${emp.department}</td>
            <td>${emp.position}</td>
            <td class="text-center">${statusBadge}</td>
            <td class="text-center">${emp.workingDays}</td>
            <td class="text-center text-success font-weight-bold">${emp.daysPresent}</td>
            <td class="text-center ${emp.daysAbsent > 0 ? 'text-danger font-weight-bold' : ''}">${emp.daysAbsent}</td>
            <td class="text-center ${emp.lateMinutes > 0 ? 'text-warning' : ''}">${emp.lateMinutes > 0 ? emp.lateMinutes : '-'}</td>
            <td class="text-center ${emp.undertimeCount > 0 ? 'text-warning' : ''}">${emp.undertimeCount > 0 ? emp.undertimeCount : '-'}</td>
            <td class="text-right font-weight-bold">${emp.totalHours.toFixed(2)}</td>
            <td class="text-right">${emp.avgHoursPerDay.toFixed(2)}</td>
            <td class="text-center">${rateBadge}</td>
            <td class="text-center">
                <button class="btn btn-xs btn-info" onclick="showEmployeeDetail('${emp.id}')" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-xs btn-primary" onclick="viewDTR('${emp.id}')" title="View DTR">
                    <i class="fas fa-clock"></i>
                </button>
            </td>
        `;
        
        tbody.appendChild(tr);
    });
    
    // Update info
    document.getElementById('showingInfo').textContent = 
        `Showing ${start + 1} to ${Math.min(end, filteredData.length)} of ${filteredData.length} entries`;
    
    renderPagination(totalPages);
}

function renderPagination(totalPages) {
    const ul = document.getElementById('pagination');
    ul.innerHTML = '';
    
    if (totalPages <= 1) return;
    
    // Previous
    const prevLi = document.createElement('li');
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>`;
    ul.appendChild(prevLi);
    
    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
            const li = document.createElement('li');
            li.className = `page-item ${i === currentPage ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#" onclick="changePage(${i})">${i}</a>`;
            ul.appendChild(li);
        } else if (i === currentPage - 3 || i === currentPage + 3) {
            const li = document.createElement('li');
            li.className = 'page-item disabled';
            li.innerHTML = '<span class="page-link">...</span>';
            ul.appendChild(li);
        }
    }
    
    // Next
    const nextLi = document.createElement('li');
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>`;
    ul.appendChild(nextLi);
}

function changePage(page) {
    if (page < 1 || page > Math.ceil(filteredData.length / itemsPerPage)) return;
    currentPage = page;
    renderEmployeeTable();
}

function updateStatistics() {
    const total = filteredData.length;
    const perfect = filteredData.filter(e => e.attendanceRate === 100).length;
    const good = filteredData.filter(e => e.attendanceRate >= 95 && e.attendanceRate < 100).length;
    const issues = filteredData.filter(e => e.attendanceRate >= 75 && e.attendanceRate < 95).length;
    const poor = filteredData.filter(e => e.attendanceRate > 0 && e.attendanceRate < 75).length;
    const leave = filteredData.filter(e => e.attendanceRate === 0).length;
    
    document.getElementById('statTotalEmployees').textContent = total;
    document.getElementById('statPerfectAttendance').textContent = perfect;
    document.getElementById('statGoodStanding').textContent = good;
    document.getElementById('statWithIssues').textContent = issues;
    document.getElementById('statPoorAttendance').textContent = poor;
    document.getElementById('statOnLeave').textContent = leave;
}

function showEmployeeDetail(empId) {
    const emp = sampleEmployeeData.find(e => e.id === empId);
    if (!emp) return;
    
    document.getElementById('modalEmpId').textContent = emp.id;
    document.getElementById('modalEmpName').textContent = emp.name;
    document.getElementById('modalEmpDept').textContent = emp.department;
    document.getElementById('modalEmpPosition').textContent = emp.position;
    document.getElementById('modalEmpStatus').textContent = emp.employmentStatus;
    document.getElementById('modalPeriod').textContent = `February 2026`;
    
    document.getElementById('modalPresent').textContent = emp.daysPresent;
    document.getElementById('modalAbsent').textContent = emp.daysAbsent;
    document.getElementById('modalLate').textContent = emp.lateMinutes;
    document.getElementById('modalAttendanceRate').textContent = emp.attendanceRate.toFixed(1) + '%';
    
    // Generate summary text
    let summary = '';
    if (emp.attendanceRate === 100) {
        summary = 'Excellent attendance record! Employee has maintained perfect attendance with no absences, late arrivals, or undertime.';
    } else if (emp.attendanceRate >= 95) {
        summary = `Very good attendance. Employee was present for ${emp.daysPresent} out of ${emp.workingDays} working days with minimal tardiness.`;
    } else if (emp.attendanceRate >= 85) {
        summary = `Good attendance overall. Employee has ${emp.daysAbsent} absence(s) and ${emp.lateMinutes} minutes of tardiness recorded.`;
    } else if (emp.attendanceRate >= 75) {
        summary = `Attendance needs improvement. Employee has ${emp.daysAbsent} absences and ${emp.lateMinutes} minutes of late arrivals.`;
    } else if (emp.attendanceRate === 0) {
        summary = 'Employee has no attendance record for this period. May be on extended leave, AWOL, or newly hired.';
    } else {
        summary = `Poor attendance record. Employee has significant absences (${emp.daysAbsent} days) and frequent tardiness. Immediate action recommended.`;
    }
    
    document.getElementById('modalSummaryText').textContent = summary;
    
    $('#employeeDetailModal').modal('show');
}

function viewDTR(empId) {
    // Redirect to DTR view or open DTR modal
    alert('View full DTR for employee: ' + empId);
    // window.location.href = '<?php echo base_url('attendance/dtr/'); ?>' + empId;
}

function viewFullDTR() {
    const empId = document.getElementById('modalEmpId').textContent;
    viewDTR(empId);
}

function exportToExcel() {
    let html = `<table border="1">
        <thead>
            <tr style="background-color: #4472C4; color: white;">
                <th>No.</th>
                <th>ID Number</th>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Status</th>
                <th>Working Days</th>
                <th>Days Present</th>
                <th>Days Absent</th>
                <th>Late (minutes)</th>
                <th>Undertime Count</th>
                <th>Total Hours</th>
                <th>Avg Hours/Day</th>
                <th>Attendance %</th>
            </tr>
        </thead>
        <tbody>`;
    
    filteredData.forEach((emp, index) => {
        html += `<tr>
            <td>${index + 1}</td>
            <td>${emp.id}</td>
            <td>${emp.name}</td>
            <td>${emp.department}</td>
            <td>${emp.position}</td>
            <td>${emp.employmentStatus}</td>
            <td>${emp.workingDays}</td>
            <td>${emp.daysPresent}</td>
            <td>${emp.daysAbsent}</td>
            <td>${emp.lateMinutes}</td>
            <td>${emp.undertimeCount}</td>
            <td>${emp.totalHours.toFixed(2)}</td>
            <td>${emp.avgHoursPerDay.toFixed(2)}</td>
            <td>${emp.attendanceRate.toFixed(1)}%</td>
        </tr>`;
    });
    
    html += '</tbody></table>';
    
    const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `Employee_Attendance_${new Date().toISOString().slice(0,10)}.xls`;
    link.click();
}

function printReport() {
    window.print();
}

// Initialize
$(document).ready(function() {
    $('.select2').select2();
    
    // Auto-load if filters are pre-selected
    // loadEmployeeList();
});
</script>

<style>
@media print {
    .card-header .btn, .pagination, .form-group {
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
</style>