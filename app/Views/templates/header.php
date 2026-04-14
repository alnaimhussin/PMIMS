<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PGBIS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url('img/seal_128x128.png'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Signature_Pad -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/signature_pad/css/signature_pad.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/toastr/toastr.min.css'); ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    
      <!-- DataTables -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
      
    <!-- iCheck -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/jqvmap/jqvmap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/dist/css/adminlte.min.css?v=3.2.0'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/dist/css/adminlte.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/summernote/summernote-bs4.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet"
      href="<?php echo base_url('public/assets/plugins/bootstrap-5.2.3-dist/css/bootstrap.min.css'); ?>">
    <script class="lazy" data-src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <style>
        @media print {
            @page {
                size: 8.5in 13in;
                margin: 0;
            }
            .printable {
                width: 100%;
                height: 100%;
                border: 0px solid black;
                box-sizing: border-box;
                padding: 0in;
            }
        }
        
        #qrcode {
          width: 100%;       /* Take up full width of the parent card-body */
          max-width: 250px;  /* Optional: Prevents it from getting too huge on 4k monitors */
          margin: 0 auto;    /* Centers it */
        }
        
        #qrcode img, #qrcode canvas {
          width: 100% !important; /* Forces the generated QR to fill the div */
          height: auto !important;
        }
        
        
        /* Professional UI Tweaks */
        .modal-fullscreen .modal-content {
            background-color: #f4f6f9;
        }
        
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
            padding: 0.75rem 1.25rem;
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            border-right: none;
        }
        
        .form-control[readonly] {
            background-color: #ffffff;
            border-left: none;
            color: #333;
            font-weight: 500;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        
        /* Sidebar Search Table */
        .table-head-fixed th {
            background-color: #f8f9fa !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        /* QR Code Placeholder */
        #qrcode {
            background: #fff;
            padding: 10px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            min-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Custom File Uploads */
        .custom-file-label::after {
            background-color: #343a40;
            color: #fff;
        }
        
    </style>
  </head>

  <?php $msg = \Config\Services::session()->getFlashdata('success');?>

  <body onselectstart="return false" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" onload="show('<?php echo $msg; ?>')">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <strong class="nav-link" style="color: LightGray;"><b>
              <?php if (session()->has('module')): ?>
                  <?= esc(session()->get('module')) ?>
              <?php else: ?>
                
              <?php endif; ?> </strong>
            </b></strong>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Registered Today</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-solid fa-message"></i> No message
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>