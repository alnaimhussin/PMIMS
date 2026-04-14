<!-- Accounting Menu -->
<li class="nav-header">Accounting Management</li>
<li class="nav-item">
  <a href="<?php echo base_url('master/department'); ?>"
    class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
    <i class="nav-icon  fab fa-microsoft"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item has-treeview <?php if ($page == "DeptVoucher") {echo "menu-open";} ?>">
  <a class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Voucher</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('document/disbursement_voucher'); ?>"
        class="nav-link <?php if ($pagesub == "DisbursementVoucher") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>(DV) Disbursement Voucher</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "Journal") {echo "menu-open";} ?>">
  <a class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Journal</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('accounting/generaljournal'); ?>"
        class="nav-link <?php if ($pagesub == "GeneralJournal") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>GJ - General Journal</p>
      </a>
    </li>
    <li class="nav-item has-treeview <?php if ($subpage == "SpecialJournals") {echo "menu-open";} ?>">
      <a class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Specials Journals</p>
      </a>
      <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
        <li class="nav-item">
          <a href="<?php echo base_url('accounting/cashreceiptsjournal'); ?>"
            class="nav-link <?php if ($pagesub == "CashReceiptsJournal") {echo "active";} ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>CRJ - Cash Receipts Journal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('accounting/procurementreceivedjournal'); ?>"
            class="nav-link <?php if ($pagesub == "ProcurementReceivedJournal") {echo "active";} ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>PRJ - Procurement Received Journal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('accounting/cashdisbursementsjournal'); ?>"
            class="nav-link <?php if ($pagesub == "CashDisbursementsJournal") {echo "active";} ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>CDJ - Cash Disbursements Journal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('accounting/checkdisbursementsjournal'); ?>"
            class="nav-link <?php if ($pagesub == "CheckDisbursementsJournal") {echo "active";} ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>CKDJ - Check Disbursements Journal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('accounting/checkdisbursementsjournal'); ?>"
            class="nav-link <?php if ($pagesub == "CheckDisbursementsJournal") {echo "active";} ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>ADADJ - Advice to Debit Account Disbursement Journal</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "GeneralLedger") {echo "menu-open";} ?>">
  <a class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>General Ledger</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('accounting/chartaccount'); ?>"
        class="nav-link <?php if ($pagesub == "ChartAccount") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Chart of Accounts</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('accounting/funds'); ?>"
        class="nav-link <?php if ($pagesub == "Funds") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Funds</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('accounting/bankaccounts'); ?>"
        class="nav-link <?php if ($pagesub == "BankAccounts") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Bank Accounts</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('accounting/journalentries'); ?>"
        class="nav-link <?php if ($pagesub == "JournalEntries") {echo "active";} ?>">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Journal Entries</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Period Closing</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Financial Statements</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Accounts Payable</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Vendor Management</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Purchase Orders</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Invoices</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Payments</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Aging Reports</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Accounts Receivable</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Customer Management</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Sales Orders</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Invoices</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Receipts</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Aging Reports</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Budgeting</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Budget Planning</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Budget Allocation</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Budget vs Actuals</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Forecasting</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Fixed Assets Management</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Asset Register</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Depreciation</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Asset Transfers</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Asset Disposal</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Inventory Management</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Item Master</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Stock Levels</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Stock Adjustments</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Reorder Management</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Financial Reporting</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Balance Sheet</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Income Statement</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Cash Flow Statement </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Custom Reports</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Export Reports</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Audit Trails</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Audit Logs</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>User Activity Tracking</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview <?php if ($page == "master") {echo "menu-close";} ?>">
  <a href="<?php echo base_url('master/position'); ?>" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Administration</p>
  </a>
  <ul class="nav nav-treeview" style="padding-left: 15px; font-size: 12px">
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>User Management</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Role-Based Access Control (RBAC)</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>System Configuration</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('master/profession'); ?>" class="nav-link">
        <i class="nav-icon fas fa-user-md"></i>
        <p>Data Backup and Restore</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="<?php echo base_url('master/department'); ?>"
    class="nav-link <?php if ($pagesub == "department") {echo "active";} ?>">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>Accountant's Advice</p>
  </a>
</li>
</li>