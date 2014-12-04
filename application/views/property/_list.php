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
                <td style="width:120px;">Property Type</td>
                <td style="width:30px;">Bedrooms</td>
                <td style="width:30px;">Sleeps</td>
                <td style="width:100px;">Province</td>
                <td style="width:100px;">City</td>
                <td style="width:100px;">Suburb</td>
                <td style="width:100px;">Website</td>
                <td class="options">Options</td>
            </tr>
            </thead>
            <tbody>

            <?php $count = 0;?>
            <?php foreach ($properties as $property) : ?>
            <?php //if ($count %2 == 0): ?>

            <tr alt="70" >
                <td align="center" class="handles" title="Drag here to change item order"></td>
                <td class="center"><?php echo $property['availioid']; ?></td>
                <td class="center"><?php echo $property['externalid']; ?></td>
                <td><?php echo $property['propertytype']; ?></td>
                <td><?php echo $property['propertyname']; ?></td>
                <td class="center"><?php echo $property['bedrooms']; ?></td>
                <td class="center"><?php echo $property['sleeps']; ?></td>
                <td><?php echo $property['province']; ?></td>
                <td><?php echo $property['city']; ?></td>
                <td><?php echo $property['suburb']; ?></td>
                <td><?php echo $property['url']; ?></td>
                <!--<td class="center"><span class="update_state" id="state_70" rel="bookings_items" state="1" field="state" title="Click to update the Item State"><img src="icons/icon_tick.png" alt="tick"></a></td>-->
                <td class="options">
                    <a href="#" title="Edit this item"><img src="<?php echo URL::base(); ?>media/icons/icon_edit_s.png" alt="edit"></a>
                    <a href="#" title="See calendar for this item"><img src="<?php echo URL::base(); ?>media/icons/icon_calendar_s.png" alt="cal"></a>
                    <a href="#" title="Delete this item"><img src="<?php echo URL::base(); ?>media/icons/icon_trash_s.png" alt="delete"></a>
                </td>
            </tr>



            </tbody>
        </table>
        <?php $count++;?>
        <?php endforeach; ?>

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

