<!-- Document Tracking -->
<li class="nav-header" >Document Tracking</li>
  <li class="nav-item">
    <a href="<?php echo base_url('document/incoming'); ?>"
      class="nav-link <?php if ($page == "Incoming") {echo "active";} ?>">
      <i class="nav-icon fas fa-file-import"></i>
      <p>Incoming</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('document/outgoing'); ?>"
      class="nav-link <?php if ($page == "Outgoing") {echo "active";} ?>">
      <i class="nav-icon fas fa-file-export"></i>
      <p>Outgoing</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('document/voucher'); ?>"
      class="nav-link <?php if ($page == "Voucher") {echo "active";} ?>">
      <i class="nav-icon far fa-file-alt"></i>
      <p>Voucher</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('document/documents'); ?>"
      class="nav-link <?php if ($page == "Documents") {echo "active";} ?>">
      <i class="nav-icon far fa-file-alt"></i>
      <p>Documents</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo base_url('document/request'); ?>"
      class="nav-link <?php if ($page == "Request") {echo "active";} ?>">
      <i class="nav-icon far fa-file-alt"></i>
      <p>Request</p>
    </a>
  </li>
</li>
<li class="nav-item">
  <a href="<?php echo base_url('document/request'); ?>"
    class="nav-link <?php if ($page == "JEV") {echo "active";} ?>">
    <i class="nav-icon far fa-file-alt"></i>
    <p style="font-size: 12px">(JEV) Journal Entry Voucher</p>
  </a>
</li>






