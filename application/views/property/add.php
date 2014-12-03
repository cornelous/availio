<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Availability Calendar - Administration</title>

    <link rel="stylesheet" href="ac-contents/themes/default/css/reset.css">
    <link rel="stylesheet" href="css/admin-calendar.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/mootools-roar.css">
    <link rel="stylesheet" type="text/css" media="screen" href="js/formcheck/theme/classic/formcheck.css"  />
    <link rel="stylesheet" href="css/admin-pages.css">

    <script type="text/javascript" src="ac-includes/js/mootools-core-1.3.2-full-compat-yc.js"></script>
    <script type="text/javascript" src="ac-includes/js/mootools-more-1.3.2.1.js"></script>
    <script type="text/javascript" src="js/formcheck/lang/en.js"></script>
    <script type="text/javascript" src="js/mootools-formcheck.js"></script>
    <script type="text/javascript" src="js/mootools-roar.js"></script>
    <script type="text/javascript" src="js/mootools-cal-admin.js"></script>

    <!--DATE PICKER-->
    <script type="text/javascript" src="js/datepicker/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/datepicker/jquery-ui-1.10.1.min.js"></script>
    <link rel="stylesheet" href="css/nigran.datepicker.css">
    <link rel="stylesheet" href="css/jquery-ui-1.10.1.css" >

    <script>
        $(function() {
            $( "#date-picker-input-1" ).datepicker({
                inline: true,
                dateFormat: 'yy-mm-dd',
                showOtherMonths: true,
                showOn: 'both',
                buttonImage: 'css/images/cal_logo.png'
            })

            $( "#date-picker-input-2" ).datepicker({
                inline: true,
                dateFormat: 'yy-mm-dd',
                showOtherMonths: true,
                showOn: 'both',
                buttonImage: 'css/images/cal_logo.png'
            })

                .datepicker('widget').wrap('<div class="ll-skin-nigran"/>');
        });
    </script>

    <link type="text/css" rel="stylesheet" href="css/tabs/easy-responsive-tabs.css" />
    <script src="js/tabs/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true,   // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);

                    $name.text($tab.text());

                    $info.show();
                }
            });

            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });
    </script>

</head>
<body id="page_bookings">
<!-- START WRAPPER -->
<div id="wrapper">

    <div id="verticalTab">

        <!-- START NAVIGATION -->
        <ul class="resp-tabs-list">

            <div id="menuu">
                <ul id="dropdown-menu" class="dropdown">
                    <li id="menuu-logo"><img src="images/menu-logo.png"></li>
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
                    <div class="float_l"><h1>Bookings - Add</h1></div>
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
                            <td class="side">Season Start Date</td>
                            <td><input style="width:250px;" type="text" Placeholder="From Date" id="date-picker-input-1" class="my_date" name="from_date" ></td>
                        </tr>
                        <tr>
                            <td class="side">Season End Date</td>
                            <td><input style="width:250px;" type="text" Placeholder="To Date" id="date-picker-input-2" class="my_date" name="to_date" ></td>
                        </tr>
                        <tr>
                            <td class="side">Price</td>
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
</html>