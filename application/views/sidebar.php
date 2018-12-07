<div class="sidebar" data-image="<?= base_url() ?>assets/img/sidebar-5.jpg">
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="<?= base_url() ?>/Admin_controller" class="simple-text" >
        MANAGER
      </a>
      <span style="color: #1DC7EA; margin-left: 15%;">Welcome, <?= $name ?></span>
    </div>
    <ul class="nav">
      <li class="nav-item">
      <a class="nav-link" href="<?= base_url() ?>Admin_controller/load_QuanliNhaGa_View">
          <i class="nc-icon nc-bank"></i>
          <p>Quản lý nhà ga</p>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Admin_controller/load_QuanliTuyenTau_View">
          <i class="nc-icon nc-chart-pie-35"></i>
          <p>Quản lý tuyến</p>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Admin_controller/load_ChiTietHanhTrinh_View">
          <i class="nc-icon nc-bus-front-12"></i>
          <p>Quản lý hành trình</p>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Admin_controller/load_QuanliVe_View">
          <i class="nc-icon nc-paper-2"></i>
          <p>Quản lý - phát hành vé</p>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Admin_controller/load_QuanliKhachHang_View">
          <i class="nc-icon nc-circle-09"></i>
          <p>Quản lý khách hàng</p>
        </a>
      </li>

      <li class="show-sub-menu">
        <a class="nav-link dropdown-toggle" href="#abc" data-toggle="collapse">
          <i class="nc-icon nc-notes"></i>
          <p>Thống kê</p>   
        </a>

        <ul class="collapse" id="abc">
         <a class="nav-link dropdown-item" href="<?= base_url() ?>Admin_controller/load_TheoKeTheoNgay_View">
          <i class="nc-icon nc-notes"></i>
          <p>Theo ngày</p>   
        </a>
        <a class="nav-link dropdown-item" href="<?= base_url() ?>Admin_controller/load_ThongKeTheoThang_View">
          <i class="nc-icon nc-notes"></i>
          <p>Theo tháng</p>   
        </a>
        <a class="nav-link dropdown-item" href="<?= base_url() ?>Admin_controller/load_ThongKeTheoNam_View">
          <i class="nc-icon nc-notes"></i>
          <p>Theo năm</p>   
        </a>
      </ul>
    </li>
  </ul>
</div>
</div>