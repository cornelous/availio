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
                        <?php echo Form::input('username'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo Form::password('password'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select style="display:none;" name="lang" class="select" tabindex="3"></select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo Form::submit('submit', 'Login'); ?>

                        <a href="#">Register</a>

                        &nbsp;&nbsp;<span style="color:#6d6e71;">|</span>&nbsp;&nbsp;

                        <a href="#">Forgot Password ??</a>
                    </td>
                </tr>
            </table>

            <?php echo Form::close(); ?>
            <!-- END LOGIN FORM -->

        </div>
        <!-- END INNER -->

    </div>
    <!-- END LOGIN -->

    <div class="clear"></div>

</div>
<!-- END WRAPPER -->
