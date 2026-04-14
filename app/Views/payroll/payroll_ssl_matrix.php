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
</style>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Salary Standardization Law (SSL) Matrix</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Salary Standardization Law (SSL) Matrix</li>
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
        <div class="col-12"><!-- START OF COL 6 -->   
          <!-- SALARY STANDARDIZATION LAW LIST -->          
          <div class="card card-dark text-dark">
            <div class=" bg-success bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">SSL Matrix</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="service_record_table" class="table table-bordered table-striped table-head-fixed table-hover text-wrap">
                  <thead style="text-align: center; font-size:14px">
                    <tr style="line-height: 20px">
                      <th rowspan="2" style="width:12%;  vertical-align: middle">Salary Grade</th>
                      <th colspan="8" style="width:88%">Step Increments</th>                      
                    </tr>
                    <tr style="line-height: 20px">
                      <th style="width:11%">1</th>   
                      <th style="width:11%">2</th>   
                      <th style="width:11%">3</th>   
                      <th style="width:11%">4</th>   
                      <th style="width:11%">5</th>   
                      <th style="width:11%">6</th>   
                      <th style="width:11%">7</th>   
                      <th style="width:11%">8</th>                     
                    </tr>
                  </thead>
                  <tbody id="search" name="search" style="font-size:14px">
                    <?php $n=1; if ($employee) : ?>
                    <?php foreach ($employee->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="viewDetail('<?php echo $post->_id; ?>')">
                      <td class="pl-3"><?php echo $n ?></td>
                      <td><?php echo strtoupper($post->position) ?></td>
                      <td><b><?php echo strtoupper($post->sg_code) ?></b>
                      </td>
                      <td></td>
                      <td><?php echo strtoupper($post->status) ?></td>
                      <td><?php echo strtoupper($post->status) ?></td>
                      <td><?php echo strtoupper($post->status) ?></td>
                      <td><?php echo strtoupper($post->status) ?></td>
                      <td><?php echo strtoupper($post->department) ?></td>
                    </tr>
                    <?php $n=$n+1; endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END OF SERVICE RECORD LIST -->
        </div><!-- END OF COL 6 -->
      </div>
    </div>
  </section>
</div>