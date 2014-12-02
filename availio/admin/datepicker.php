<!--DATE PICKER-->
<script type="text/javascript" src="js/datepicker/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/datepicker/jquery-ui-1.10.1.min.js"></script>
<link rel="stylesheet" href="css/nigran.datepicker.css">
<link rel="stylesheet" href="css/jquery-ui-1.10.1.css" >

<script>
	$(function() {
		$( "#date-picker-input-1" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd',
			showOtherMonths: true,
			showOn: 'both',
			buttonImage: 'css/images/cal_logo.png'
		})
		
		$( "#date-picker-input-2" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd',
			showOtherMonths: true,
			showOn: 'both',
			buttonImage: 'css/images/cal_logo.png'
		})
					
		.datepicker('widget').wrap('<div class="ll-skin-nigran"/>');
	});
</script>

<!--<input type="text" id="date-picker-input-1" />-->