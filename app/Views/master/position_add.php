
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
        <h4 class="modal-title">Add Position</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>            
      <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" onSubmit="return" action="<?= base_url() ?>/Master/addPosition">
        <div class="modal-body bg-light disabled color-palette">
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Position</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="position" name="position" placeholder="Position" onchange="addPositionText()">
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Sub-Position</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="sub_position" name="sub_position" placeholder="Sub Position" onchange="addPositionText()">
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Description</span>
            </div>              
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="description" name="description" placeholder="Description" readonly>
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Code</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" id="pos_code" name="pos_code" placeholder="Position Code">
          </div>             
        </div>
        <div class="modal-footer bg-dark bg-gradient text-white">
          <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn col-3 btn-success btn-outline-light">Add Position</button>
        </div>
      </form>
    </div>
  </div>
</div>