

<?php
//	define admin page table
$this_table=T_BOOKINGS_ITEMS;
$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="'.$lang["tip_add_new_item"].'">'.$lang["bt_add_item"].'</a>';


//	delete item
if(isset($_POST["delete_it"])){
	if(delete_item($this_table,$_POST["id"])){
		//	delete bookings for this item
		$del="DELETE FROM ".T_BOOKINGS." WHERE id_item=".$_POST["id"]."";
		mysql_query($del) or die("Error deelting item bookings");
		 echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.location.href='index.php?page=".ADMIN_PAGE."&msg=delete_OK'
				</SCRIPT>");
		//header("Location:index.php?page=".ADMIN_PAGE."&msg=delete_OK");
	}else{
		$warning=$lang["msg_delete_KO"];
	}
}

//	modify item
if(isset($_POST["mod"])){
	if(mod_item($this_table,$_POST["id"],$_POST["mod"]))	header("Location:index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK");
	else 													$warning=$lang["msg_mod_KO"];
	
}

//	add new item
if(isset($_POST["add"])){
	//	define next list order
	$_POST["add"]["list_order"]	=get_next_order($this_table);
	$_POST["add"]["id_user"]	=$_SESSION["admin_id"];
	
	if(add_item($this_table,$_POST["add"],false))			header("Location:index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK");
	else 													$warning=$lang["msg_add_KO"];
	
}


if(isset($_REQUEST["action"])){
	$xtra_moo		.=	'
	new FormCheck("item_form");
	';
	
	
	switch($_REQUEST["action"]){
		case "new":
			$page_title_add=' - '.$lang["title_add"];
			$contents.='
			<form method="post" action="#" id="item_form">
			<table>';
                        
                        $user_id = $_SESSION['admin_id'];
                        
                        if ($user_id == 1){   
                            $items_sql="SELECT * FROM bookings_admin_users ORDER BY id";               
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                       
                            $contents.='<tr><td class="side">'.$lang["for_user"].'</td><td><select class="select" name="apartment">';
                            
                            while($items_row=mysql_fetch_assoc($items_res)){
                            
                                if ( $_GET['aprt_id'] == $items_row['id']){
                                    $select =  'selected="select"';
                                }else{
                                    $select=" ";
                                }

                                $contents.='
                                    <option '.$select.' value="'.$items_row['id'].'">'.$items_row['username'].'</option>
                                ';

                            }
                        
                            $contents.='</select></td></tr>';
                        }
                         
			$contents.='<tr>
					<td class="side">'.$lang["bedrooms"].'</td>
					<td>
					<select name="bedrooms" class="select">';

					for($i=1; $i<=10; $i++)
					{
						if ( $_GET['bed'] == $i){
                                    $select =  'selected="select"';
                                }else{
                                    $select=" ";
                                }
		$contents.='<option '.$select.' value="'.$i.'">'.$i.'</option>"';
					}  
					 
		$contents.='   
					</select>
					<span class="edit_note">'.$lang["note_bedrooms"].'</span></td>
				</tr>
			
                                <tr>
                                        <td class="side">'.$lang["desc"].' : '.strtoupper($code).'</td>
                                        <td><input type="text" name="name" value="" class="validate[\'required\',\'length[0,100]\'] text-input"></td>
                                </tr>
		
			</table>
                        
                         <div id="t-end"></div>
                         
                         <input type="submit" name="submit" value="'.$lang["bt_add"].'">

			</form>
			';
                        
                        if(isset($_POST['submit'])){
                            
                            if ($user_id == 1){   
                              $user_id= $_POST['apartment'];
                            }else{
                              $user_id= $_SESSION['admin_id'];
                            }
                            
                            $name = $_POST['name'];
							$bedrooms = $_POST['bedrooms'];
                            $state = 1;
                            
                            $season_query = "INSERT INTO bookings_items ( id_user, desc_en, state, bedrooms) VALUES 
                                    ('$user_id', '$name', '$state', '$bedrooms')";
                            $season_result = mysql_query($season_query);
							 echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.location.href='index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK'
								</SCRIPT>");
                           // header("Location:index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK");
                        }
                        
                        
			break;
                        
                    case "status":
              
            //echo $_GET['id'];
            //echo $_GET['set_id'];
            $query = " UPDATE bookings_items SET  
                state = '".$_GET['set_id']."'      
                
                WHERE id = '".$_GET['id']."' ";

           $results = mysql_query($query);
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='index.php?page=".ADMIN_PAGE."&id_modified=".$_GET["id"]."&msg=mod_OK'
				</SCRIPT>");
           // header("Location:index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK");
                    
	break;     
                        
                        
		case "edit":
			//	get item data
                        $edit_sql="SELECT * FROM bookings_items WHERE id = '".$_GET['id']."' ";               
                        $edit_res=mysql_query($edit_sql) or die("Error checking admin user<br>".mysql_Error());
                        $edit_row=mysql_fetch_assoc($edit_res);
                                
			$contents.='
			<form method="post" action="#" id="item_form">
			<table>';
                        
                        $user_id = $_SESSION['admin_id'];
                        
                        if ($user_id == 1){   
                            $items_sql="SELECT * FROM bookings_admin_users ORDER BY id";               
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                       
                            $contents.='<tr><td class="side">'.$lang["for_user"].'</td><td><select class="select" name="apartment">';
                            
                            while($items_row=mysql_fetch_assoc($items_res)){
                            
                                if ( $_GET['aprt_id'] == $items_row['id']){
                                    $select =  'selected="select"';
                                }else{
                                    $select=" ";
                                }

                                $contents.='
                                    <option '.$select.' value="'.$items_row['id'].'">'.$items_row['username'].'</option>
                                ';

                            }
                        
                            $contents.='</select></td></tr>';
                        }
                        
						
								
			$contents.='
					<tr>
						<td class="side">'.$lang["desc"].' : '.strtoupper($code).'</td>
						<td><input type="text" name="name" value="'.$edit_row['desc_en'].'" class="validate[\'required\',\'length[0,100]\'] text-input"></td>
					</tr>
			
					<tr>
					<td class="side">'.$lang["bedrooms"].'</td>
					<td>
					<select name="bedrooms" class="select">';

					for($i=1; $i<=10; $i++)
					{
						if ( $_GET['bed'] == $i){
                                    $select =  'selected="select"';
                                }else{
                                    $select=" ";
                                }
		$contents.='<option '.$select.' value="'.$i.'">'.$i.'</option>"';
					}  
					 
		$contents.='   
					</select>
					<div class="edit_note">'.$lang["note_bedrooms"].'</div></td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>

			</table>
			
			<div id="t-end"></div>
			
			<input type="submit" name="edit" value="'.$lang["save"].'">
			
			</form>
			
			';
                        
                        if(isset($_POST['edit'])){
                            $id=$_GET['id'];  
                            $id_user=$_SESSION['admin_id'];
                            $name = $_POST['name'];
							$bedrooms = $_POST['bedrooms'];
							 
                            $query = " UPDATE bookings_items SET  
                            id_user = '$id_user',
                            desc_en = '$name',
							bedrooms = '$bedrooms'	
                            
                            WHERE id = '$id' ";

                        $results = mysql_query($query);

                        if ($results) {
							echo ("<SCRIPT LANGUAGE='JavaScript'> 
							window.location.href='index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK'
							</SCRIPT>");                           

                        } else {
                           echo ("<SCRIPT LANGUAGE='JavaScript'>
                             window.alert('Error!! Check all fields')
                     </SCRIPT>");
                        }
                            
                        }
                        
			break;
		case "delete":
			//	get item details
			if(!$row=get_item($this_table,$_REQUEST["id"],$sql_condition)){
				//	item doesn't exist (or user doesn't have permission to see)
				$warning.=$lang["warning_item_not_exist"];
			}else{
				$page_title_add	= ' - '.$lang["title_delete"].' - '.strtoupper($row["desc_".AC_LANG.""]);
				$contents.='
				<form method="post" onSubmit="return confirm(\''.$lang["warning_delete_confirm"].'\');">
				<input type="hidden" name="delete_it" value="1">
				<input type="hidden" name="id" value="'.$_REQUEST["id"].'"> 
				<table>
					
						<tr class="odd">
							<td width="100">'.$lang["desc"].' : '.strtoupper($code).'</td>
							<td><input type="text" name="name" value="'.$row["desc_en"].'" style="width:200px;" ></td>
						</tr>
											
				</table>
				
				<div id="t-end"></div>
				<input type="submit" value="'.$lang["bt_delete"].'">
				
				</form>
				';
			}
			break;
	}
}
if(!isset($_REQUEST["action"])){
//$bt_add='<a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="'.$lang["tip_add_new_item"].'">'.$icons["add"].'</a>';
	$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="'.$lang["tip_add_new_item"].'">'.$lang["bt_add_item"].'</a>';
	
	$xtra_moo.="
	$$('.options img').addEvent('mouseover',function(event){
		this.highlight();
	});
	";
        
        //Getting user id from session that was set in original code
		$user_id =  $_SESSION["admin_id"];
        
        //Check wish apartment calendars to load, if not admin load just users calendar
        if ($user_id == 1){
            $sql="SELECT b.*,u.username FROM ".$this_table." AS b LEFT JOIN ".T_BOOKINGS_ADMIN." AS u ON u.id=b.id_user WHERE b.id<>0 ".$sql_condition." ORDER BY b.state DESC, b.list_order";
        }else{
            $sql="SELECT b.*,u.username FROM ".$this_table." AS b LEFT JOIN ".T_BOOKINGS_ADMIN." AS u ON u.id=b.id_user WHERE b.id_user ='".$user_id."' AND b.id<>0 ".$sql_condition." ORDER BY b.state DESC, b.list_order";
        }
	
	
	$res=mysql_query($sql) or die("Error getting states<br>".mysql_Error());
	//	define start message
	if(mysql_num_rows($res)==0)	$start_message=$lang["warning_no_calendar_items"];
	else 						$start_message=$lang["inst_drag"];
	$cols=6;
	while($row=mysql_fetch_assoc($res)){
		$item_modified="";
		if($row["id"]==$_REQUEST["id_modified"]) 	$item_modified='<span class="modified">'.$lang["item_modified"].'</span>';
		if($row["id"]==$_REQUEST["id_added"]) 		$item_modified='<span class="modified">'.$lang["item_added"].'</span>';
		
		$list_states.='
		<tr alt="'.$row["id"].'" > 
			<td align="center" class="handles" title="'.$lang["drag_to_order"].'"></td>
			<td class="center">'.$row["id"].'</td>
			<td class="center">'.$row["username"].'</td>
			<td class="center">'.$row["bedrooms"].'</td>
			<td>'.$row["desc_".AC_LANG.""].' '.$item_modified.'</td>
			<!--<td class="center">'.active_state($row["state"],$row["id"],$this_table).'</td>-->
                        <td class="center">';
                        
                            if($row["state"] == 1){
                           $list_states.='<a href="?page='.ADMIN_PAGE.'&action=status&id='.$row["id"].'&set_id=0"><img alt="tick" src="icons/icon_tick.png"></a>';
                            }
                             if($row["state"] == 0){
                                 $list_states.='<a href="?page='.ADMIN_PAGE.'&action=status&id='.$row["id"].'&set_id=1"><img alt="tick" src="icons/icon_cross.png"></a>';
                            }
                       $list_states.=' </td>
			<td class="options">
				<a href="?page='.ADMIN_PAGE.'&action=edit&id='.$row["id"].'&bed='.$row["bedrooms"].'" title="'.$lang["tip_edit_item"].'">'.$icons["edit"].'</a>
				<a href="?page=bookings&id_item='.$row["id"].'" title="'.$lang["tip_see_item_calendar"].'">'.$icons["calendar"].'</a>
				<a href="?page='.ADMIN_PAGE.'&action=delete&id='.$row["id"].'" title="'.$lang["tip_delete_item"].'">'.$icons["delete"].'</a>
			</td>
		</tr>
		';
	}
	
	$contents.='
	<input type="hidden" name="sort_order" id="sort_order" value="">
	<table class="list" id="sortable" field="list_order" table="'.$this_table.'">
		<thead>
		<tr>
			<td >&nbsp;</td>
			<td style="width:40px;">'.$lang["id"].'</td>
			<td style="width:160px;">'.$lang["username"].'</td>
			<td style="width:100px;">'.$lang["bedrooms"].'</td>
			<td>'.$lang["item"].'</td>
			<td class="states">'.$lang["state"].'</td>
			<td class="options">'.$lang["options"].'</td>
		</tr>
		</thead>
		<tbody>
		'.$list_states.'
		</tbody>
		<tfoot>
		<tr>
			<td align="center" colspan="'.($cols-1).'" class="spacer"><img src="images/i.png"><div class="note">'.$start_message.'</div></td>
			<td class="center"></td>
		</tr>
		</tfoot>
	</table>
	
	';
	
}
?>