<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content" style="font-size: 25px">
                <span class="info-box-text">Total Employee</span>
                <span class="info-box-number">
                  <?php if ($countAll) : ?>
                    <?php echo $countAll; ?>   
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-male"></i></span>
              <div class="info-box-content" style="font-size: 25px">
                <span class="info-box-text">Male</span>
                <span class="info-box-number">
                  <?php if ($countAll) : ?>
                    <?php echo $countMale; ?>   
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-female"></i></span>
              <div class="info-box-content" style="font-size: 25px">
                <span class="info-box-text">Female</span>
                <span class="info-box-number">
                  <?php if ($countAll) : ?>
                    <?php echo $countFemale; ?>   
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id"></i></span>
              <div class="info-box-content" style="font-size: 25px">
                <span class="info-box-text">Total ID</span>
                <span class="info-box-number">
                  <?php if ($countAllID) : ?>
                    <?php echo $countAllID; ?>   
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id"></i></span>
              <div class="info-box-content" style="font-size: 25px">
                <span class="info-box-text">Duplicate ID</span>
                <span class="info-box-number">
                  <?php if ($countDuplicateID) : ?>
                    <?php echo $countDuplicateID; ?>   
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
        </div>
      </div>

      <div class="row p-1 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Inventory Table List</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="dashboard_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                <thead style="text-align: center">
                    <tr style="line-height: 20px">
                      <th style="width:30%">Department</th>
                      <th style="width:30%">Head</th>
                      <th style="width:8%">Permanent</th>
                      <th style="width:8%">Casual</th>
                      <th style="width:8%">Job Order</th>
                      <th style="width:8%">Total</th>
                      <th style="width:8%">Total ID</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:14px">
                    <?php if ($department) : ?>
                    <?php foreach ($department->getResult() as $post) : ?>
                    <tr style="line-height: 20px">
                        <td><?php echo strtoupper($post->department) ?></td>
                        <td><?php echo strtoupper($post->head) ?></td>
                        <td style="text-align: center">
                          <?php if ($permanent) : ?>
                            <?php foreach ($permanent->getResult() as $post2) : ?>
                              <?php if ($post2->dept_code == $post->id_) : ?>
                                <strong><?php echo $post2->permanent; ?></strong>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                        <td style="text-align: center">
                          <?php if ($casual) : ?>
                            <?php foreach ($casual->getResult() as $post3) : ?>
                              <?php if ($post3->dept_code == $post->id_) : ?>
                                <strong><?php echo $post3->casual; ?></strong>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                        <td style="text-align: center">
                          <?php if ($joborder) : ?>
                            <?php foreach ($joborder->getResult() as $post4) : ?>
                              <?php if ($post4->dept_code == $post->id_) : ?>
                                <strong><?php echo $post4->joborder; ?></strong>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                        <td style="text-align: center">
                          <?php if ($alldept) : ?>
                            <?php foreach ($alldept->getResult() as $post5) : ?>
                              <?php if ($post5->dept_code== $post->id_) : ?>
                                <strong><?php echo $post5->allcount; ?></strong>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                        <td style="text-align: center">
                          <?php if ($deptID) : ?>
                            <?php foreach ($deptID->getResult() as $post6) : ?>
                              <?php if ($post6->dept_code == $post->id_) : ?>
                                <strong><?php echo $post6->countid; ?></strong>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                      </td> 
                      </tr>                     
                    <?php endforeach; ?>
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