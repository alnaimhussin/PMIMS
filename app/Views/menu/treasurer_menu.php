<!-- Treasurer's Menu -->
<li class="nav-header">Treasurer's Management</li>
  
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon  fab fa-microsoft"></i>
      <p>Dashboard</p>
    </a>
  </li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Financial Management</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Budget Management</p>
      </a>
      <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Create Budget</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Manage Budgets</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Budget Reports</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Revenue Management</p>
      </a>
      <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Tax Collection</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Fees and Permits</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Revenue Reports</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Expenditure Management</p>
      </a>
      <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Expense Tracking</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Payroll Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Expenditure Reports</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Taxpayer Management</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Taxpayer Database</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Property Records</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Billing and Invoicing</p>
      </a>
    </li>
  </ul>
</li>

<!-- Check -->
<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-money-check"></i>
    <p>Check</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-money-check"></i>
        <p>Check Issuances</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-file-export"></i>
        <p>Check Release</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-file-invoice"></i>
        <p>Check Transmittal</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-file-invoice"></i>
        <p>Request for Accountant's Advice</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-file-invoice"></i>
        <p>View Accountant's Advice</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Financial Reporting</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Financial Statements</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Audit Trails</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Compliance Reports</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Administration</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>User Management</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Role-Based Access Control (RBAC)</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>System Configuration</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Data Backup and Restore</p>
      </a>
    </li>
  </ul>
</li>
</li>