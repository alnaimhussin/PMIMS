<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">Add New Bank</h5>
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
                              <span class="input-group-text" style="width: 200px">Bank Name</span>
                          </div>
                          <input type="text" class="form-control" id="bank_name" name="bank_name" required
                          onChange="checkDuplicateBankCode(bank_code.value)">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Bank Branch</span>
                          </div>
                          <input type="text" class="form-control" id="bank_branch" name="bank_branch" required
                          onChange="checkDuplicateBankCode(bank_code.value)">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Bank Code</span>
                          </div>
                          <input type="text" class="form-control" id="bank_code" name="bank_code"
                            onChange="checkDuplicateBankCode(bank_code.value)">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Account Name</span>
                          </div>
                          <input type="text" class="form-control" id="account_name" name="account_name" required
                          onChange="checkDuplicateBankCode(bank_code.value)">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Account Number</span>
                          </div>
                          <input type="text" class="form-control" id="account_number" name="account_number" required
                          onChange="checkDuplicateBankCode(bank_code.value)">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Account Type</span>
                          </div>
                          <select class="form-control" id="account_type" name="account_type" required
                          onChange="checkDuplicateBankCode(bank_code.value)">
                              <option value="Current">Current</option>
                              <option value="Savings">Savings</option>
                              <option value="Trust">Trust</option>
                              <option value="Time Deposit">Time Deposit</option>
                          </select>
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Account Opening Date</span>
                          </div>
                          <input type="date" class="form-control" id="account_opening_date" name="account_opening_date">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Account Status</span>
                          </div>
                          <select class="form-control" id="account_status" name="account_status">
                              <option value="Active">Active</option>
                              <option value="Dormant">Dormant</option>
                              <option value="Closed">Closed</option>
                          </select>
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">BIC/SWIFT Code</span>
                          </div>
                          <input type="text" class="form-control" id="bic_swift_code" name="bic_swift_code">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Routing Number</span>
                          </div>
                          <input type="text" class="form-control" id="routing_number" name="routing_number">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Bank TIN</span>
                          </div>
                          <input type="text" class="form-control" id="bank_tin" name="bank_tin">
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Special Instructions</span>
                          </div>
                          <textarea class="form-control" id="special_instructions" name="special_instructions"></textarea>
                      </div>

                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="width: 200px">Remarks</span>
                          </div>
                          <textarea class="form-control" id="remarks" name="  "></textarea>
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
