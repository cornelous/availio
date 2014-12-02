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

    <script type="text/javascript" src="ac-includes/js/mootools-core-1.3.2-full-compat-yc.js"></script>
    <script type="text/javascript" src="ac-includes/js/mootools-more-1.3.2.1.js"></script>
    <script type="text/javascript" src="js/formcheck/lang/en.js"></script>
    <script type="text/javascript" src="js/mootools-formcheck.js"></script>
    <script type="text/javascript" src="js/mootools-roar.js"></script>

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

    <script type="text/javascript">
        var txtWarning = 'Information:';
        var txtOrderUpdateOK = 'Item Order modified';
        var txtOrderUpdateKO = 'Unable to modify Item Order';
        var txtStateModOK = 'Item State modified';
        var txtStateModKO = 'Unable to modify Item State';
        window.addEvent('domready', function() {
            var the_menu=$$('#menu li').setStyle("cursor","pointer");
            the_menu.addEvents({
                'mouseover': function(){
                    var bg_color=this.getStyle("backgroundColor");
                    this.highlight('#99ccff',bg_color);
                },
                'click': function(){
                    document.location.href=this.getChildren().get('href');
                }
            });
            //	roar alerts
            var roar = new Roar({position: 'lowerRight',duration:'5000'});

            //	zebra
            $$('tbody tr:odd').addClass('odd');

            //	create sortables
            //	sortables
            if(document.id('sortable')){
                // row handles
                $$('.handles').setStyle('cursor','pointer').addEvent('mouseover',function(event){
                    this.getParent().highlight();
                });

                var tblSortable=document.id('sortable');
                var sb = new Sortables('.list tbody', {
                    handle: '.handles',
                    clone: false,
                    revert: true,
                    constrain:true,
                    onStart: function(el) {
                        el.setStyle('background','#99ccff');
                    },
                    onComplete: function(el) {
                        el.setStyle('background','#99CCFF');
                        var sort_order = '';
                        $$('.list tbody tr').each(function(tr) { sort_order = sort_order +  tr.get('alt')  + '|'; });
                        $('sort_order').value = sort_order;
                        var order_field=tblSortable.get('field');
                        var order_table=tblSortable.get('table');
                        var req = new Request({
                            url:'/ac-includes/ajax/list_order.ajax.php',
                            method:'get',
                            autoCancel:true,
                            data: {'sort_order':sort_order,'type':order_table,'order_field':order_field},
                            onRequest: function() {
                                //roar.alert('Order','Updating the sort order in the database.');
                            },
                            onSuccess: function() {
                                roar.alert(''+txtWarning+' ',''+txtOrderUpdateOK+'');
                            }
                        }).send();
                    }
                });
            }
            //update states
            var states=$$('.update_state').setStyle('cursor','pointer').addEvent('click',function(){
                //	define vars
                var el=$(this.id);
                var icon_states=new Array('<img src="icons/icon_cross.png">','<img src="icons/icon_tick.png">');
                var txtWarningOK=txtStateModOK;
                var txtWarningKO=txtStateModKO;
                var imgLoading='<img src=\"icons/ajax-loader.gif\">';
                //	ajax call to change state
                var myHTMLRequest = new Request({
                    url:'../ac-includes/ajax/update-state.ajax.php',
                    method:'post',
                    async:false,
                    data: {
                        'type':this.get('rel'),
                        'cur_state':this.get('state'),
                        'id_item':this.id.replace('state_',''),
                        'field':this.get('field')
                    },
                    onRequest: function() {
                        el.set('html',imgLoading);
                    },
                    onComplete: function(responseText) {
                        var newState=responseText;
                        if(newState=='KO'){
                            Sexy.alert(txtWarningKO);
                        }else{
                            el.set('state',newState);
                            el.set('html',icon_states[newState]);
                            roar.alert('State',txtWarningOK);
                        }
                    }
                }).send();
            });
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
<body id="page_admin-login">
<!-- START WRAPPER -->
<div id="wrapper">

    <!-- START LOGIN -->
    <div id="login">

        <!-- START LOGIN-LOGO -->
        <div id="login-logo"><img src="images/login-logo.png"></div>
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
</html>