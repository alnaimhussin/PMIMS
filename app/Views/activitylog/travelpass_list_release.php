  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Travel Pass Release</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Travel Pass Release</li>
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
                <h3 class="card-title">List of all Travel Pass Release </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Action</th>
                      <th>Pass Id</th>
                      <th>Category</th>
                      <th>Origin</th>
                      <th>Destination</th>
                      <th>Approved By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($posts) : ?>
                    <?php foreach ($posts->getResult() as $post) : ?>
                      <?php
                    if ($post->category == 1) { $category = "MEDICAL FRONTLINER";
                    } else if ($post->category == 2) { $category = "ESSENTIAL / APOR / GOV'T EMPLOYEE / PUBLIC SERVANT";
                    } else if ($post->category == 3) { $category = "BUSINESS PURPOSE";
                    } else ($post->category == 3) { $category = "PATIENT & WATCHER" } ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td>
                        <a class="btn bg-warning"
                          href="<?= base_url() ?>/travelpass/viewMember/<?php echo strtoupper($post->pass_id) ?>"><i
                            class="fa fa-eye"></i></a>
                      </td>
                      <td><?php echo strtoupper($post->pass_id) ?></td>
                      <td><?php echo strtoupper($category) ?></td>
                      <td><?php echo strtoupper($post->lguName). ", " .strtoupper($post->barangay); $i++; ?></td>
                      <td><?php echo strtoupper($post->provDesc). ", " .strtoupper($post->citymun) ?></td>
                      <td><?php echo $post->approvedby ?></td>
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
            url: '<?php echo base_url(); ?>/Travel Pass/delete/' + id,
            method: "POST",
            async: true,
            dataType: 'json',
          });
          Swal.fire({
            title: 'Deleted!',
            text: "Your file has been deleted.",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            window.location.href = "<?php echo base_url().'/Travel Pass/List Release'; ?>";
          })
          // return false;
        }
      })
    }
  </script>