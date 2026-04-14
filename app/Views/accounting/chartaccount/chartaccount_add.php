<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg modal-dialog-centered"">
      <div class="modal-content">
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">Add New Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height:40vh">
            <div class="row">
              <div class="col-lg-12 col-sm-12 mt-lg-0 mt-3">
                <div class="tab-pane text-left fade show active" id="vert-tabs-information" role="tabpanel" aria-labelledby="vert-tabs-information-tab">
                  <div class="card-body" style="padding: 5px">
                    <div class="row">
                      <div class="col-12">
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 150px">Account Code</span>
                          </div>
                          <input type="text" class="form-control" id="account_code" name="account_code"
                            onChange="checkDuplicateAccountCode(account_code.value)">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 150px">Parent Account</span>
                          </div>
                          <select class="form-control" id="parent_code" name="parent_code"
                                style="width: 56.3%;">
                                <option selected="selected">--</option>
                                <?php if ($account_title) : ?>
                                <?php foreach ($account_title->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->account_code) ?>">
                                  <?php echo strtoupper($post->account_code.' - '.$post->account_title) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                          </select>
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 150px">Account Type</span>
                          </div>
                          <select class="form-control" id="account_type" name="account_type"
                                style="width: 56.3%;">
                                <option selected="selected">--</option>
                                <?php if ($account_type) : ?>
                                <?php foreach ($account_type->getResult() as $post) : ?>
                                <option value="<?php echo strtoupper($post->account_type) ?>">
                                  <?php echo strtoupper($post->account_type) ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                          </select>
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 150px">Account Title</span>
                          </div>
                          <input type="text" class="form-control" id="account_title" name="account_title">
                        </div>
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 150px">Description</span>
                          </div>
                          <input type="text" class="form-control" id="account_desc" name="account_desc">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-12">
              <div class="row pl-2 pr-2 mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end">   
                <button type="button" class="col-3 btn btn-dark mr-1 bg-red border-0" data-dismiss="modal">Close</button>
                <button type="submit" class="col-3 btn btn-dark" id="addButton" disabled>Add New Account</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
