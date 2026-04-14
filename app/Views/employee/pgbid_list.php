<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>PGB ID # List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">PGB ID # List</li>
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
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">PGB ID List</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="employee_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                  <thead style="text-align: center">
                    <tr style="line-height: 20px">
                      <th style="width:2%">#</th>
                      <th style="width:5%">PGB ID #</th>
                      <th style="width:20%">Fullname</th>
                      <th style="width:23%">Department</th>
                      <th style="width:25%">Position</th>
                    </tr>
                  </thead>
                  <tbody id="search" name="search" style="font-size:12px">
                    <?php $n=1; if ($employee) : ?>
                    <?php foreach ($employee->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="viewDetail('<?php echo $post->_id; ?>')">
                      <td class="pl-3"><?php echo $n ?></td>
                      <td><?php echo strtoupper($post->pgbid) ?></td>
                      <td><b><?php echo strtoupper($post->lastname . ', ' . $post->firstname . ' ' . $post->middlename) ?></b>
                      </td>
                      <td><?php echo strtoupper($post->department) ?></td>
                      <td>
                        <?php if ($post->position != "--") {echo strtoupper($post->position . ' <b>( ' . $post->pos_code . ' )</b>' );} ?>
                      </td>
                    </tr>
                    <?php $n=$n+1; endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>