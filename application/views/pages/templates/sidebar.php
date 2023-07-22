<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Data<span>Mhs</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Menu</li>
      <li class="nav-item">
        <a href="<?php echo base_url()?>" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url ('mahasiswa');?>" class="nav-link">
          <i class="link-icon" data-feather="smile"></i>
          <span class="link-title">Mahasiswa</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('dosen');?>" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Dosen</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('jadwal');?>" class="nav-link">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Jadwal Kuliah</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('fakultas');?>" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Fakultas</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('pengaturan');?>" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Pengaturan</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="dashboard.html" class="nav-link">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Logout</span>
        </a>
      </li>
  </div>
</nav>
<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted mb-2">Sidebar:</h6>
    <div class="mb-3 pb-3 border-bottom">
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
        <label class="form-check-label" for="sidebarLight">
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
        <label class="form-check-label" for="sidebarDark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Theme:</h6>
      <a class="theme-item active" href="dashboard.html">
        <img src="<?php echo base_url ('assets/images/screenshots/light.jpg');?>" alt="light theme">
      </a>
      <h6 class="text-muted mb-2">Dark Theme:</h6>
      <a class="theme-item" href="https://www.nobleui.com/html/template/demo2/dashboard.html">
        <img src="<?php echo base_url ('assets/images/screenshots/dark.jpg');?>" alt="light theme">
      </a>
    </div>
  </div>
</nav>