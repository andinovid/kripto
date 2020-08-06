<div class="layout-login-centered-boxed__form">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">
        <a href="<?php echo site_url(); ?>" class="navbar-brand text-center mb-2 mr-0" style="min-width: 0">
            <!-- LOGO -->
            <img src="<?php echo base_url() . 'uploads/system/logo-dark.png'; ?>" />
        </a>
    </div>
    <div class="card card-body">
        <!--
        <div class="alert alert-soft-success d-flex" role="alert">
            <i class="material-icons mr-3">check_circle</i>
            <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
        </div>
        
        <a href="" class="btn btn-light btn-block">
            <span class="mr-2">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48" class="abcRioButtonSvg">
                    <g>
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                        <path fill="none" d="M0 0h48v48H0z"></path>
                    </g>
                </svg>
            </span> Continue with Google
        </a>

        <div class="page-separator">
            <div class="page-separator__text">or</div>
        </div>
-->
        <?php echo $this->session->userdata('is_instructor'); ?>
        <div class="login-form">
            <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post">
                <div class="form-group">
                    <label class="text-label" for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input type="email" class="form-control" name="email" id="login-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="password" placeholder="<?php echo site_phrase('password'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-purple" type="submit">Login</button>
                </div>
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked="" id="remember">
                        <label class="custom-control-label" for="remember">Remember me</label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <a href="javascript::" onclick="toggoleForm('forgot_password')">Forgot password?</a> <br> Don't have an account? <a class="text-body text-underline" href="javascript::" onclick="toggoleForm('registration')">Sign up!</a>
                </div>
            </form>
        </div>
        <div class="forgot-password-form hidden">
            <form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post">

                <div class="form-group">
                    <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> <?php echo site_phrase('email'); ?>:</label>
                    <input type="email" class="form-control" name="email" id="forgot-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required>
                    <small class="form-text text-muted"><?php echo site_phrase('provide_your_email_address_to_get_password'); ?>.</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-purple"><?php echo site_phrase('reset_password'); ?></button>
                </div>
                <div class="forgot-pass text-center">
                    <?php echo site_phrase('want_to_go_back'); ?>? <a href="javascript::" onclick="toggoleForm('login')"><?php echo site_phrase('login'); ?></a>
                </div>
            </form>
        </div>
        <div class="user-dashboard-content w-100 register-form hidden">
            <form action="<?php echo site_url('login/register'); ?>" method="post">

                <div class="form-group">
                    <label for="first_name" class="text-label"><?php echo site_phrase('first_name'); ?>:</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control form-control-prepended" name="first_name" id="first_name" placeholder="<?php echo site_phrase('first_name'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name" class="text-label"><?php echo site_phrase('last_name'); ?>:</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo site_phrase('last_name'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="registration-email" class="text-label"> <?php echo site_phrase('email'); ?>:</label>
                    <div class="input-group input-group-merge">
                        <input type="email" class="form-control" name="email" id="registration-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="registration-password" class="text-label"><?php echo site_phrase('password'); ?>:</label>

                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="password" id="registration-password" placeholder="<?php echo site_phrase('password'); ?>" value="" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-purple"><?php echo site_phrase('sign_up'); ?></button>
                </div>
                <div class="account-have text-center">
                    <?php echo site_phrase('already_have_an_account'); ?>? <a href="javascript::" onclick="toggoleForm('login')"><?php echo site_phrase('login'); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function toggoleForm(form_type) {
        if (form_type === 'login') {
            $('.login-form').show();
            $('.forgot-password-form').hide();
            $('.register-form').hide();
        } else if (form_type === 'registration') {
            $('.login-form').hide();
            $('.forgot-password-form').hide();
            $('.register-form').show();
        } else if (form_type === 'forgot_password') {
            $('.login-form').hide();
            $('.forgot-password-form').show();
            $('.register-form').hide();
        }
    }
</script>