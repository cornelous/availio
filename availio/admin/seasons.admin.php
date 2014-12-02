<?php

session_start();

$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new" title="'.$lang["tip_add_new_item"].'">'.$lang["bt_add_season"].'</a>';          

?>

	
<?php
//	define admin page table
$this_table=T_BOOKINGS_SEASONS;

if(isset($_REQUEST["action"])){
	$xtra_moo		.=	'
	new FormCheck("item_form");
	';

	
	switch($_REQUEST["action"]){
		case "new":
	
			$page_title_add=' - '.$lang["title_add"];
			$contents.='
			<form method="post" action="#" id="item_form">
			<table><tr><td class="side">'.$lang["apartment"].'</td><td><select class="select" name="apartment">';
                        $user_id = $_SESSION['admin_id'];
                        if ($user_id == 1){   
                            $items_sql="SELECT * FROM bookings_items ORDER BY desc_en";               
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                        }else{
                            $items_sql="SELECT * FROM bookings_items WHERE id_user='".$_SESSION['admin_id']."' ORDER BY list_order";               
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                        }                   

                        //$row=mysql_fetch_assoc($res);
 
                        while($items_row=mysql_fetch_assoc($items_res)){
                            
                        if ( $_GET['aprt_id'] == $items_row['id']){
                            $select =  'selected="select"';
                        }else{
                            $select=" ";
                        }
                        
                        $contents.='
                            <option '.$select.' value="'.$items_row['id'].'">'.$items_row['desc_en'].'</option>
                        ';
                             
                        }
                        
                        
                       $contents.='</select></td>
					
				</tr>
				<tr>
					<td class="side">'.$lang["season_start"].'</td>
					<td><input style="width:250px;" type="text" Placeholder="From Date" id="date-picker-input-1" class="my_date" name="from_date" ></td>
				</tr>
                                <tr>
					<td class="side">'.$lang["season_end"].'</td>
					<td><input style="width:250px;" type="text" Placeholder="To Date" id="date-picker-input-2" class="my_date" name="to_date" ></td>
				</tr>
                                <tr>
					<td class="side">'.$lang["price"].'</td>
					<td><input type="text" name="price" placeholder="'.$lang["note_id_price"].'" style="width:250px;"></td>
				</tr>
				
			
			</table>
			
			<div id="t-end"></div>
			
			<input type="submit" name="submit" value="'.$lang["save"].'">
			
			</form>
			';
                        if(isset($_POST['submit'])){
                        $user_id = $_GET['id'];   
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];
                        $price = $_POST['price'];
                        $apartment = $_POST['apartment'];
                        $state = 1;

                       
                
                       $season_query = "INSERT INTO bookings_seasons ( user_id, date_from, to_date, price, state, aprt_id ) VALUES 
                                    ('$user_id','$from_date','$to_date', '$price', '$state', '$apartment')";
                                $season_result = mysql_query($season_query);
								
						 echo ("<SCRIPT LANGUAGE='JavaScript'> 
                window.location.href='index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK'
				</SCRIPT>");		
                                //header("Location:index.php?page=".ADMIN_PAGE."&id_added=".mysql_insert_id()."&msg=add_OK");
                    
                        }
			break;
                        
		case "edit":
			//	get item data
                        $edit_sql="SELECT * FROM bookings_seasons WHERE id='".$_GET['id']."' AND state = 1";
                        $edit_res=mysql_query($edit_sql) or die("Error checking admin user<br>".mysql_Error());
                        $edit_row=mysql_fetch_assoc($edit_res);
                
                        $contents.='
			<form method="post" action="#" id="item_form">
			<table><tr><td class="side">'.$lang["apartment"].'</td><td><select class="select" name="apartment">';
                        
                        $user_id = $_SESSION['admin_id'];
                        
                        if ($user_id == 1){   
                            $items_sql="SELECT * FROM bookings_items ORDER BY list_order";                       
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                        }else{
                            $items_sql="SELECT * FROM bookings_items WHERE id_user='".$_SESSION['admin_id']."' ORDER BY list_order";                       
                            $items_res=mysql_query($items_sql) or die("Error checking admin user<br>".mysql_Error());
                        }
                        
                        while($items_row=mysql_fetch_assoc($items_res)){                          
                        if ( $_GET['aprt_id'] == $items_row['id']){
                            $select =  'selected="select"';
                        }else{
                            $select=" ";
                        }                       
                             $contents.='<option '.$select.' value="'.$items_row['id'].'">'.$items_row['desc_en'].'</option>';
                        }
                         
                       $contents.='</select></td>
					
                        </tr>                               
                        <tr>
                                <td class="side">'.$lang["season_start"].'</td>
                                <td><input style="width:200px;" type="text" Placeholder="'.$edit_row["date_from"].'" value="'.$edit_row["date_from"].'" id="date-picker-input-1" class="my_date" name="from_date" ></td>
                        </tr>
                        <tr>
                                <td class="side">'.$lang["season_end"].'</td>
                                <td><input style="width:200px;" type="text" Placeholder="'.$edit_row["to_date"].'" value="'.$edit_row["to_date"].'" id="date-picker-input-2" class="my_date" name="to_date" ></td>
                        </tr>
                        <tr>
                                <td class="side">'.$lang["price"].'</td>
                                <td><input type="text" Placeholder="'.$edit_row["price"].'" value="'.$edit_row["price"].'" name="price" style="width:200px;"></td>
                        </tr>				
                        
                 </table>
				 
				 <div id="t-end"></div>
			
					<input type="submit" name="edit" value="'.$lang["save"].'">
				 
                 </form>
                 ';
                    
                if(isset($_POST['edit'])){
                $id = $_GET['id'];
                $from_date = $_POST['from_date'];
                $to_date = $_POST['to_date'];
                $apartment = $_POST['apartment'];
                $price = $_POST['price'];
                //echo $id.'<br/>'.$from_date.'<br/>'.$to_date.'<br/>'.$aprtment.'<br/>'.$price;

                 
                   
                $edit_query = " UPDATE bookings_seasons SET  
                date_from= '$from_date',       
                to_date = '$to_date',
                price = '$price',
                aprt_id = '$apartment'
                WHERE id = '$id' ";

                $edit_results = mysql_query($edit_query);
				
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK'
				</SCRIPT>"); 
               // header("Location:index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK");
               
                
                
               
                     
                } 
                    
                    
	break;
        
        case "status":
              
            //echo $_GET['id'];
            //echo $_GET['set_id'];
            $query = " UPDATE bookings_seasons SET  
                state = '".$_GET['set_id']."'      
                
                WHERE id = '".$_GET['id']."' ";

           $results = mysql_query($query);
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK'
				</SCRIPT>");
           // header("Location:index.php?page=".ADMIN_PAGE."&id_modified=".$_POST["id"]."&msg=mod_OK");
                    
	break;
		case "delete":
			//	get item details

                $del_sql="SELECT * FROM bookings_seasons WHERE id='".$_GET['id']."' AND state = 1";
                $del_res=mysql_query($del_sql) or die("Error checking admin user<br>".mysql_Error());
                $del_row=mysql_fetch_assoc($del_res);
                                                  
                $item_sql="SELECT * FROM bookings_items WHERE id='". $del_row["aprt_id"]."' AND state = 1";
                $item_res=mysql_query($item_sql) or die("Error checking admin user<br>".mysql_Error());
                $item_row=mysql_fetch_assoc($item_res);
                
                $contents.='<form method="post" action="#" id="item_form">
                        <table>
                        <tr><input type="hidden" name="id" value="'.$_GET["id"].'"> 
                             <td class="side">'.$lang["apartment"].'</td>
                             <td><input readonly style="width:200px;" value="'.$item_row["desc_en"].'" type="text" name="name" ></td>

                         </tr>                                
                         <tr>
                                 <td class="side">'.$lang["season_start"].'</td>
                                 <td><input readonly style="width:200px;" value="'.$del_row["date_from"].'" type="text" name="from_date" ></td>
                         </tr>
                         <tr>
                                 <td class="side">'.$lang["season_end"].'</td>
                                 <td><input readonly style="width:200px;" value="'.$del_row["to_date"].'" type="text" name="to_date" ></td>
                         </tr>
                         <tr>
                                 <td class="side">'.$lang["price"].'</td>
                                 <td><input readonly style="width:200px;" value="R '.$del_row["price"].'" type="text" name="price" ></td>
                         </tr>

                 </table>
                 
                 <div id="t-end"></div>
                 
                 <input type="submit" name="delete" value="Delete">
                 
                 </form>
                 ';
                    
                if(isset($_POST['delete'])){
                     
                    $del="DELETE FROM ".T_BOOKINGS_SEASONS." WHERE id='".$_GET['id']."' LIMIT 1";
                    mysql_query($del) or die("Error deleting item seasons");
                     echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='index.php?page=".ADMIN_PAGE."&msg=delete_OK'
				</SCRIPT>");
                   // header("Location:index.php?page=".ADMIN_PAGE."&msg=delete_OK");
                     
                } 
         
                    
  break;
  
  case "view":
			
         //Getting user id from session that was set in original code
	$user_id =  $_SESSION["admin_id"];
        $id= $_REQUEST['id'];
        //Check wish apartment calendars to load, if not admin load just users calendar
        //if ($user_id == 1){
                        
            $sql="SELECT * FROM bookings_items WHERE id_user='".$id."' ";
                $res=mysql_query($sql) or die("Error checking admin user<br>".mysql_Error());
       // }else{
             //$sql="SELECT * FROM bookings_items WHERE id_user='".$id."' ORDER BY desc_en";
             //   $res=mysql_query($sql) or die("Error checking admin user<br>".mysql_Error());
       // }

	while($row=mysql_fetch_assoc($res)){
		
		 
		  $bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new&aprt_id='.$row["id"].'&id='.$row["id_user"].'" title="'.$lang["tip_add_new_item"].'">'.$lang["bt_add_season"].'</a>';          
          
		  //PROPERTY NAME
		  $contents.='<div id="s_prop_name">'.$row["desc_en"].'</div>';
		  
          $contents.='<table field="list_order" id="season_table" width="100%" cellspacing="2" cellpadding="4">';  
          $contents.='<thead>';
		  
           $contents.=' <!--<td align="center" valign="center" width="20%"><b>'.$row["desc_en"].'</b></td>-->
                            <td align="center" valign="center" width="5%">'.$lang["username"].'</td>
                            <td align="center" valign="center" width="25%">'.$lang["from_date"].'</td>
                            <td align="center" valign="center" width="25%">'.$lang["to_date"].'</td>
                            <td align="center" valign="center" width="10%">'.$lang["price"].'</td>
                            <td align="center" valign="center" width="5%" class="states">'.$lang["state"].'</td>
                            <td align="center" valign="center" width="10%" class="options">'.$lang["options"].'</td>                            
                       </tr></thead>
          ';
           //if ($_SESSION["admin_id"] == 1){ //echo $row["id_user"].' - '.$row["id"].'<br/>';
                $sqll="SELECT * FROM bookings_seasons WHERE user_id='".$id."' AND aprt_id='".$row["id"]."' ORDER BY aprt_id";
                $ress=mysql_query($sqll) or die("Error checking admin user<br>".mysql_Error());
          // }else{
              //   $sqll="SELECT * FROM bookings_seasons WHERE user_id='".$user_id."' AND aprt_id='".$row["id"]."' ORDER BY aprt_id";
              //   $ress=mysql_query($sqll) or die("Error checking admin user<br>".mysql_Error());

          // }
          while($roww=mysql_fetch_assoc($ress)){  
           
           
          $contents.='
                      <tbody><tr class="odd">
                      <!--<td>&nbsp;</td>-->';
           //if ($_SESSION["admin_id"] == 1){
                    //GET USERNAME
                 $u_sql="SELECT * FROM bookings_admin_users WHERE id='".$id."' AND state=1";
                 $u_res=mysql_query($u_sql) or die("Error checking admin user<br>".mysql_Error());  
           //}else{
             //   $u_sql="SELECT * FROM bookings_admin_users WHERE id='".$user_id."' AND state=1";
             //    $u_res=mysql_query($u_sql) or die("Error checking admin user<br>".mysql_Error());  
          // }
                 while($rowu=mysql_fetch_assoc($u_res)){                     
                       
                    $contents.='<td class="center">'.$rowu["username"].'</td> ';
                    
                 } 
                 
             $contents.='<td class="center">'.$roww["date_from"].'</td>
                        <td class="center">'.$roww["to_date"].'</td>
                            <td class="center">R '.$roww["price"].'</td>
                            <td class="center">';
                      if($roww["state"] == 1){
                           $contents.='<a href="?page='.ADMIN_PAGE.'&action=status&id='.$roww["id"].'&set_id=0"><img alt="tick" src="icons/icon_tick.png"></a>';
                      }
                       if($roww["state"] == 0){
                           $contents.='<a href="?page='.ADMIN_PAGE.'&action=status&id='.$roww["id"].'&set_id=1"><img alt="tick" src="icons/icon_cross.png"></a>';
                      }
           $contents.='</td><td align="center" valign="center" class="options">
                                <a href="?page='.ADMIN_PAGE.'&action=edit&id='.$roww["id"].'&aprt_id='.$row["id"].'" title="'.$lang["tip_edit_item"].'">'.$icons["edit"].'</a>
                                <!--<a href="?page=bookings&id_item='.$roww["id"].'" title="'.$lang["tip_see_item_calendar"].'">'.$icons["calendar"].'</a>-->
                                <a href="?page='.ADMIN_PAGE.'&action=delete&id='.$roww["id"].'" title="'.$lang["tip_delete_item"].'">'.$icons["delete"].'</a>
                            </td>
                        </tr></tbody>
                 
                 ';              
        }
        
        $contents.='</table><br/>';
        //Green button to add a season
        $contents.=$bt_add;
        
        
        $contents.='<div id="s-end"></div>	'; 
        
        }
	           
  break;
  
  
	}
	
}
if(!isset($_REQUEST["action"])){

        //Getting user id from session that was set in original code
	$user_id =  $_SESSION["admin_id"];
        
        //Check wish apartment calendars to load, if not admin load just users calendar
        if ($user_id == 1){
                        
            $sql="SELECT * FROM bookings_items ORDER BY desc_en ";
                $res=mysql_query($sql) or die("Error checking admin user<br>".mysql_Error());
        }else{
             $sql="SELECT * FROM bookings_items WHERE id_user='".$user_id."' ORDER BY desc_en";
                $res=mysql_query($sql) or die("Error checking admin user<br>".mysql_Error());
        }		           
                  
	$contents.='<table table="bookings_items" field="list_order" id="sortable" class="list">
				  <thead>
					<tr>
						<td>Calendar</td>
						<td>Username</td>
						<td>Bedrooms</td>
						<td>Options</td>
					</tr>
				  </thead>
				  <tbody>
				  <tr>';
	while($row=mysql_fetch_assoc($res)){				 
		  //$bt_add='<br/><a id="add_prop" href="?page='.ADMIN_PAGE.'&action=new&aprt_id='.$row["id"].'&id='.$row["id_user"].'" title="'.$lang["tip_add_new_item"].'">'.$lang["bt_add_season"].'</a>';                    
			
                $u_sql="SELECT * FROM bookings_admin_users WHERE id='".$row["id_user"]."' AND state=1";
                $u_res=mysql_query($u_sql) or die("Error checking admin user<br>".mysql_Error());         
                $rowu=mysql_fetch_assoc($u_res);                                          
                //$contents.=$rowu["username"];
				
	$contents.='
				 <td><a href="?page='.ADMIN_PAGE.'&action=view&id='.$row["id_user"].'&aprt_id='.$row["id"].'" title="'.$lang["tip_edit_item"].'">'.$row["desc_en"].'</a></td>
				 <td>'.$rowu["username"].'</td>
				 <td>'.$row["bedrooms"].'</td>
				 <td><a id="add_propp" href="?page='.ADMIN_PAGE.'&action=view&id='.$row["id_user"].'&aprt_id='.$row["id"].'" title="'.$lang["tip_edit_item"].'">Edit</a></td>
				 </tr>
				  ';
		  
		}
    $contents.='<tbody></table>';
		 
}


?>