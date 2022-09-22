<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Registration</h3>

                <!-- Sign In Form -->
                <form method="POST" action="<?php echo base_url('auth/registration')?>">

                    <div class="form-floating mb-3">
                    <input type="name" class="form-control" name="name" value="<?php echo set_value('name')?>">
                    <label for="floatingInput">Fullname</label>
                    <div class="mt-1 text-end"><small class="text-danger"><?php echo form_error('name')?></small></div>
                    </div>

                    <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email')?>">
                    <label for="floatingInput">Email</label>
                    <div class="mt-1 text-end"><small class="text-danger"><?php echo form_error('email')?></small></div>
                    </div>

                    <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password1">
                    <label for="floatingInput">Password</label>
                    <div class="mt-1 text-end"><small class="text-danger"><?php echo form_error('password1')?></small></div>
                    </div>

                    <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password2">
                    <label for="floatingInput">Confirm Password</label>
                    </div>

                    <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign Up</button>
                    <div class="text-center">
                    Allready have account?<a class="small" href="<?php echo base_url('auth')?>"> Login here !</a>
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
