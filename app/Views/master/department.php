<div class="content-wrapper">  <!-- Content Wrapper. Contains page content --> 
  <section class="content-header">  <!-- Content Header (Page header) -->
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Department Master</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Department Master</li>
          </ol>
        </div>
      </div>
    </div>  <!-- /.container-fluid -->
  </section> 
  
  <section class="content">  <!-- Main content -->
    <div class="container-fluid">      
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg" style="width: 200px; margin-bottom: 15px">Add Department</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg" style="width: 200px; margin-bottom: 15px">Delete Department</button>      
      <div class="row">  <!-- /.row -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Department Master List</h3>
            </div>  <!-- /.card-header -->            
            <div class="card-body table-responsive p-0" style="height: auto;">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width:3%">#</th>
                    <th style="width:40%">Department</th>
                    <th style="width:40%">Description</th>
                    <th style="width:17%">Code</th>
                  </tr>
                </thead>
                <tbody>                    
                  <?php $n=1; if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                  <tr>
                    <td><?php echo $n ?></td>
                    <td><?php echo strtoupper($post->department) ?></td>
                    <td><?php echo strtoupper($post->description) ?></td>
                    <td><?php echo strtoupper($post->dept_code) ?></td>
                  </tr>
                  <?php $n=$n+1; endforeach; ?>
                  <?php endif; ?>                    
                </tbody>
              </table>
            </div>  <!-- /.card-body -->
          </div>  <!-- /.card -->
        </div>
      </div>  <!-- /.row -->      
    </div  ><!-- /.container-fluid -->
  </section>
    
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info color-palette">
          <h4 class="modal-title">Add Department</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>            
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" onSubmit="return" action="<?= base_url() ?>/Master/addDepartment">
          <div class="modal-body bg-light disabled color-palette">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Department</span>
              </div>
              <input type="text" class="form-control col-12" id="department" name="department" placeholder="Department">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Description</span>
              </div>              
              <input type="text" class="form-control col-12" id="description" name="description" placeholder="Description">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Code</span>
              </div>
              <input type="text" class="form-control" id="dept_code" name="dept_code" placeholder="Department Code">
            </div>             
          </div>
          <div class="modal-footer bg-info color-palette">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light">Add Department</button>
          </div>
        </form>
      </div>  <!-- /.modal-content -->
    </div>  <!-- /.modal-dialog -->
  </div>  <!-- /.modal -->
</div>