<?php if (esc(session()->get('access_type')) == '0'): ?>

<!-- Settings Menu -->
<li class="nav-header">Settings</li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>System Settings</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('users/users_list'); ?>"
      class="nav-link <?php if ($pagesub == "users_list") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>User Management</p>
    </a>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Role-Based Access Control</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Notification Settings</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Templates</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Tax Settings</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('master/department'); ?>"
      class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
      <i class="nav-icon fas fa-building"></i>
      <p>Integration Settings</p>
    </a>
  </li>
</li>

<?php endif; ?>






