<!-- Mirrored from www.nobleui.com/html/template/demo1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jun 2023 11:55:23 GMT -->
<?php include_once('header.php') ?>

<body>
  <div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <?php include_once('sidebar.php') ?>
    <!-- partial -->

    <div class="page-wrapper">

      <div class="page-content">

      <?php
      if ($view) {
        $this->load->view($view);
      }else {
        $this->load->view('pages/templates/menu/dashboard');
      }
      ?>
      <!-- partial:partials/_footer.html -->
      <?php include_once('footer.php') ?>

      <!-- partial -->

    </div>
  </div>

  <!-- core:js -->
  <script src="<?php echo base_url('assets/vendors/core/core.js'); ?>"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="<?php echo base_url('assets/vendors/flatpickr/flatpickr.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendors/apexcharts/apexcharts.min.js'); ?>"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="<?php echo base_url('assets/vendors/feather-icons/feather.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/template.js'); ?>"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="<?php echo base_url('assets/js/dashboard-light.js'); ?>"></script>
  <!-- End custom js for this page -->
  
    <?php 
    if(isset($script) && $script){
      $this->load->view($script);
    }
    ?>
  
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jun 2023 11:55:43 GMT -->

</html>