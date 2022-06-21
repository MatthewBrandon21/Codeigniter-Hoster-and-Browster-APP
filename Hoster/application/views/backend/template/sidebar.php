<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url().'backend/dashboard/index'; ?>" class="brand-link">
      <span class="brand-text font-weight-normal" style="padding-left: 20px;">       <b>Hoster!</b> Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().'assets/img/admin-user.png'; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url().'backend/dashboard/index'; ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">TRANSACTION</li>

          <li class="nav-item">
            <a href="<?php echo base_url().'backend/dashboard/booking'; ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hotel Booking
              </p>
            </a>
          </li>

          <li class="nav-header">DATA MASTER</li>

          <li class="nav-item">
            <a href="<?php echo base_url().'backend/dashboard/hotel'; ?>" class="nav-link">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Hotel
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'backend/dashboard/user'; ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <hr class="sidebar-divider">
          <hr class="sidebar-divider">
          <li class="nav-item">
            <a href="<?php echo base_url().'backend/dashboard/ganti_password'; ?>" class="nav-link">
              <i class="nav-icon fas fa-unlock-alt "></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>