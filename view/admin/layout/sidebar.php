  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?controller=admin_home&action=index" class="brand-link">
      <img src="/public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Đỗ Tiến Công</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <?php
      $menu = [
        [
          'title' => "Sản phẩm",
          'icon' => 'fa-chart-pie',
          'controller' => 'product',
          'action' => 'all',
          'children' => [
            [
              'title' => "Tất cả sản phẩm",
              'icon' => '',
              'controller' => 'product',
              'action' => 'all',
            ],
            [
              'title' => "Thêm mới",
              'icon' => '',
              'controller' => 'product',
              'action' => 'add',
            ]
          ]
        ],
        [
          'title' => "Danh mục",
          'icon' => 'fa-chart-pie',
          'controller' => 'category',
          'action' => 'all',
          'children' => [
            [
              'title' => "Tất cả",
              'icon' => '',
              'controller' => 'category',
              'action' => 'all',
            ],
            [
              'title' => "Thêm mới",
              'icon' => '',
              'controller' => 'category',
              'action' => 'add',
            ]
          ]
        ],
        [
          'title' => "Thông tin liên hệ",
          'icon' => 'fa-chart-pie',
          'controller' => 'contact',
          'action' => 'add',
          'children' => [
            [
              'title' => "Thêm",
              'icon' => '',
              'controller' => 'contact',
              'action' => 'add',
            ]
          ]
        ],
        [
          'title' => "Quản lý người dùng",
          'icon' => 'fa-chart-pie',
          'controller' => 'user',
          'action' => 'list',
          'children' => [
            [
              'title' => "Danh sách",
              'icon' => '',
              'controller' => 'user',
              'action' => 'list',
            ]
          ]
        ],
        [
          'title' => "Quản lý đơn hàng",
          'icon' => 'fa-chart-pie',
          'controller' => 'manage_order',
          'action' => 'index',
          'children' => [
            [
              'title' => "Danh sách",
              'icon' => '',
              'controller' => 'manage_order',
              'action' => 'index',
            ]
          ]
        ]
      ];
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
          foreach ($menu as $key) :
          ?>
            <li class="nav-item <?= isset($_GET['controller']) && $_GET['controller'] == $key['controller'] ? 'menu-is-opening menu-open' : '' ?>">
              <a href="/?controller=<?= $key['controller']; ?>&action=<?= $key['action']; ?>" class="nav-link <?= isset($_GET['controller']) && $_GET['controller'] == $key['controller'] ? 'active' : '' ?>">
                <i class="nav-icon fas <?= $key['icon'] ?>"></i>
                <p>
                  <?= $key['title']; ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php foreach ($key['children'] as $child) : ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/?controller=<?= $child['controller']; ?>&action=<?= $child['action']; ?>" class="nav-link <?= isset($_GET['controller']) && isset($_GET['action']) && $_GET['controller'] == $child['controller'] && $_GET['action'] == $child['action'] ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <?= $child['title']; ?>
                    </a>
                  </li>
                </ul>
              <?php endforeach; ?>
            </li>
          <?php
          endforeach;
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Sản Phẩm 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/?controller=product&action=all" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/?controller=product&action=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          
        </ul>
    </nav> -->