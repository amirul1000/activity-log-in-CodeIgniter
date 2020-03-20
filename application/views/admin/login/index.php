<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Waveney Taxis – Office & Driver Online Diary</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/logo.svg">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <?=$msg?>
                <?php echo form_open_multipart('admin/login/login_process',array("class"=>"pt-3")); ?>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email"
												id="email"
												value="<?php echo ($this->input->post('email') ? $this->input->post('email') : ''); ?>" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password"
												id="password"
												value="<?php echo ($this->input->post('password') ? $this->input->post('password') : ''); ?>" placeholder="Password" required>
                  </div>
                 <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="digit_code" id="digit_code" value="<?php echo ($this->input->post('digit_code') ? $this->input->post('digit_code') : ''); ?>" placeholder="Enter 4 Digit Code" required>
                  </div>	
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-gradient-warning btn-fw btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="<?php echo site_url(); ?>/admin/login/forget_password" class="auth-link text-black">Forgot password?</a>
                  </div>
                  
                 <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>