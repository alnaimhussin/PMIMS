  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
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
                <h3 class="card-title">List of all User Account</h3>
              </div>
              <div class="card-body">

                <button type="submit" class="btn col-1 btn-primary btn-block" data-toggle="modal"
                  data-target="#addModal">Add User</button>
                <br>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#</th>
                      <th style="width: 10%;">Action</th>
                      <th style="">Name</th>
                      <th style="width: 20%;">username</th>
                      <th style="width: 8%;">Access</th>
                      <th style="width: 8%;">Sub-Access</th>
                      <th style="">Permission</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($users) : ?>
                    <?php foreach ($users->getResult() as $post) : ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td>
                        <button class="btn bg-danger" onclick="callme(<?php echo strtoupper($post->id) ?>)"><i
                            class="fa fa-trash"></i></button>
                        <button class="btn bg-warning"
                          href="<?= base_url() ?>/user/view/<?php echo strtoupper($post->id) ?>"><i
                            class="fa fa-eye"></i></button>
                        <button class="btn bg-warning"
                          href="<?= base_url() ?>/user/edit/<?php echo strtoupper($post->id) ?>"><i
                            class="fas fa-user-edit"></i></button>
                      </td>
                      <td><?php echo strtoupper($post->lastname).', '.strtoupper($post->firstname) ?></td>
                      <td><?php echo $post->username ?></td>
                      <td><?php echo strtoupper($post->access_type); $i++; ?></td>
                      <td><?php echo strtoupper($post->sub_access); $i++; ?></td>
                      <td></td>
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

          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url() ?>/register/create" method="post">
                  <div class="modal-body">
                    <div class="form-group row">
                      <label for="lastname" class="col-sm-12 col-lg-3 col-form-label">Lastname</label>
                      <div class="col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                          value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="firstname" class="col-sm-12 col-lg-3 col-form-label">Firstname</label>
                      <div class="col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                          value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="access_type" class="col-sm-12 col-lg-3 col-form-label">Office</label>
                      <div class="col-sm-5 col-lg-4">
                        <select class="form-control" id="access_type" name="access_type">
                          <option value="0">I.T.</option>
                          <option value="1">PHRMDO</option>
                          <option value="2">PPDO</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="access_type" class="col-sm-12 col-lg-3 col-form-label">Sub Access</label>
                      <div class="col-sm-5 col-lg-4">
                        <select class="form-control" id="access_sub" name="access_sub">
                          <option value="0">Admin</option>
                          <option value="1" selected>Encoder</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-12 col-lg-3 col-form-label">Username</label>
                      <div class="col-sm-5 col-lg-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                          value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-12 col-lg-3 col-form-label">Password</label>
                      <div class="col-sm-5 col-lg-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                          value="">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    function callme(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo base_url(); ?>/users/delete/' + id,
            method: "POST",
            async: true,
            dataType: 'json',
          });
          Swal.fire({
            title: 'Deleted!',
            text: "User has been deleted.",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            window.location.href = "<?php echo base_url().'/users/list'; ?>";
          })
          // return false;
        }
      })
    }
  </script>