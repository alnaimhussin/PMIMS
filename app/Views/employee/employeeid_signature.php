<?php $session = \Config\Services::session(); ?>

<section class="content">
  <div class="modal fade" id="modal-addSignature">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Capture Signature</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="height:70vh">
            <div id="signature-pad" class="m-signature-pad">
              <div class="m-signature-pad--body">
                <canvas></canvas>
              </div>
              <div class="m-signature-pad--footer">
                <div class="description">Sign above</div>
                <div class="left">
                  <button type="button" class="button clear" data-action="clear">Clear</button>
                </div>
                <div class="right">
                  <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                  <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default col-2" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary col-2" id="captureButton">Capture</button>
        </div>
      </div>
    </div>
  </div>
</section>