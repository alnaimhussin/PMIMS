<section class="content">

  <div class="modal fade" id="modal-id">

    <div class="modal-dialog modal-fullscreen">

      <div class="modal-content">

        <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">

          <h5 class="modal-title">Add New Employee ID</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body bg-light disabled color-palette">

          <div class="row">

            <div class="col-lg-3 col-sm-12">

              <div div class="card card-info">

                <div class="card-header bg-dark bg-gradient text-white">

                  <h3 class="card-title">Search</h3>

                  <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

                  </div>

                </div>

                <div class="card-body pt-2 h-100" style="height: 730px;">  

                  <div class="col-12">

                    <div class="row">

                      <div class="col-lg-12 col-sm-12">

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

                      <div class="col-lg-12 col-sm-12">

                        <div class="card">

                          <div class="card-body table-responsive p-0" style="height: 300px;">

                            <table class="table table-bordered table-head-fixed table-striped table-hover text-wrap">

                              <thead>

                                <tr>

                                  <th style="width:20%">Fullname</th>

                                  <th style="width:25%">Department</th>

                                </tr>

                              </thead>

                              <tbody id="search" name="search">

                              </tbody>

                            </table>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>



            <div class="col-lg-7 col-sm-12">

              <div div class="card card-info">

                <div class="card-header bg-dark bg-gradient text-white">

                  <h3 class="card-title">Employee Information</h3>

                </div>

                <div class="card-body p-2" style="">

                  <div class="row">

                    <div class="col-lg-8 col-sm-12">

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

                    <div class="col-lg-4 col-sm-12">

                      <div class="card card-primary">

                        <div class="card-header">

                          <h3 class="card-title">QR Code</h3>

                        </div>

                        <div class="card-body" style="padding: 8px; position: relative;">

                          <div id="qrcode" ondblclick=""></div>

                        </div>

                      </div>

                    </div>

                  </div>



                  <div class="row">

                    <div class="col-lg-6 col-sm-12">

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



                    <div class="col-lg-6 col-sm-12">

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



            <div class="col-lg-2 col-sm-12">

                <div class="card card-info">

                    <div class="card-header"><h3 class="card-title">Upload</h3></div>

                    <div class="card-body pl-2 pr-2 pt-2" style="height: 730px;">   

                        <form method="post" id="upload_form" enctype="multipart/form-data" action="<?= base_url('Employee/save') ?>">

                            <input type="hidden" id="qr_code_data" name="qr_code_data">

                            

                            <div class="input-group mb-1">

                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" readonly>

                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" readonly>

                                <input type="text" class="form-control" id="nickname" name="nickname" readonly>

                            </div>

                            <div class="input-group mb-1">

                                <input type="text" class="form-control" id="dept_code" name="dept_code" placeholder="Dept" readonly>

                                <input type="text" class="form-control" id="pgbid2" name="pgbid2" placeholder="PGBID" readonly>

                            </div>

                            <input type="text" class="form-control mb-1" id="unique_id" name="unique_id" placeholder="UniqueID" readonly>

            

                            <div class="custom-file mb-1">

                                <input type="file" class="custom-file-input" name="file_picture" id="file_picture" onchange="loadFile1(event)">

                                <label class="custom-file-label">Picture</label>

                            </div>

                            <div class="custom-file mb-1">

                                <input type="file" class="custom-file-input" name="file_signature" id="file_signature" onchange="loadFile2(event)">

                                <label class="custom-file-label">Signature</label>

                            </div>

                            

                            <div style="text-align: center;">

                                <img id="output1" width="50%" style="border: 1px solid #555; margin-top: 5px" hidden>

                                <img id="output2" width="50%" style="border: 1px solid #555; margin-top: 5px" hidden>

                            </div>

            

                            <div class="mt-3">

                                <button type="submit" class="btn col-12 btn-success btn-outline-light">Upload Everything</button>

                                <button type="button" class="btn col-12 btn-danger btn-outline-light mt-1" data-dismiss="modal">Close</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

          </div>



          <div class="row">

            



            

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

