<?php
// echo "124";
require_once dirname(__FILE__) . '/common/header.php';

?>
<div class="container">
    <div class="log-in-container fullscreen screen-center-x screen-center-y flex">
        <div class="form-container">

            <form action="<?php echo FORM_ACTION ?>login/action.login.php" id="login">
                <div class="row">
                    <div class="mb-3 field-parent">
                        <label for="password" class="mb-1">Username *</label>
                        <input type="text" name="username" id="username" class="form-control form-field" required placeholder="Email Or Phone Number Or Employee Id Or Username">
                    </div>
                    <div class="mb-3 field-parent">
                        <label for="password" class="mb-1">Password *</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" class="form-control form-field password-field" required placeholder="*********************">
                            <div class="hide-show-pass">
                                <button type="button" class="btn btn-primary show-hide-pass"><i class="fas fa-eye-slash"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="field-parent">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input form-field" value="1">
                            <label for="remember"> Remember Me</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>


<?php
require_once dirname(__FILE__) . '/common/footer.php';
