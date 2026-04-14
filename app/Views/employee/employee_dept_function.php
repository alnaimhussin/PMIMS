

<section class="content">
  <div class="modal fade" id="modal-addPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="smodal-addPositionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info color-palette">
          <h4 class="modal-title">Add Position</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>            
        <form id="formPosition" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-body bg-light disabled color-palette">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Position</span>
              </div>
              <input type="text" class="form-control col-12" id="position" name="position" placeholder="position">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Description</span>
              </div>              
              <input type="text" class="form-control col-12" id="description" name="description" placeholder="Description">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Code</span>
              </div>
              <input type="text" class="form-control" id="pos_code" name="pos_code" placeholder="Position Code">
            </div>             
          </div>
          <div class="modal-footer bg-info color-palette">
            <input type="text" class="invisible" id="caller" name="caller" placeholder="" value="employee">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal" onclick="addPosition()">Add Position</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-addProfession">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info color-palette">
          <h4 class="modal-title">Add Profession</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>            
        <form id="formProfession" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-body bg-light disabled color-palette">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Profession</span>
              </div>
              <input type="text" class="form-control col-12" id="profession" name="profession" placeholder="Profession">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Description</span>
              </div>              
              <input type="text" class="form-control col-12" id="description" name="description" placeholder="Description">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 120px">Code</span>
              </div>
              <input type="text" class="form-control" id="prof_code" name="prof_code" placeholder="Profession Code">
            </div>             
          </div>
          <div class="modal-footer bg-info color-palette">
          <input type="text" class="invisible" id="caller" name="caller" placeholder="" value="employee">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light" data-dismiss="modal" onclick="addProfession()">Add Profession</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
