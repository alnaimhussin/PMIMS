<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee ID List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Employee ID List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="col-12">
        <div class="row pl-2 pr-2 mt-2 mb-2">
          <button type="button" class="col-lg-2 col-sm-12 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-id">Add New Employee</button>
          <button type="button" class="col-lg-2 col-sm-12 mt-1 mt-lg-0 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-lg">Delete Employee</button>
          <button type="button" class="col-lg-2 col-sm-12 mt-1 mt-lg-0 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-lg">Upload ID</button>
        </div>
      </div>

      <div class="col-12">
        <div class="row">
          <div class="col-lg-10 col-sm-12">
            <div class="row pl-2 pr-2">
            <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">Department</span>
                <select class="col-lg-10 col-sm-12" id="searchDept" name="searchDept" style="height:38px">
                <option selected="selected">--</option>
                <?php if ($department) : ?>
                <?php foreach ($department->getResult() as $post) : ?>
                    <option value="<?php echo strtoupper($post->id_) ?>"><?php echo strtoupper($post->department) ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
          </div>
        
          <div class="col-lg-2 col-sm-12">
            <div class="row pl-2 pl-lg-0 pr-2 mt-2 mt-lg-0">
              <button class="col-lg-12 col-sm-12 btn btn-primary pl-1 pr-1 float-end" onclick="searchDept()">Search</button>
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
                  <span class=""><i class="nav-icon far fa-id-badge"></i></span>
                </div>
              <h5 class="">Employee ID List</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="employee_table" class="table table-bordered table-head-fixed table-striped table-hover text-nowrap">
                  <thead style="text-align: center">
                    <tr>
                      <th style="width:3%">#</th>
                      <th style="width:7%">PGB ID #</th>
                      <th style="width:15%">UNIQUE ID</th>
                      <th style="width:20%">Fullname</th>
                      <th style="width:25%">Department</th>
                      <th style="width:20%">Position</th>
                      <th style="width:5%">ID Status</th>
                      <th style="width:5%">Online</th>
                    </tr>
                  </thead>
                  <tbody id="search2" name="search2" style="font-size:12px">  
                    <?php $n=1; if ($emp_id) : ?>
                    <?php foreach ($emp_id->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="gen_id('<?php echo strtoupper($post->pgbid); ?>')">
                      <td><?php echo $n ?></td>
                      <td><?php echo strtoupper($post->pgbid) ?></td>
                      <td><?php echo strtoupper($post->unique_id) ?></td>
                      <td><b><?php echo strtoupper($post->lastname).", ".strtoupper($post->firstname)." ".strtoupper($post->middlename) ?></b></td>
                      <td><?php echo strtoupper($post->department) ?></td>
                      <td><?php echo strtoupper($post->position) ?></td>
                      <td></td>
                      <td></td>
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