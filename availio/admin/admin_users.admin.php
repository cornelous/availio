<?php
//	define admin page table
$this_table=T_BOOKINGS_ADMIN;

$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="Add new Item">Add New User</a>';

//	delete item
if(isset($_POST["delete_it"])){
	//	delete bookings for this user
	$sql="SELECT id FROM ".T_BOOKINGS_ITEMS." WHERE id_user=".$_POST["id"]."";
	$res=mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
		echo "<br>".$del="DELETE FROM ".T_BOOKINGS." WHERE id_item=".$row["id"]." LIMIT 1";
		mysql_query($del) or die("Error deelting item bookings");
	}
	//	delete calendar items
	$del="DELETE FROM ".T_BOOKINGS_ITEMS." WHERE id_user=".$_POST["id"]."";
	mysql_query($del) or die("Error deleting items");
	
	//	delete user (only once all items have been deleted
	
	if(delete_item($this_table,$_POST["id"]))	header("Location:index.php?page=".ADMIN_PAGE."&msg=delete_OK");
	else 										$warning=$lang["msg_delete_KO"];
	
}

//	modify item
if(isset($_POST["mod"])){
	//	add password to array - this is not in the array as it is need for formchecking
	if($_POST["password"]!="")$_POST["mod"]["password"]=$_POST["password"]; 
	
	if(mod_item($this_table,$_POST["id"],$_POST["mod"],false))	header("Location:index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK");
	else 														$warning=$lang["msg_mod_KO"];

}

//	add new item
if(isset($_POST["add"])){
	//	add password to array - this is not in the array as it is need for formchecking
	$_POST["add"]["password"]=$_POST["password"]; 
	
	if(add_item($this_table,$_POST["add"],false)) 			header("Location:index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK");
	else 													$warning=$lang["msg_add_KO"];
}


if(isset($_REQUEST["action"])){
	switch($_REQUEST["action"]){
		case "new":
			$xtra_moo.='new FormCheck("item_form")';
			//	geet last list_order
			//$next_order=get_next_order($this_table);
			$page_title_add=' - '.$lang["title_add"];
			$contents.='
			<form method="post" id="item_form">
			<table style="width:864px">
			
				<tr>
					<td class="side">'.$lang["username"].'</td>
					<td><input type="text" name="add[username]" value="" style="width:200px;" class="validate[\'required\',\'length[0,100]\'] text-input"><div class="mod_note"><img src="images/info.png"><div id="pass">'.$lang["note_user_calendar_only"].'</div></div></td>
				</tr>
				<tr>
					<td class="side top">'.$lang["password"].'</td>
					<td><input type="password" id="password" name="password" value="" style="width:200px;" class="validate[\'required\',\'length[5,20]\'] text-input"></td>
				</tr>
				<tr>
					<td class="side top">'.$lang["password_repeat"].'</td>
					<td><input type="password" name="password2" value="" style="width:200px;" class="validate[\'required\',\'length[5,20]\',\'confirm[password]\'] text-input"></td>
				</tr>				
			</table>
                        
                         <div id="t-end"></div>
                         
                         <input type="submit" value="'.$lang["bt_add"].'">
			</form>
			';
			break;
		case "edit":
			$xtra_moo.='new FormCheck("item_form")';
			//	get item data
			$row=get_item($this_table,$_REQUEST["id"]);
			$page_title_add=' - '.$lang["title_mod"].' - '.strtoupper($row["word"]);
			$contents.='
			<form method="post" id="item_form">
			<input type="hidden" name="id" value="'.$_REQUEST["id"].'"> 
			<table style="width:864px">
				<tr>
					<td class="side">'.$lang["username"].'</td>
					<td><input type="text" name="mod[username]" value="'.$row["username"].'" style="width:200px;" class="validate[\'required\',\'length[0,100]\'] text-input"></td>
				</tr>

				<tr>
					<td class="side top">'.$lang["password"].'</td>
					<td><input type="password" id="password" name="password" value="" style="width:200px;"><div class="mod_note"><img src="images/info.png"><div id="pass">'.$lang["note_password_mod"].'</div></div></td>
				</tr>
				<tr>
					<td class="side top">'.$lang["password_repeat"].'</td>
					<td><input type="password" name="password2" value="" style="width:200px;" class="validate[\'confirm[password]\'] text-input"><div class="mod_note"><img src="images/info.png"><div id="pass">'.$lang["note_password_mod"].'</div></div></td>
				</tr>
			</table>
                        
                        <div id="t-end"></div>
                        <input type="submit" value="'.$lang["bt_save"].'">

			</form>
			';
			break;
		case "delete":
			//	get item details
			$row			= get_item($this_table,$_REQUEST["id"]);
			$page_title_add	= ' - '.$lang["title_delete"].' - '.strtoupper($row["word"]);
			$contents.='
			<form method="post" onSubmit="return confirm(\''.$lang["warning_delete_confirm"].'\');">
			<input type="hidden" name="delete_it" value="1">
			<input type="hidden" name="id" value="'.$_REQUEST["id"].'"> 
			<table>
				<tr>
					<td class="side">'.$lang["username"].'</td>
					<td class="data">'.$row["username"].'</td>
				</tr>			
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="'.$lang["bt_delete"].'"></td>
				</tr>
			</table>
			</form>
			';
			break;
	}
}
if(!isset($_REQUEST["action"])){
	$xtra_moo.='
	$$("tbody tr:odd").addClass("odd");
	';
	
	$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="Add new Item">Add New User</a>';

	$sql="SELECT * FROM ".$this_table." ORDER BY username ASC";
	$res=mysql_query($sql) or die("Error getting states<br>".mysql_Error());
	$cols=3;
	$list_items="";
	while($row=mysql_fetch_assoc($res)){
		$item_modified="";
		if($row["id"]==$_REQUEST["id_modified"]) 	$item_modified='<span class="modified">modified</span>';
		if($row["id"]==$_REQUEST["id_added"]) 		$item_modified='<span class="modified">added</span>';
		$list_items.='
		<tr>
			<td class="center id_item">'.$row["id"].'</td>
			<td>'.$row["username"].' '.$item_modified.'</td>
			<td class="options">
			
				<a href="?page='.ADMIN_PAGE.'&action=edit&id='.$row["id"].'" title="Edit this item">'.$icons["edit"].'</a>				
				';
				
				if($row["id"]>1) $list_items.='<a href="?page='.ADMIN_PAGE.'&action=delete&id='.$row["id"].'" title="Delete this item">'.$icons["delete"].'</a>';
				$list_items.='
				
			</td>
		</tr>
		';
	}
	
	$contents.='
	<table class="list">
		<thead>
		<tr>
			<td>'.$lang["id"].'</td>
			<td>'.$lang["username"].'</td>
			<td class="options">'.$lang["options"].'</td>
		</thead>
		<tbody>
		'.$list_items.'
		</tbody>
		<tfoot>
		
		</tfoot>
		
	</table>
	';
}
?>