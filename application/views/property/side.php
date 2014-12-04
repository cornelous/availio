<body id="page_bookings">
<!-- START WRAPPER -->
<div id="wrapper">

    <div id="verticalTab">

        <!-- START NAVIGATION -->
        <ul class="resp-tabs-list">

            <div id="menuu">
                <ul id="dropdown-menu" class="dropdown">
                    <li id="menuu-logo"><img src="<?php echo URL::base(); ?>media/images/menu-logo.png"></li>
                    <a href="#" title="Search">
                        <li class="">
                            <div id="Seasons"></div>
                            <div id="menuuli">Search</div>
                        </li>
                    </a>
                    <a href="#" title="Properties">
                        <li class="">
                            <div id="Properties"></div>
                            <div id="menuuli">Properties</div>
                        </li>
                    </a>
                    <a href="#" title="Bookings">
                        <li class="active">
                            <div id="Bookings"></div>
                            <div id="menuuli">Bookings</div>
                        </li>
                    </a>
                </ul>
                <ul id="menuu_icons">
                    <a href="#" title="Logout">
                        <li>
                            <div id="Logout"></div>
                            <div id="menuuli">Logout</div>
                        </li>
                    </a>
                </ul>

                <div class="clear"></div>
            </div>

        </ul>
        <!-- END NAVIGATION -->

        <?php echo $viewlet ?>

</div>

<div class="clear"></div>

</div>
<!-- END WRAPPER -->
</body>