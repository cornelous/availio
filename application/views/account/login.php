<body id="page_admin-login">
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
            <form method="post" action="">

                <table id="tlogin">
                    <tr>
                        <td>
                            <input type="text" placeholder="Name:" name="username" value="" tabindex="1">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" placeholder="Password:" name="password" value="" tabindex="2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select style="display:none;" name="lang" class="select" tabindex="3"></select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" id="btn" value="Login" style="width:100px;" tabindex="4">&nbsp;&nbsp;

                            <a href="#">Register</a>

                            &nbsp;&nbsp;<span style="color:#6d6e71;">|</span>&nbsp;&nbsp;

                            <a href="#">Forgot Password ??</a>
                        </td>
                    </tr>
                </table>

            </form>
            <!-- END LOGIN FORM -->

        </div>
        <!-- END INNER -->

    </div>
    <!-- END LOGIN -->

    <div class="clear"></div>

</div>
<!-- END WRAPPER -->
</body>