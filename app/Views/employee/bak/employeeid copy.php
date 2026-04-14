  <div class="content-wrapper">
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <button type="button" class="col-lg-2 col-sm-12 btn btn-primary mb-1" data-toggle="modal" data-target="#modal-booking">Add New Employee</button>
            <button type="button" class="col-lg-2 col-sm-12 btn btn-danger mb-1" data-toggle="modal" data-target="#modal-lg">Delete Employee</button>
            <button type="button" class="col-lg-2 col-sm-12 btn btn-info mb-1" data-toggle="modal" data-target="#modal-lg">Upload ID</button>
          </div>
        </div>

          <div class="col-12">
            <div class="row mt-2" style="margin-bottom: 10px">
                <span class="input-group-text mr-1" style="height: 38px; width: 16.7%">Department</span>
                <select class="select2" id="searchDept" name="searchDept" style="width: 82.6%">
                  <option selected="selected">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->dept_code) ?>"><?php echo strtoupper($post->department) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                <button type="button" class="col-lg-2 col-sm-12 btn btn-primary mt-1 mr-1" onclick="search2()">Search</button>
                <button type="button" class="col-lg-2 col-sm-12 btn btn-success mt-1" onclick="searchAll()">All</button>
            </div>
          </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Employee ID List</h3>
                <div class="card-tools">

                </div>
              </div> <!-- /.card-header -->
            <div style="height: auto; padding:15px">
              <div class="card-body table-responsive p-0" style="height: auto;">
                <table id="employee_table" class="table table-bordered table-head-fixed table-striped table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width:10%">PGB ID #</th>
                      <th style="width:25%">UNIQUE ID</th>
                      <th style="width:25%">Fullname</th>
                      <th style="width:25%">Department</th>
                      <th style="width:10%">ID Status</th>
                    </tr>
                  </thead>
                  <tbody id="search2" name="search2" style="font-size:14px">  
                    <?php $n=1; if ($emp_id) : ?>
                    <?php foreach ($emp_id->getResult() as $post) : ?>
                    <tr style="line-height: 10px" ondblclick="gen_id2('<?php echo strtoupper($post->pgbid); ?>')">
                      <td><?php echo strtoupper($post->pgbid) ?></td>
                      <td><?php echo strtoupper($post->unique_id) ?></td>
                      <td><?php echo strtoupper($post->lastname).", ".strtoupper($post->firstname)." ".strtoupper($post->middlename) ?></td>
                      <td><?php echo strtoupper($post->department) ?></td>
                      <td></td>
                    </tr>
                    <?php $n=$n+1; endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div>
            </div> <!-- /.card -->
          </div>
        </div> <!-- /.row -->
      </div> <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-booking">
      <div class="modal-dialog modal-xl" style="max-width: 90%;">
        <div class="modal-content bg-gray-dark color-palette">
          <div class="modal-header">
            <h4 class="modal-title">Add New ID</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body bg-light disabled color-palette">
            <div class="row">
              <div class="col-3">
                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Search</h3>
                  </div>
                  <div class="card-body">
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">PGB ID</span>
                      </div>
                      <input type="text" class="form-control" id="search_pgbid" name="search_pgbid"
                        placeholder="PGB ID #" onchange="search()">
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">Lastname</span>
                      </div>
                      <input type="text" class="form-control" id="search_lastname" name="search_lastname"
                        placeholder="Lastname" onchange="search_name()">
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">Firstname</span>
                      </div>
                      <input type="text" class="form-control" id="search_firstname" name="search_firstname"
                        placeholder="Firstname" onchange="search_name()">
                    </div>
                  </div>
                </div>

                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Search List</h3>
                  </div>
                  <div class="card-body" style="height: 500px">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body table-responsive p-0" style="height: auto;">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="width:20%">Fullname</th>
                                  <th style="width:25%">Department</th>
                                </tr>
                              </thead>
                              <tbody id="search" name="search">
                              </tbody>
                            </table>
                          </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Employee Information</h3>
                  </div>
                  <div class="card-body" style="height: 730px;">
                    <div class="row">
                      <div class="col-8">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Information</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Unique ID #</span>
                              </div>
                              <input type="text" class="form-control" id="uniqueid" name="uniqueid" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">PGB ID #</span>
                              </div>
                              <input type="text" class="form-control" id="pgbid" name="pgbid" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Name</span>
                              </div>
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Position</span>
                              </div>
                              <input type="text" class="form-control" id="position" name="position" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Department</span>
                              </div>
                              <input type="text" class="form-control" id="department" name="department" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Department Head</span>
                              </div>
                              <input type="text" class="form-control" id="departmenthead" name="departmenthead"
                                placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">QR Code</h3>
                          </div>
                          <div class="card-body" style="padding: 8px">
                            <div id="qrcode" style="text-align: center;" ondblclick="downloadQR()"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Membership</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">GSIS</span>
                              </div>
                              <input type="text" class="form-control" id="gsis" name="gsis" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">PhilHealth</span>
                              </div>
                              <input type="text" class="form-control" id="philhealth" name="philhealth" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">TIN</span>
                              </div>
                              <input type="text" class="form-control" id="tin" name="tin" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Pag-Ibig</span>
                              </div>
                              <input type="text" class="form-control" id="pagibig" name="pagibig" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">SSS</span>
                              </div>
                              <input type="text" class="form-control" id="sss" name="sss" placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Contacts</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Address</span>
                              </div>
                              <input type="text" class="form-control" id="address" name="address" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Contact</span>
                              </div>
                              <input type="text" class="form-control" id="contact" name="contact" placeholder=""
                                readonly>
                            </div>
                          </div>
                        </div>

                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Incase of Emergency</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Name</span>
                              </div>
                              <input type="text" class="form-control" id="e_person" name="e_person" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Address</span>
                              </div>
                              <input type="text" class="form-control" id="e_address" name="e_address" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Contact</span>
                              </div>
                              <input type="text" class="form-control" id="e_contact" name="e_contact" placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Upload</h3>
                  </div>
                  <div class="card-body" style="height: 730px;">   
                    <form method="post" id="upload_form" enctype="multipart/form-data" action="<?= base_url() ?>/Employee/save">
                      <div class="input-group mb-1">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" readonly>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" readonly>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="" readonly>
                      </div>
                      <div class="input-group mb-1">
                        <input type="text" class="form-control" id="dept_code" name="dept_code" placeholder="" readonly>
                        <input type="text" class="form-control" id="pgbid2" name="pgbid2" placeholder="" readonly>
                        <input type="text" class="form-control" id="" name="" placeholder="" readonly>
                      </div>
                      <input type="text" class="form-control mb-1" id="unique_id" name="unique_id" placeholder="" readonly>
                      <div class="input-group mb-1">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_picture" id="file_picture" onchange="loadFile1(event)">
                          <label class="custom-file-label" for="file_picture">Choose picture</label>
                        </div>
                      </div>   
                      <div class="input-group mb-1">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_signature" id="file_signature" onchange="loadFile2(event)">
                          <label class="custom-file-label" for="file_signature">Choose signature</label>
                        </div>
                      </div>  
                      <div class="input-group mb-1">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_qrcode" id="file_qrcode" onchange="loadFile3(event)">
                          <label class="custom-file-label" for="file_qrcode">Choose QRcode</label>
                        </div>
                      </div>       
                      <div style="text-align: center;">
                      <img src="<?php echo base_url('/img/pic_clear.png'); ?>" id="output1" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px" hidden>
                      <img src="<?php echo base_url('/img/sig_clear.png'); ?>" id="output2" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px" hidden>
                      <img src="<?php echo base_url('/img/sig_clear.png'); ?>" id="output3" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px" hidden>
                      <div class="row">
                        <button type="submit" class="btn col-12 btn-success btn-outline-light" style="margin-top: 10px">Upload</button>
                        <button type="button" class="btn col-12 btn-danger btn-outline-light" style="margin-top: 5px" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>