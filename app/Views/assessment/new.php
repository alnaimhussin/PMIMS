  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assessment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Assessment</a></li>
              <li class="breadcrumb-item active">New</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">SWORN STATEMENT OF THE TRUE CURRENT AND FAIR MARKET VALUE OF REAL PROPERTY</h3>
        </div>

        <div class="col-md-5" style="margin-top: 20px">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Collapsible Accordion</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-2 col-form-label">Land Owner</label>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="citizenship" class="col-sm-12 col-lg-2 col-form-label">Citizenship</label>
                <div class="col-sm-12 col-lg-2">
                  <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" value="">
                </div>
                <label for="civilstatus" class="col-sm-12 col-lg-1 col-form-label">Civil Status</label>
                <div class="col-sm-12 col-lg-2">
                  <input type="text" class="form-control" id="civilstatus" name="civilstatus" placeholder="Civil Status" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="tin" class="col-sm-12 col-lg-2 col-form-label">TIN</label>
                <div class="col-sm-12 col-lg-2">
                  <input type="text" class="form-control" id="tin" name="tin" placeholder="TIN" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="contact" class="col-sm-12 col-lg-1 col-form-label">Contact #</label>
                <div class="col-sm-12 col-lg-2">
                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-12 col-lg-1 col-form-label">Address</label>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="municipal" name="municipal" placeholder="Municipal" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-sm-12 col-lg-1 col-form-label">Benificial</label>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="">
                </div>
                <div class="col-sm-12 col-lg-3">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" value="">
                </div>
              </div>
            </div>
          </div>
          </div>

        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data"
          onSubmit="return checkform()" action="<?= base_url() ?>/Client/saveInbound">
          <div class="card-body">
            
          </div>
          <div class="card-footer">
            <div class="box-footer">
              <div class="col-lg-2" style="">
                <button type="submit" class="btn btn-success btn-block btn-flat"
                  style="height: 50px; font-size: 20px">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </section>
  </div>

  <script>
  </script>