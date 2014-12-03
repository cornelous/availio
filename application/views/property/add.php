<body id="page_bookings">
<!-- START WRAPPER -->
<div id="wrapper">

    <div id="verticalTab">

        <!-- START NAVIGATION -->
        <ul class="resp-tabs-list">

            <?php echo HTML::anchor('property/add', 'Add Property');?>

            <div id="menuu">
                <ul id="dropdown-menu" class="dropdown">
                    <li id="menuu-logo"><img src="<?php echo URL::base(); ?>media/images/menu-logo.png"></li>
                    <?php echo HTML::anchor('property', 'Properties');?>
                        <li class="">
                            <div id="Properties"></div>
                            <div id="menuuli">Properties</div>
                        </li>
                    </a>
                    <a href="#" title="Seasons">
                        <li class="">
                            <div id="Seasons"></div>
                            <div id="menuuli">Seasons</div>
                        </li>
                    </a>
                    <a href="#" title="Bookings">
                        <li class="active">
                            <div id="Bookings"></div>
                            <div id="menuuli">Bookings</div>
                        </li>
                    </a>
                    <a href="#" title="Booking States">
                        <li class="">
                            <div id="BookingStates"></div>
                            <div id="menuuli">Booking States</div>
                        </li>
                    </a>
                    <a href="#" title="Create Calendar Link">
                        <li class="">
                            <div id="CreateCalendarLink"></div>
                            <div id="menuuli">Create Calendar Link</div>
                        </li>
                    </a>
                </ul>

                <ul id="menuu_icons">
                    <?php echo HTML::anchor('logout', 'Logout');?>
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



</div>

<div class="clear"></div>

</div>
<!-- END WRAPPER -->
</body>