<!-- START CONTENT -->
<div class="resp-tabs-container">
<div id="contents">

<div id="title">
    <div class="float_l"><h1>Bookings</h1></div>
    <div class="float_r"><br/>
        <?php $addnewattributes = array('id'=>'add_prop') ?>
        <?php echo HTML::anchor('property/add', 'Add New Property', $addnewattributes);?>
    </div>
    <div class="clear"></div>
</div>

<form>
    <table>
        <tbody>
        <tr class="odd">
            <input type="hidden" name="page" value="bookings">
        </tr>
        <tr style="display:none;">
            <td class="side">Click Method:</td>
            <td>
                <select id="id_predefined_state" class="select">
                    <option value="">click-through (cycle through all states)</option>
                    <option value="1">Booked</option><option value="4">Provisional</option>
                    <option value="free">Available</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</form>

<!-- START CALENDAR -->
<div id="cal_wrapper">

<div id="cal_controls"><div id="cal_mnth">Change Month:</div>
    <div id="cal_prev" title="Previous  months"><img src="<?php echo URL::base(); ?>media/images/icon_prev.gif" class="cal_button" style="cursor: pointer;"></div>
    <div id="cal_next" title="Next  months"><img src="<?php echo URL::base(); ?>media/images/icon_next.gif" class="cal_button" style="cursor: pointer;"></div>

    <div class="key">

        <div id="instt_cal">

            <!-- START KEY -->
            <table id="key-table" align="right">
                <tbody>
                <tr class="odd">
                    <td align="center">Key: </td>
                    <td width="20" align="center"><div id="key-avail"></div></td>
                    <td align="center">Available</td>
                    <td width="20" align="center"><div id="key-book"></div></td>
                    <td align="center">Booked</td>
                    <td width="20" align="center"><div id="key-prov"></div></td>
                    <td align="center">Provisional</td>
                    <td width="240" align="center"><div id="inst_cal">click on the dates to change the state</div></td>
                </tr>
                </tbody>
            </table>
            <!-- END KEY -->

        </div>

    </div>

    <div class="clear"></div>
</div>

<div class="search-filter">
<!-- START SEARCH FORM -->
<?php echo Form::open(); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-bookings-filter">
        <tr>

            <?php $fromdateattributes = array('placeholder'=>'From Date', 'name'=>'date-picker-input-1', 'id'=>'date-picker-input-1', 'class'=>'my_date date-pickers-bookings-filter'); ?>
            <?php $todateattributes = array('placeholder'=>'To Date', 'name'=>'date-picker-input-2', 'id'=>'date-picker-input-2', 'class'=>'my_date date-pickers-bookings-filter'); ?>

            <td style="width:125px;"><?php echo Form::input('date-picker-input-1','', $fromdateattributes); ?></td>
            <td style="width:125px;"><?php echo Form::input('date-picker-input-2','', $todateattributes); ?></td>
            <td style="width:140px;"><select class="select select-bookings-filter" name="property_type">
                    <option value="">Select A Property Type</option>
                    <option value="Any">Any</option>
                </select>
            </td>
            <td style="width:140px;"><select class="select select-bookings-filter" name="city">
                    <option value="">Select A City</option>
                    <option value="Any">Any</option>
                </select>
            </td>
            <td style="width:140px;"><select class="select select-bookings-filter" name="property_type">
                    <option value="">Select A Suburb</option>
                    <option value="Any">Any</option>
                </select>
            </td>
            <td style="width:140px;">
                <?php $searchattributes = array('type' => 'submit', 'id'=>'btn', 'style'=>'width:100px'); ?>
                <?php echo Form::input('submit', 'Search', $searchattributes); ?>
            </td>
        </tr>
    </table>
<?php echo Form::close(); ?>
<!-- END LOGIN FORM -->
</div>

<?php
if (is)array($curlresponse)
{
    print_r($curlresponse);
}

//    header('Content-Type: application/json');
//    $est = array();
//    foreach($curlresponse as $myObj){
//        $est[] = $myObj['bb'];
//    }
//
//    $numOfest= count($est);
//
//    for ($i =0; $i <= $numOfest; $i++){
//        foreach ($est as $key => $hotel){
//            if (!is_null($hotel[$i]['bbid'])){
//                echo "{$hotel[$i]['bbid']} - {$hotel[$i]['name']}\n";
//            }
//            $rooms = array();
//            $rooms[] = $hotel[$i]['roomtypes'];
//        }
//        //print_r($rooms);
//        $numOfrooms = count($rooms[0]);
//        //echo "{$numOfrooms}\n";
//
//        //print_r($rooms);
//        for ($idx =0; $idx <= $numOfrooms; $idx++){
//            foreach($rooms as $room){
//                echo "{$room[$idx]['roomtypename']}\n";
//                echo "{$room[$idx]['mealplans'][0]['rates']['pax1']} \n";
//                echo "{$room[$idx]['mealplans'][0]['rates']['pax2']}";
//                //for each room show daily rates
//            }
//        }
//    }
?>

<div id="the_months">
    <div id="12_2014" class="cal_month load_cal">
        <div id="12_2014" class="cal_title">December 2014</div>
        <!-- START CALENDAR MONTHS -->
        <ul>
            <li class="aparname_head">
                <div id="cal_in">Property Name</div>
            </li>
            <li class="nowidth_head">
                <div id="cal_in">Dec</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">1</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">2</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">3</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">4</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">5</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">6</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">7</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">8</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">9</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">10</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">11</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">12</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">13</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">14</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">15</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">16</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">17</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">18</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">19</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">20</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">21</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">22</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">23</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">24</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">25</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">26</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">27</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">28</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">29</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">30</div>
            </li>
            <li class=" modify_head " id="date_">
                <div id="cal_in">31</div>
            </li>
        </ul>
        <!-- END CALENDAR MONTHS -->

        <div class="clear"></div>

        <!-- START CALENDAR NAME AND RATES -->
        <ul>
            <li class="aparname" title="test"><div id="cal_in">The Nelson Villa</div></li>
            <li class="nowidth">&nbsp;</li>
            <li class=" modify  clickable past " id="date_2014-12-01__62" title="1/12/2014 - Available" data-date="1/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked  clickable today " id="date_2014-12-02__62" title="2/12/2014 - Booked" data-date="2/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked  clickable " id="date_2014-12-03__62" title="3/12/2014 - Booked" data-date="3/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked  clickable " id="date_2014-12-04__62" title="4/12/2014 - Booked" data-date="4/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-05__62" title="5/12/2014 - Available" data-date="5/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-06__62" title="6/12/2014 - Available" data-date="6/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-07__62" title="7/12/2014 - Available" data-date="7/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-08__62" title="8/12/2014 - Provisional" data-date="8/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-09__62" title="9/12/2014 - Provisional" data-date="9/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-10__62" title="10/12/2014 - Provisional" data-date="10/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-11__62" title="11/12/2014 - Provisional" data-date="11/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-12__62" title="12/12/2014 - Provisional" data-date="12/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-13__62" title="13/12/2014 - Available" data-date="13/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-14__62" title="14/12/2014 - Available" data-date="14/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-15__62" title="15/12/2014 - Available" data-date="15/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-16__62" title="16/12/2014 - Available" data-date="16/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-17__62" title="17/12/2014 - Available" data-date="17/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-18__62" title="18/12/2014 - Available" data-date="18/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable " id="date_2014-12-19__62" title="19/12/2014 - Provisional" data-date="19/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable weekend " id="date_2014-12-20__62" title="20/12/2014 - Provisional" data-date="20/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify booked_pr  clickable weekend " id="date_2014-12-21__62" title="21/12/2014 - Provisional" data-date="21/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-22__62" title="22/12/2014 - Available" data-date="22/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-23__62" title="23/12/2014 - Available" data-date="23/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-24__62" title="24/12/2014 - Available" data-date="24/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-25__62" title="25/12/2014 - Available" data-date="25/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-26__62" title="26/12/2014 - Available" data-date="26/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-27__62" title="27/12/2014 - Available" data-date="27/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable weekend " id="date_2014-12-28__62" title="28/12/2014 - Available" data-date="28/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-29__62" title="29/12/2014 - Available" data-date="29/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-30__62" title="30/12/2014 - Available" data-date="30/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
            <li class=" modify  clickable " id="date_2014-12-31__62" title="31/12/2014 - Available" data-date="31/12/2014" style="cursor: pointer; visibility: visible; zoom: 1; opacity: 1;">
                <div id="cal_in"><span id="price-color">R4200 </span></div></li>
        </ul>
        <!-- END CALENDAR NAME AND RATES -->

        <div class="clear"></div>

    </div>

</div>

</div>

</div>

</div>

<!-- END CONTENT -->