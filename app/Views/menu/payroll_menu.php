<?php if (esc(session()->get('access_type')) == '0'): ?>

<!-- Request Menu -->
<li class="nav-header">Payroll Management</li>
  <li class="nav-item">
    <a href="<?php echo base_url('payroll'); ?>"
      class="nav-link <?php if ($pagesub == "payroll") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Payroll</p>
    </a>
  </li>
  <!-- <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Payroll Adjustment</p>
    </a>
  </li> -->
  <!-- <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Overtime Management</p>
    </a>
  </li> -->
  <li class="nav-item">
    <a href="<?php echo base_url('payroll/deduction'); ?>"
      class="nav-link <?php if ($pagesub == "payroll_deduction") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Deduction and Contribution</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Allowances and Bonus</p>
    </a>
  </li>
  <!-- <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Salary Advances</p>
    </a>
  </li> -->
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Payslip</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Loans</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Loan Approval</p>
    </a>
  </li>
  <!-- <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Audited Payroll</p>
    </a>
  </li> -->
  <li class="nav-item">
    <a href="<?php echo base_url('payroll/ssl_matrix'); ?>"
      class="nav-link <?php if ($pagesub == "ssl_matrix") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>SSL Matrix</p>
    </a>
  </li>
</li>

<?php endif; ?>