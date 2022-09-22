<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-2">Login</h3>

                <?php echo $this->session->flashdata('message')?>

                <!-- Sign In Form -->
                <form method="POST" action="<?php echo base_url('auth')?>">

                    <div   div class="form-floating mb-3 mt-2">
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email')?>">
                    <label for="floatingInput">Email</label>
                    <div class="mt-1 text-end"><small class="text-danger"><?php echo form_error('email')?></small></div>
                    </div>

                    <div   div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password">
                    <label for="floatingInput">Password</label>
                    <div class="mt-1 text-end"><small class="text-danger"><?php echo form_error('password')?></small></div>
                    </div>

                    <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                    <div class="text-center">
                    Don't have account? <a class="" href="<?php echo base_url('auth/registration')?>"> Registration here !</a>
                    </div>
                    </div>

                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
