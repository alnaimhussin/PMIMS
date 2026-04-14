<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">User List</li>
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
        <div class="row pl-2 pr-2 mt-2 mb-2">
            <button type="button" class="col-lg-2 col-sm-12 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-add">Add New User</button>
            <button type="button" class="col-lg-2 col-sm-12 mt-1 mt-lg-0 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-lg">Delete User</button>
        </div>
      </div>
      
      <div class="row p-1 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">User List</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="user_table" class="table table-bordered  table-striped table-head-fixed table-hover text-wrap">
                  <thead style="text-align: center">
                    <tr style="line-height: 20px">
                      <th style="width:2%">#</th>
                      <th style="width:5%">Action</th>
                      <th style="width:20%">Name</th>
                      <th style="width:20%">Username</th>
                      <th style="width:20%">Password</th>
                      <th style="width:10%">Access</th>
                      <th style="width:10%">Sub-Access</th>
                      <th style="width:10%">Permission</th>
                    </tr>
                  </thead>
                  <tbody id="search" name="search" style="font-size:12px">
                    <?php $n=1; if ($users) : ?>
                    <?php foreach ($users->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="">
                      <td class="pl-3"><?php echo $n ?></td>
                      <td></td>
                      <td><b><?php echo strtoupper($post->firstname . ' ' . $post->lastname) ?></b></td>
                      <td><?php echo strtoupper($post->username) ?></td>
                      <td><?php echo strtoupper($post->password) ?></td>
                      <td><?php echo strtoupper($post->access_type) ?></td>
                      <td><?php echo strtoupper($post->sub_access) ?></td>
                      <td><?php echo strtoupper($post->permission) ?></td>
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