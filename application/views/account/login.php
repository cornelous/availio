<table id="login">
    <tr>
        <th>Login</th>
        <img src="<?php echo url::base(); ?>media/images/login-logo.png" alt="<?php echo $site_name; ?>" />
        <th></th>
    </tr>
            <?php echo Form::open(); ?>
            <tr>
                <td>
                    <?php echo Form::label('username', 'Username')?>
                    <?php echo Form::input('username'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo Form::label('password', 'Password')?>
                    <?php echo Form::password('password'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="btn" value="Login" style="width:100px;" tabindex="4">&nbsp;&nbsp;
                    <?php echo Form::submit('submit', 'Login'); ?>
                </td>
            </tr>

            <?php if ($errors) : ?>
                <tr>
                    <td class="errors">
                        <?php echo "You have supplied invalid logins. Please try again." ?>
                    </td>
                </tr>

            <?php endif ?>

            <?php echo Form::close(); ?>
</table>



