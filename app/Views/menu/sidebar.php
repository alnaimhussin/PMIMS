<?php $session = session(); ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4 ">

  <a href="" class="brand-link">
    <img src="<?php echo base_url('img/seal.png'); ?>" alt="" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">PGBID</span>
  </a>

  <div class="sidebar position-fixed" style="width: 250px">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">account name here</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url('dashboard'); ?>"
            class="nav-link <?php if ($page == "dashboard") {echo "active";} ?>">
            <i class="nav-icon  fab fa-microsoft"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('employee'); ?>"
            class="nav-link <?php if ($page == "employee-list") {echo "active";} ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Employee
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('payroll'); ?>"
            class="nav-link <?php if ($page == "payroll") {echo "active";} ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Payroll
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('employee/id'); ?>"
            class="nav-link <?php if ($page == "employeeid") {echo "active";} ?>">
            <i class="nav-icon far fa-id-badge"></i>
            <p>
              Employee ID
            </p>
          </a>
        </li>

        <li class="nav-header">Report</li>
        <li class="nav-item">
          <a href="<?php echo base_url('employee/id_list'); ?>" 
            class="nav-link <?php if ($page == "pgbid_list") {echo "active";} ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>PGB ID #</p>
          </a>
        </li>

<!-- Voucher -->

<!-- End of Voucher -->

        <li class="nav-header">Contribution</li>
        <li class="nav-item">
          <a href="<?php echo base_url('users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>GSIS</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Landbank</p>
          </a>
        </li>

        <li class="nav-header">Loans</li>
        <li class="nav-item">
          <a href="<?php echo base_url('users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>GSIS</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Landbank</p>
          </a>
        </li>

        <li class="nav-header">Admin</li>
        <li class="nav-item">
          <a href="<?php echo base_url('users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>User Account</p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-open";} ?>">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>Master<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('master/department'); ?>"
                class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Position</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
                <i class="nav-icon fas fa-user-md"></i>
                <p>Profession</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('setup/setup'); ?>" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Setup</p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-open";} ?>">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>Master<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('master/department'); ?>"
                class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Position</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
                <i class="nav-icon fas fa-user-md"></i>
                <p>Profession</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('setup/setup'); ?>" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Setup</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>

<script>
  function logout() {
    Swal.fire({
      title: 'Are you sure?',
      text: "Logout!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '<?php echo base_url(); ?>/login/logout',
          method: "POST",
          async: true,
          dataType: 'json',
        });
        Swal.fire({
          title: 'Logout!',
          text: "You've been logout.",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok'
        }).then((result) => {
          window.location.href = "<?php echo base_url().'/admin'; ?>";
        })

      }
    })
  }
</script>