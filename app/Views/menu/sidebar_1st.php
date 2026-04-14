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