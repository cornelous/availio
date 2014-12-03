<!-- START CONTENT -->
<div class="resp-tabs-container">
    <div id="contents">

        <div id="title">
            <div class="float_l"><h1>Properties - Add</h1></div>
            <div class="clear"></div>
        </div>

        <!-- START ADD FORM -->
        <?php $item_formattributes = array('id'=>'item_form'); ?>
        <?php echo Form::open(NULL, $item_formattributes); ?>
            <table>
                <tr>
                    <td class="side">External ID</td>
                    <?php $externalidinputattributes = array('placeholder'=>'ID from API', 'id'=>'externalid', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('externalid', '', $externalidinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Availio ID</td>
                    <?php $availioidinputattributes = array('placeholder'=>'Availio ID', 'id'=>'availioid', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('availioid', '', $availioidinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Property Name</td>
                    <?php $propertynameinputattributes = array('placeholder'=>'Property Name', 'id'=>'propertyname', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('propertyname', '', $propertynameinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Property Type</td>
                    <?php $propertytypeinputattributes = array('placeholder'=>'Property Type', 'id'=>'propertytype', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('propertytype', '', $propertytypeinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Bedrooms</td>
                    <?php $bedroomsinputattributes = array('placeholder'=>'Bedrooms', 'id'=>'bedrooms', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('bedrooms', '', $bedroomsinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Sleeps</td>
                    <?php $sleepsinputattributes = array('placeholder'=>'Sleeps', 'id'=>'sleeps', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('sleeps', '', $sleepsinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Province</td>
                    <?php $provinceinputattributes = array('placeholder'=>'Province', 'id'=>'province', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('province', '', $provinceinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">City</td>
                    <?php $cityinputattributes = array('placeholder'=>'City', 'id'=>'city', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('city', '', $cityinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">Suburb</td>
                    <?php $suburbinputattributes = array('placeholder'=>'Suburb', 'id'=>'suburb', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('suburb', '', $suburbinputattributes); ?></td>
                </tr>
                <tr>
                    <td class="side">URL</td>
                    <?php $urlinputattributes = array('placeholder'=>'Property Website', 'id'=>'url', 'style'=>'width:250px'); ?>
                    <td><?php echo Form::input('url', '', $urlinputattributes); ?></td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Save">

        <?php echo Form::close(); ?>
        <!-- END ADD FORM -->

        <div class="clear"></div>

    </div>

</div>

</div>

</div>

</div>

<!-- END CONTENT -->