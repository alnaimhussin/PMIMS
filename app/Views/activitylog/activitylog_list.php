  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Activity Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activity Log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List of all Activity</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Timestamp</th>
                      <th>Username</th>
                      <th>Activity</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($posts) : ?>
                    <?php foreach ($posts->getResult() as $post) : ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo strtoupper($post->timestamp) ?></td>
                      <td><?php echo strtoupper($post->username) ?></td>
                      <td><?php echo strtoupper($post->activity) ?></td>
                      <td><?php echo strtoupper($post->message) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>