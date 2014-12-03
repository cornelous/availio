<!-- START WRAPPER -->
<div id="wrapper">
    <!-- START LOGIN -->
    <div id="login">
        <!-- START LOGIN-LOGO -->
        <div id="login-logo"><img src="<?php echo url::base(); ?>media/images/login-logo.png" alt="<?php echo $site_name; ?>" /></div>
        <!-- END LOGIN-LOGO -->
        <!-- START INNER -->
        <div class="inner">
            <!-- START LOGIN FORM -->
            <?php echo Form::open(); ?>
                <table id="tlogin">
                    <tr>
                        <td>
                            <?php $usernameattributes = array('placeholder'=>'Name:', 'tabindex'=>'1'); ?>
                            <?php echo Form::input('username', '', $usernameattributes); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php $passwordattributes = array('placeholder'=>'Password:', 'tabindex'=>'2'); ?>
                            <?php echo Form::password('password', '',$passwordattributes); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select style="display:none;" name="lang" class="select" tabindex="3"></select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php $submitattributes = array('type' => 'submit', 'id'=>'btn', 'style'=>'width:100px', 'tabindex'=>'4'); ?>
                            <?php echo Form::input('submit', 'Login', $submitattributes); ?>&nbsp;&nbsp;
                            <?php echo HTML::anchor('register', 'Register');?>
                            &nbsp;&nbsp;<span style="color:#6d6e71;">|</span>&nbsp;&nbsp;
                            <?php echo HTML::anchor('forgotpassword', 'Forgot Password ??');?>
                        </td>
                    </tr>
                </table>
            <?php if ($errors) : ?>
                <tr>
                    <td class="errors">
                        <?php echo "You have supplied invalid logins. Please try again." ?>
                    </td>
                </tr>
            <?php endif ?>
            <?php echo Form::close(); ?>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END INNER -->
    </div>
    <!-- END LOGIN -->
    <div class="clear"></div>
</div>
<!-- END WRAPPER -->
