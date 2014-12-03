<!-- START CONTENT -->
<div class="resp-tabs-container">
    <div id="contents">

        <div id="title">
            <div class="float_l"><h1>Properties - Add</h1></div>
            <div class="clear"></div>
        </div>

        <!-- START ADD FORM -->
        <?php echo Form::open(); ?>
            <table>
                <tr>
                    <td class="side">Apartment</td>
                    <td><select class="select" name="apartment">
                            <option   value="65">Braemar </option>
                            <option   value="67">Grimsby</option>
                            <option   value="66">Neptune Isle 09</option>
                            <option   value="64">Sunset Beach Villa</option>
                            <option   value="62">test</option>
                            <option   value="63">The Nelson Villa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <?php $externalidlabelattributes = array('class'=>'side'); ?>
                    <?php echo Form::label('externalidlabel', 'External ID', $externalidlabelattributes)?>
                    <?php $externalidinputattributes = array('placeholder'=>'ID from API', 'id'=>'externalid', 'style'=>'width:250px'); ?>
                    <?php echo Form::input('externalid', '', $externalidinputattributes); ?>
                </tr>
                <tr>
                    <td class="side">Avail ID</td>
                    <td><input style="width:250px;" type="text" Placeholder="Availio ID" id="date-picker-input-2" class="my_date" name="to_date" ></td>
                </tr>
                <tr>
                    <td class="side">Property Name</td>
                    <td><input type="text" name="price" placeholder="Enter the price only. Ex: 1200" style="width:250px;"></td>
                </tr>
                <tr>
                    <td class="side">Property Type</td>
                    <td><input type="text" name="price" placeholder="Enter the price only. Ex: 1200" style="width:250px;"></td>
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