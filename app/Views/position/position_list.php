<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Position List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Position List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of all Position</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($posts): ?>
                  <?php foreach($posts as $post): ?>
                  <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td><?php echo $post['position']; ?></td>
                    <td><?php echo $post['description']; ?></td>
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