<?php
session_start();

//	general config
$the_file="../ac-config.inc.php";
if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
else		require_once($the_file);

//	db connection
$the_file=AC_INLCUDES_ROOT."db_connect.inc.php";
if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
else		require_once($the_file);

//	common vars (db and lang)
$the_file=AC_INLCUDES_ROOT."common.inc.php";
if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
else		require_once($the_file);
	
	
//	calendar functions
$the_file=AC_INLCUDES_ROOT."functions.inc.php";
if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
else		require_once($the_file);

//	admin functions
$the_file=AC_INLCUDES_ROOT."functions-admin.inc.php";
if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
else		require_once($the_file);

//	define language
if(isset($_SESSION["admin_lang"]))	define("AC_LANG", $_SESSION["admin_lang"]);
else 								define("AC_LANG", AC_DEFAULT_AC_LANG);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registration</title>
		
		<link rel="stylesheet" href="<?php echo AC_DIR_CSS; ?>reset.css">
		<link rel="stylesheet" href="css/admin-calendar.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/mootools-roar.css">
		<link rel="stylesheet" type="text/css" media="screen" href="js/formcheck/theme/classic/formcheck.css"  />
                
		<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
                
		<script type="text/javascript" src="<?php echo AC_DIR_JS; ?>mootools-core-1.3.2-full-compat-yc.js"></script>
		<script type="text/javascript" src="<?php echo AC_DIR_JS; ?>mootools-more-1.3.2.1.js"></script>
		<script type="text/javascript" src="js/formcheck/lang/<?php echo AC_LANG; ?>.js"></script>
		<script type="text/javascript" src="js/mootools-formcheck.js"></script>
		<script type="text/javascript" src="js/mootools-roar.js"></script>
		<?php echo $xtra_js_files; ?>
		
		<script type="text/javascript">
		<?php echo $xtra_js; ?>
		var txtWarning = '<?php echo $lang["msg_warning"]; ?>';
		var txtOrderUpdateOK = '<?php echo $lang["msg_order_update_OK"]; ?>';
		var txtOrderUpdateKO = '<?php echo $lang["msg_order_update_KO"]; ?>';
		var txtStateModOK = '<?php echo $lang["msg_state_mod_OK"]; ?>';
		var txtStateModKO = '<?php echo $lang["msg_state_mod_KO"]; ?>';
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
							url:'<?php echo AC_DIR_AJAX; ?>list_order.ajax.php',
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
			<?php
			echo $xtra_moo;
			?>
		});
		</script>
	</head>
	<body id="page_<?php echo ADMIN_PAGE; ?>">
	<div id="wrapper">
<!--		<div id="header">
			<?php echo LOGO_CALENDAR_ADMIN; ?>
			<div id="version"></div>
		</div>-->
		<?php echo $admin_menu; ?>
		<?php echo $this_title; ?>
		
		<div id="contents">
                    <div id="login">
                      <div id="login-logo"><img src="images/login-logo.png"></div>
                        <div class="inner">
                                <form method="POST" action="#" id="regForm">
                                    <table id="tlogin">
                                            <tr>
                                                    <td><input placeholder="Username" type="text" name="username" value="" tabindex="1"></td>
                                            </tr>
                                            <tr>
                                                    <td><input placeholder="Email Address" type="text" name="email" value="" tabindex="1"></td>
                                            </tr>
                                            <tr>
                                                    <td><input placeholder="Password" type="password" name="password" value="" tabindex="2"></td>
                                            </tr>
                                            <tr>                                                   
                                                <td>
                                                   <input id="btn" type="submit" name="submit" value="Register" style="width:100px;" tabindex="4">  
                                                   <a href="index.php"><input id="btn"  name="submit" value="Login" style="width:50px;padding:11px;cursor:pointer;" tabindex="4"></a>
                                                </td>
                                            </tr>
                                            
                                    </table>
                                </form>
                        </div>
                    </div>

		</div>

		<div class="clear"></div>
		
	</div>
	</body>
</html>

<script  type="text/javascript">
    var frmvalidator = new Validator("regForm");

    frmvalidator.addValidation("username","req","Username can not be Empty");
    frmvalidator.addValidation("email","req","Please enter your Email Address");
    frmvalidator.addValidation("email","email","Not a valid Email Address");
    frmvalidator.addValidation("password","req","Password can not be Empty");

</script>
<?php
 if (isset($_POST['submit'])) {
     

$user = $_POST['username'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$state = 1;

date_default_timezone_set('Africa/Johannesburg');
$date_visit = date('Y-m-d H:i:s', time());

$level = 2;

//CHECKING IF EMAIL EXIST IN DATABASE
$check_query = "SELECT email FROM bookings_admin_users WHERE email='".$email."' ";
$check_result = mysql_query($check_query);  

if(mysql_num_rows($check_result) > 0){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('You have already register with this email address!!!')
				</SCRIPT>");
	}else{

		$reg_query = "INSERT INTO bookings_admin_users ( level, username, password, state, date_visit, email ) VALUES 
				  ('$level','$user','$pass', '$state','$date_visit','$email')";
		$reg_result = mysql_query($reg_query);

		 echo ("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('You Have been Registerd, You can now login!')
						window.location.href='index.php'
				</SCRIPT>");
	}


 }
 
 
 
?>