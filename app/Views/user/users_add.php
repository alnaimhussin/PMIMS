<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <form id="userForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">Add New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="">
            <div class="row">
              <div class="col-lg-12 col-sm-12 mt-lg-0 mt-3">
                <div class="tab-content" id="vert-tabs-tabContent">
                    <div class="card card-primary">
                      <div class="card-header bg-dark bg-gradient text-white">
                        <h3 class="card-title">Details</h3>
                      </div>
                      <div class="card-body" style="padding: 5px">
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Firstname</span>
                          </div>
                          <input type="text" class="form-control" id="firstname" name="firstname" onChange="">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Lastname</span>
                          </div>
                          <input type="text" class="form-control" id="lastname" name="lastname" onChange="">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Username</span>
                          </div>
                          <input type="text" class="form-control" id="username" name="username" onChange="">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Password</span>
                          </div>
                          <input type="text" class="form-control" id="password" name="password" onChange="">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Department</span>
                          </div>
                          <select class="form-control" id="department" name="department">
                              <option value="0">-- ALL --</option>
                              <?php if ($department) : ?>
                              <?php foreach ($department->getResult() as $post) : ?>
                                  <option value="<?php echo strtoupper($post->id_) ?>"><?php echo strtoupper($post->department) ?></option>
                              <?php endforeach; ?>
                              <?php endif; ?>
                          </select>
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 160px">Access Type</span>
                          </div>
                          <select class="form-control" id="access_type" name="access_type">
                            <option value="0">Administrator</option>
                            <option value="1">Supervisor</option>
                            <option value="2">Staff</option>
                            <option value="3">Encoder</option>
                          </select>
                        </div>
                      </div>
                    </div>      
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-5">
              <div class="row pl-2 pr-2 mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end">   
                <button type="button" class="col-5 btn btn-dark mr-1 bg-red border-0" data-dismiss="modal">Close</button>
                <button type="submit" class="col-5 btn btn-dark" id="addButton">Add User</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
