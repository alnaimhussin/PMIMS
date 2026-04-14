<?php 
$access_type = esc(session()->get('access_type'));
if ($access_type == '0' || $access_type == '1'): 
?>

<!-- Employee Management Menu -->
<li class="nav-header">Employee Management</li>
  <li class="nav-item">
    <a href="<?php echo base_url('dashboard'); ?>"
      class="nav-link <?php if ($page == "dashboard") {echo "active";} ?>">
      <i class="nav-icon  fab fa-microsoft"></i>
        <p>Dashboard</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee'); ?>"
      class="nav-link <?php if ($page == "employee_list") {echo "active";} ?>">
      <i class="nav-icon fas fa-users"></i>
      <p>Employee List</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee/profile'); ?>"
      class="nav-link <?php if ($page == "employee_profile") {echo "active";} ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>Employee Profiles</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee/attendance'); ?>"
      class="nav-link <?php if ($page == "employee_attendance") {echo "active";} ?>">
      <i class="nav-icon fas fa-user-clock"></i>
      <p>Employee Attendance</p>
    </a>
  </li>
  <li class="nav-item">
    <a href=""
      class="nav-link <?php if ($page == "") {echo "active";} ?>">
      <i class="nav-icon far fa-id-badge"></i>
      <p>Performances Review</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee/salary_adjustment'); ?>"
      class="nav-link <?php if ($page == "salary_adjustment") {echo "active";} ?>">
      <i class="nav-icon far fa-id-badge"></i>
      <p>Salary Adjustment</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee/service_record'); ?>"
      class="nav-link <?php if ($page == "service_record") {echo "active";} ?>">
      <i class="nav-icon fas fa-user-clock"></i>
      <p>Service Records</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee/leave_application'); ?>"
      class="nav-link <?php if ($page == "leave_application") {echo "active";} ?>">
      <i class="nav-icon 	fas fa-file-signature me-2"></i>
      <p>Leave Application</p>
    </a>
  </li>
</li>

<?php else: ?>

<!-- Employee Management Menu -->
<li class="nav-header">Employee Management</li>
  <li class="nav-item">
    <a href="<?php echo base_url('employee'); ?>"
      class="nav-link <?php if ($page == "employee_list") {echo "active";} ?>">
      <i class="nav-icon fas fa-users"></i>
      <p>Employee List</p>
    </a>
  </li>
</li>

<?php endif; ?>