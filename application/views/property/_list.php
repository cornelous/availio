<table>
    <tr>
        <th>Avail Id</th>
        <th>External Id</th>
        <th>Property Name</th>
        <th>Property Type</th>
        <th>Bedrooms</th>
        <th>Sleeps</th>
        <th>Province</th>
        <th>City</th>
        <th>Suburb</th>
        <th>URL</th>
    </tr>
    <?php $count = 0;?>
    <?php foreach ($properties as $property) : ?>
    <?php if ($count %2 == 0): ?>
    <tr>
        <td><?php echo $property['availioid']; ?></td>
        <td><?php echo $property['externalid']; ?></td>
        <td><?php echo $property['propertyname']; ?></td>
        <td><?php echo $property['propertytype']; ?></td>
        <td><?php echo $property['bedrooms']; ?></td>
        <td><?php echo $property['sleeps']; ?></td>
        <td><?php echo $property['province']; ?></td>
        <td><?php echo $property['city']; ?></td>
        <td><?php echo $property['suburb'] ?></td>
        <td><?php echo $property['url'] ?></td>
    </tr>
    <?php else: ?>
        <tr class = "alt">
            <td><?php echo $property['availioid']; ?></td>
            <td><?php echo $property['externalid']; ?></td>
            <td><?php echo $property['propertyname']; ?></td>
            <td><?php echo $property['propertytype']; ?></td>
            <td><?php echo $property['bedrooms']; ?></td>
            <td><?php echo $property['sleeps']; ?></td>
            <td><?php echo $property['province']; ?></td>
            <td><?php echo $property['city']; ?></td>
            <td><?php echo $property['suburb'] ?></td>
            <td><?php echo $property['url'] ?></td>
        </tr>
     <?php endif; ?>
    <?php $count++;?>
    <?php endforeach; ?>
</table>
<br>
<div class="pagination">
    <?php echo $pager_links; ?>
</div>
<br>


<!-- START CONTENT -->
<div class="resp-tabs-container">
    <div id="contents">

        <div id="title">
            <div class="float_l"><h1>Properties</h1></div>
            <div class="float_r"><br/><a id="add_prop" href="#" title="Add new Item">Add New Property</a></div>
            <div class="clear"></div>
        </div>

        <!-- START ADD FORM -->
        <table class="list" id="sortable" field="list_order" table="bookings_items">
            <thead class="table-heading">
            <tr>
                <td >&nbsp;</td>
                <td style="width:65px;text-align:center !important;" >Availio ID</td>
                <td style="width:65px;">External ID</td>
                <td style="width:100px;">Property Name</td>
                <td style="width:80px;">Property Type</td>
                <td style="width:30px;">Bedrooms</td>
                <td style="width:100px;">Province</td>
                <td style="width:100px;">City</td>
                <td style="width:100px;">Website</td>
                <td class="options">Options</td>
            </tr>
            </thead>
            <tbody>

            <tr alt="70" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">70</td>
                <td class="center">Kim</td>
                <td class="center">3</td>
                <td>Dolphin Beach E61 </td>
                <!--<td class="center"><span class="update_state" id="state_70" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="63" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">63</td>
                <td class="center">Kim</td>
                <td class="center">3</td>
                <td>The Nelson Villa </td>
                <!--<td class="center"><span class="update_state" id="state_63" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_cross.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="64" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">64</td>
                <td class="center">Kim</td>
                <td class="center">4</td>
                <td>Sunset Beach Villa </td>
                <!--<td class="center"><span class="update_state" id="state_64" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="65" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">65</td>
                <td class="center">Kim</td>
                <td class="center">3</td>
                <td>Braemar  </td>
                <!--<td class="center"><span class="update_state" id="state_65" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="66" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">66</td>
                <td class="center">Kim</td>
                <td class="center">2</td>
                <td>Neptune Isle 09 </td>
                <!--<td class="center"><span class="update_state" id="state_66" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="67" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">67</td>
                <td class="center">Kim</td>
                <td class="center">3</td>
                <td>Grimsby </td>
                <!--<td class="center"><span class="update_state" id="state_67" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="68" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">68</td>
                <td class="center">Kim</td>
                <td class="center">2</td>
                <td>The Breakers G18 </td>
                <!--<td class="center"><span class="update_state" id="state_68" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="69" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">69</td>
                <td class="center">Kim</td>
                <td class="center">4</td>
                <td>Three Anchor Bay </td>
                <!--<td class="center"><span class="update_state" id="state_69" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            <tr alt="71" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center">71</td>
                <td class="center">Kim</td>
                <td class="center">3</td>
                <td>Majorca G06 </td>
                <!--<td class="center"><span class="update_state" id="state_71" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="center"><a href="#"><img alt="tick" src="icons/icon_tick.png"></a> </td>
                <td class="options">
                    <a href="#" title="Edit this item"><img src="<?php echo URL::base(); ?>media/icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="<?php echo URL::base(); ?>media/icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="<?php echo URL::base(); ?>media/icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>

            </tbody>
        </table>
        <div class="properties-drag-instructions">
            <img src="<?php echo URL::base(); ?>media/images/i.png"><div class="note">Drag the items to change the order</div>
        </div>

        <div class="pagination">
            <?php echo $pager_links; ?>
        </div>

        <!-- END ADD FORM -->

        <div class="clear"></div>

    </div>

</div>

</div>

</div>

</div>

<!-- END CONTENT -->

