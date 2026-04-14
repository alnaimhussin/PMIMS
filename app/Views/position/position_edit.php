  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Position</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Position</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <?= \Config\Services::validation()->listErrors(); ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Position Details</h3>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <form role="form" method="post" action="<?= base_url() ?>/Position/save">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="lastname">Position</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Position">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                          placeholder="Description">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </section>
  </div>