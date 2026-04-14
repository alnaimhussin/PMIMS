  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <strong style="color: LightGray;">
          <?php if (session()->has('username')): ?>
              <p>Welcome, <?= esc(session()->get('username')) ?></p>
          <?php else: ?>
              <p>Welcome, Guest</p>
          <?php endif; ?> </strong>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">