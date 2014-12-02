<?php
$page_title=$lang["".PAGE."_title"];
$contents.="login";
if(isset($_POST["username"])){
	//	check login details
	//if OK, set session vars and reload page
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$sql="SELECT id,username,level FROM ".T_BOOKINGS_ADMIN." WHERE username='".mysql_real_escape_string($username)."' AND password='".md5(mysql_real_escape_string($password))."' AND state=1";
	$res=mysql_query($sql) or die("Error checking admin user<br>".mysql_Error());
	if(mysql_num_rows($res)==0){
		$warning="User not valid";
	}else{
		$row=mysql_fetch_assoc($res);
		$_SESSION["admin_id"]	=	$row["id"];
		$_SESSION["admin_name"]	=	$row["username"];
		$_SESSION["admin_lang"]	=	$_POST["lang"];
		$_SESSION["admin_level"]=	$row["level"];
		//	update table with visit
		$update="UPDATE ".T_BOOKINGS_ADMIN." SET date_visit=now(), visits=visits+1 WHERE id=".$row["id"]." LIMIT 1";
		mysql_query($update) or die("error updating user visit stats");
		
		header("Location:index.php");
	}
}else{
	$username = "";
	$password = "";
}


//	define login form
$contents=' 
<div id="login">
	<div id="login-logo"><img src="images/login-logo.png"></div>
	<div class="inner">
		<form method="post" action="index.php">
		<table id="tlogin">
			<tr>
				<td><input type="text" placeholder="Name:" name="username" value="'.$username.'" tabindex="1"></td>
			</tr>
			<tr>
				<td><input type="password" placeholder="Password:" name="password" value="'.$password.'" tabindex="2"></td>
			</tr>
			<tr>
				
				<td>
					<select style="display:none;" name="lang" class="select" tabindex="3">
						'.$list_languages_config.'
					</select>
					
				</td>
			</tr>
			<tr>
					<td>
						<input type="submit" id="btn" value="Login" style="width:100px;" tabindex="4">&nbsp;&nbsp;
						
						<a href="admin-registration.admin.php">Register</a>
						
						&nbsp;&nbsp;<span style="color:#6d6e71;">|</span>&nbsp;&nbsp;
						
						<a href="admin-forgot-password.php">Forgot Password ??</a>
					</td>
			</tr>
		</table>
		</form>
	</div>
</div>
';


?>