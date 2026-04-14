  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Department Division</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Department Division</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?= \Config\Services::validation()->listErrors(); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Division Details</h3>
              </div>

              <div class="row">
                <div class="col-lg-8">
                  <!-- form start -->
                  <form role="form" method="post" action="<?= base_url() ?>/Department/saveDivision">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="lastname">Department</label>
                        <input type="text" class="form-control" id="division" name="division" placeholder="Division">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Description</label>
                        <select class="form-control select2" id="department" name="department" style="width: 100%;">
                          <option selected="selected">Select Department</option>
                          <?php if($posts): ?>
                          <?php foreach($posts as $post): ?>
                          <option><?php echo $post['department']; ?></option>
                          <?php endforeach; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

              </div>
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>