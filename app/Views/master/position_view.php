
<div class="modal fade" id="modal-view">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
        <h4 class="modal-title">View Position</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>            
      <form id="myFormUpdate" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
        <div class="modal-body bg-light color-palette">
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">ID</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="v_id" name="v_id" placeholder="id" readonly>
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Position</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="v_position" name="v_position" placeholder="position" onchange="addPositionTextv()">
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Sub-Position</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="v_sub_position" name="v_sub_position" placeholder="Sub Position" onchange="addPositionTextv()">
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Description</span>
            </div>              
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control col-12" id="v_description" name="v_description" placeholder="Description" readonly>
          </div>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 120px">Code</span>
            </div>
            <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" id="v_pos_code" name="v_pos_code" placeholder="Position Code">
          </div>             
        </div>
        <div class="modal-footer bg-dark bg-gradient text-white">
          <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn col-3 btn-success btn-outline-light">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>