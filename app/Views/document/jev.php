<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Document Tracking - JEV List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Document Tracking</li>
            <li class="breadcrumb-item active">JEV List</li>
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
          <div class="col-lg-10 col-sm-12">
            <div class="row pl-2 pr-2">
                <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">JEV NO.</span>
                <select class="col-lg-10 col-sm-12" id="searchDept" name="searchDept" style="height:38px">
                  <option id="defaultDept" selected="selected" value="0">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->id_) ?>"><?php echo strtoupper($post->department) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
            <div class="row pl-2 pr-2 mt-1">
                <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">Request ID</span>
                <select class="col-lg-10 col-sm-12" id="searchPos" name="searchPos" style="height:38px">
                  <option id="defaultPos" selected="selected" value="0">--</option>
                  <?php if ($position) : ?>
                  <?php foreach ($position->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->id) ?>"><?php echo strtoupper($post->position) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <div class="row pl-2 pl-lg-0 pr-2 mt-2 mt-lg-0">
                <button class="col-lg-12 col-sm-12 btn btn-primary pl-1 pr-1 float-end" onclick="search()">Search</button>
                <button class="col-lg-12 col-sm-12 mt-1 mt-lg-1 btn btn-success pl-1 pr-1 float-end" onclick="searchAll()">All</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row p-1 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-file-import"></i></span>
                </div>
              <h5 class="">Request List</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="employee_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                  <thead style="text-align: center; vertical-align: middle">
                    <tr style="line-height: 20px">
                      <th class="align-middle" style="width:2%">#</th>
                      <th class="align-middle" style="width:5%">Request ID</th>
                      <th class="align-middle" style="width:5%">Request Type</th>
                      <th class="align-middle" style="width:20%">Title/Description</th>
                      <th class="align-middle" style="width:5%">Department</th>
                      <th class="align-middle" style="width:3%">Date Created</th>
                      <th class="align-middle" style="width:3%">Date Modified</th>
                      <th class="align-middle" style="width:5%">Received By</th>
                      <th class="align-middle" style="width:7%">Status</th>
                      <th class="align-middle" style="width:23%">Remarks</th>
                    </tr>
                  </thead>
                  <tbody id="search" name="search" style="font-size:12px">
                    <?php $n=1; if ($employee) : ?>
                    <?php foreach ($employee->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="viewDetail('<?php echo $post->_id; ?>')">
                      <td class="pl-3"><?php echo $n ?></td>
                      <td><?php echo strtoupper($post->pgbid) ?></td>
                      <td><?php echo strtoupper($post->nickname) ?></td>
                      <td>
                        <?php if ($post->position != "--") {echo strtoupper($post->position . ' <b>( ' . $post->pos_code . ' )</b>' );} ?>
                      </td>
                      <td><?php echo strtoupper($post->department) ?></td>
                      <td><?php echo strtoupper($post->birthdate) ?></td>
                      <td><?php echo strtoupper($post->birthdate) ?></td>
                      <td><b><?php echo strtoupper($post->lastname . ', ' . $post->firstname . ' ' . $post->middlename) ?></b>
                      </td>
                      <td><?php if ($post->sg_code != "--") {echo strtoupper($post->sg_code);} ?></td>
                      <td><?php echo strtoupper($post->status) ?></td>
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