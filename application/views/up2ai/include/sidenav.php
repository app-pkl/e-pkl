  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('assets/'); ?>index3.html" class="brand-link">
          <img src="<?php echo base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-PKL</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
              <!-- Brand Logo -->
              <a href="assets/index3.html" class="brand-link">
                  <img src="<?php echo base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                  <span class="brand-text font-weight-light">E-PKL Polinela</span>
              </a>

              <!-- Sidebar -->
              <div class="sidebar">
                  <!-- Sidebar user (optional) -->
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      <div class="image">
                          <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                      </div>
                      <div class="info">
                          <a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
                      </div>
                  </div>

                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                          <li class="nav-item">
                              <a href="<?= base_url('mahasiswa/home') ?>" class="nav-link">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                  <p>
                                      Dashboard
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="<?= base_url('mahasiswa/pkl') ?>" class="nav-link">
                                  <i class="nav-icon fas fa-table"></i>
                                  <p>
                                      Data Perusahaan
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="<?= base_url('mahasiswa/mhs') ?>" class="nav-link">
                                  <i class="nav-icon fas fa-users"></i>
                                  <p>
                                      Data Pengajuan
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item has-treeview">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-tools"></i>
                                  <p>
                                      Setting
                                      <i class="fas fa-angle-left right"></i>
                                      <span class="badge badge-info right">Coming soon</span>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="../layout/top-nav.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Template</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="../layout/top-nav-sidebar.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Apps</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="nav-header">Auht User!</li>
                          <li class="nav-item">
                              <a href="<?= base_url('logout') ?>" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p class="text">Logout</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Lock Screen</p>
                              </a>
                          </li>
                      </ul>
                  </nav>
                  <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
          </aside>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->