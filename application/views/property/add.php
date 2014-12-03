<body id="page_bookings">
<!-- START WRAPPER -->
<div id="wrapper">

    <div id="verticalTab">

        <!-- START NAVIGATION -->
        <ul class="resp-tabs-list">

            <div id="menuu">
                <ul id="dropdown-menu" class="dropdown">
                    <li id="menuu-logo"><img src="<?php echo URL::base(); ?>media/images/menu-logo.png"></li>
                    <a href="#" title="Properties">
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
                    <a href="#" title="Calendar Configuration">
                        <li>
                            <div id="CalendarConfiguration"></div>
                            <div id="menuuli">Calendar Configuration</div>
                        </li>
                    </a>
                    <a href="#" title="Admin Users">
                        <li>
                            <div id="AdminUsers"></div>
                            <div id="menuuli">Admin Users</div>
                        </li>
                    </a>
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

        <!-- START CONTENT -->
        <div class="resp-tabs-container">
            <div id="contents">

                <div id="title">
                    <div class="float_l"><h1>Properties - Add</h1></div>
                    <div class="clear"></div>
                </div>

                <!-- START ADD FORM -->
                <form method="post" action="" id="item_form">
                    <table>
                        <tr>
                            <td class="side">Apartment</td>
                            <td><select class="select" name="apartment">
                                    <option   value="65">Braemar </option>
                                    <option   value="67">Grimsby</option>
                                    <option   value="66">Neptune Isle 09</option>
                                    <option   value="64">Sunset Beach Villa</option>
                                    <option   value="62">test</option>
                                    <option   value="63">The Nelson Villa</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="side">External ID</td>
                            <td><input style="width:250px;" type="text" Placeholder="ID from API" id="date-picker-input-1" class="my_date" name="from_date" ></td>
                        </tr>
                        <tr>
                            <td class="side">Avail ID</td>
                            <td><input style="width:250px;" type="text" Placeholder="Availio ID" id="date-picker-input-2" class="my_date" name="to_date" ></td>
                        </tr>
                        <tr>
                            <td class="side">Property Name</td>
                            <td><input type="text" name="price" placeholder="Enter the price only. Ex: 1200" style="width:250px;"></td>
                        </tr>
                        <tr>
                            <td class="side">Property Type</td>
                            <td><input type="text" name="price" placeholder="Enter the price only. Ex: 1200" style="width:250px;"></td>
                        </tr>
                    </table>

                    <input type="submit" name="submit" value="Save">

                </form>
                <!-- END ADD FORM -->

                <div class="clear"></div>

            </div>

        </div>

    </div>

</div>

</div>

<!-- END CONTENT -->

</div>

<div class="clear"></div>

</div>
<!-- END WRAPPER -->
</body>