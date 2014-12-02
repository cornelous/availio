<?php
//	MENU WILL BECOME DB BASED - TO DO
$menu=array();

//	Main ADMIN level
$menu[1]["local"]["items"]		= array('href'=>'','txt'=>''.$lang["admin_items"].'','icon'=>'');
$menu[1]["local"]["seasons"]	= array('href'=>'','txt'=>''.$lang["seasons"].'','icon'=>'');
$menu[1]["local"]["bookings"]	= array('href'=>'','txt'=>''.$lang["admin_bookings"].'','icon'=>'');
$menu[1]["local"]["states"]	= array('href'=>'','txt'=>''.$lang["admin_states"].'','icon'=>'');
//$menu[1]["local"]["see_web"]		= array('href'=>''.AC_CALENDAR_PUBLIC.'','txt'=>''.$lang["see_web"].'','icon'=>'');
//$menu[1]["local"]["view_calendar"]		= array('href'=>'','txt'=>''.$lang["see_web"].'','icon'=>'');
$menu[1]["local"]["create_view"]	= array('href'=>'','txt'=>''.$lang["create_cal_view"].'','icon'=>'');
//$menu[1]["local"]["languages"]	=	array('txt'=>''.$lang["admin_languages"].'');

//	icons
$menu[1]["common"]["config"]		= array('href'=>'','txt'=>''.$lang["admin_config"].'','icon'=>'');
$menu[1]["common"]["admin_users"]	= array('href'=>'','txt'=>''.$lang["admin_admin_users"].'','icon'=>'');
$menu[1]["common"]["logout"]		= array('href'=>'admin-logout.php','txt'=>''.$lang["logout"].'','icon'=>'');


//	USER menu
$menu[2]["local"]["items"]		= array('href'=>'','txt'=>''.$lang["admin_items"].'','icon'=>'');
$menu[2]["local"]["seasons"]	= array('href'=>'','txt'=>''.$lang["seasons"].'','icon'=>'');
$menu[2]["local"]["bookings"]	= array('href'=>'','txt'=>''.$lang["admin_bookings"].'','icon'=>'');
//$menu[2]["local"]["see_web"]		= array('href'=>''.AC_CALENDAR_PUBLIC.'','txt'=>''.$lang["see_web"].'','icon'=>'');
//$menu[2]["local"]["view_calendar"]		= array('href'=>'','txt'=>''.$lang["see_web"].'','icon'=>'');
$menu[2]["local"]["create_view"]	= array('href'=>'','txt'=>''.$lang["create_cal_view"].'','icon'=>'');

//	icons
//$menu[2]["common"]["profile"]		= array('href'=>'','txt'=>''.$lang["admin_profile"].'','icon'=>'<img src="icons/icon_user.png" alt="user">');
//$menu[2]["common"]["see_web"]		= array('href'=>''.AC_CALENDAR_PUBLIC.'','txt'=>''.$lang["see_web"].'','icon'=>'<img src="icons/icon_calendar.png" alt="web">');
$menu[2]["common"]["logout"]		= array('href'=>'admin-logout.php','txt'=>''.$lang["logout"].'','icon'=>'');


//	create menu
$admin_menu='
<div id="menuu">
	<ul id="dropdown-menu" class="dropdown">
	<li id="menuu-logo"><img src="images/menu-logo.png"></li>
		';
		foreach($menu[$_SESSION["admin_level"]]["local"] AS $type=>$data){
			//	reset values
			$admin_menu_sub		="";
			$admin_main_class	="";
			$main_href_close 	="</a>";
			
			//	 define main link href - will be overridden if we have a submenu
			if($data["href"]!="") 	$main_href='<a href="'.$data["href"].'" title="'.$data["txt"].'">';
			else 					$main_href='<a href="?page='.$type.'" title="'.$data["txt"].'">';
			
			//	define link text or icon
			if($data["icon"]!="")	$the_link=$data["icon"];
			else 					$the_link=$data["txt"];
			
			
			if(ADMIN_PAGE=="".$type.""){
				$admin_main_class.=' active"';
				$page_title=$data["txt"];
			}
			
			$admin_menu.= $main_href.'
			<li class="'.$admin_main_class.'"><div id="'.str_replace(' ', '', $data["txt"]).'"></div><div id="menuuli">'.$the_link
				.$admin_menu_sub.'
			</div></li>'.$main_href_close;
			
		}
		$admin_menu.='
	</ul>
	<ul id="menuu_icons">
		';
                
		foreach($menu[$_SESSION["admin_level"]]["common"] AS $type=>$data){        
			if($data["href"]!="") 	$href=$data["href"];
			else 					$href='?page='.$type;
			
			if($data["icon"]!="")	$the_link=$data["icon"];
			else 					$the_link=$data["txt"];
			
			$admin_menu.='
			<a href="'.$href.'" title="'.$data["txt"].'"><li '; 
			if(ADMIN_PAGE=="".$type."") $admin_menu.='class="active"'; 
			$admin_menu.='><div id="'.str_replace(' ', '', $data["txt"]).'"></div><div id="menuuli">'.$the_link.'</div></li></a>';

                }
              
                
		$admin_menu.='
		</ul>
	<div class="clear"></div>
</div>
';
?>