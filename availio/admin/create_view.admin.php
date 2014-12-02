
<?php
	session_start();
	
	$the_file="../ac-includes/cal.inc.php";
	if(!file_exists($the_file)) die("<b>".$the_file."</b> not found");
	else		
	require_once($the_file);
	
	if ($_SESSION['admin_id'] == 1){
		$items_sql="SELECT * FROM bookings_items WHERE state=1 ORDER BY list_order";     
	}else{
		$items_sql="SELECT * FROM bookings_items WHERE id_user='".$_SESSION['admin_id']."' ORDER BY list_order";     
	}
          
	$items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
	
	$contents.='<form method="POST" action="#" id="item_form">';
	$contents.='Property:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                . '<select name="item" class="select">';			   
		while($items_row=mysql_fetch_assoc($items_res)){
		
			$contents.='<option value="'.$items_row['id'].'">'.$items_row['desc_en'].'</option>';	
			
		}

    $contents.='</select>&nbsp;&nbsp;&nbsp;';
	$contents.='<input type="submit" name="submit" value="'.$lang["create"].'">';
		
	$contents.='</form>';
	
	if(isset($_POST['submit'])){
	$contents.='<br/><br/><br/> <div id="t-end"></div>
	<form method="POST" action="#" name="regFormm" id="regFormm">
		<span class="create_note">'.$lang["email_friend"].'</span><br/><Br/>
		<input style="width:240px;" placeholder="Email Address" type="text" id="email" name="email" value="" tabindex="1">&nbsp;&nbsp;
		<input type="submit" name="mail" value="Send">
		<br/><br/><div id="t-end"></div>	
		<span class="create_note">Or</span><br/>
	</form>
	';

	}
		
	if(isset($_POST['submit'])){
		$_SESSION['item'] = $_POST['item'];
		$_SESSION['create'] = 1;
		$id = $_SESSION['admin_id'];  
		$contents.='<br/>Click Here...<a style="color:#00aeef;" target="_blank" href="http://www.'.$_SERVER['SERVER_NAME'].'/view.php?id_item='.$_SESSION['item'].'&create_view='.$_SESSION['create'].'">calendar link</a><br/><br/>
		<span class="create_note">Or Copy</span><br/><br/>
		http://www.'.$_SERVER['SERVER_NAME'].'/view.php?id_item='.$_SESSION['item'].'&create_view='.$_SESSION['create'].'
		';		
			
	}
	if(isset($_POST['mail'])){

                $link =  'http://www.'.$_SERVER['SERVER_NAME'].'/view.php?id_item='.$_SESSION['item'].'&create_view='.$_SESSION['create'];              
				
				$to = $_POST['email']; 
				$email_subject = "View Availio Calendar";
				$email_body = 
				"Hi \n\n".
				"You have received a calendar to view from www.availio.co.za\n\n".
				"Here are the details:\n\n".
				"click here to view: $link \n\n".
				"\n\n".
				"Regards: ".
				"Avalio Team"
				; 

				$headers = "From: Availio | no-reply@availio.co.za"; 
			   // $headers .= "Reply-To: no-reply@availio.co.za";

				mail($to,$email_subject,$email_body,$headers);

				$contents.='<br/><br/><span style="color:#cc0000;">Mail Send</span>';
		}

?>
