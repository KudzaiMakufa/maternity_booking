<head>
	<?php  echo Asset::js('jquery.min.js'); ?>
	 <?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
 	<?php echo Asset::js(array(
    	'bootstrap-datepicker.js',
    )); ?>
<style>
		body { margin: 40px; }
		.libspicker {
			cursor: pointer;
			background: #c200ff;
			color: #fff;
			border-radius: 15px;
			width: 15%;
			height: 34px;
			float: left
		}

		#doctor_code,#user_id_code{
			width : 85% ;
		}

	</style>
</head>
<h2>New Appointment</h2>
<br>

<?php echo render('appointment/_form'); ?>


<p><?php echo Html::anchor('appointment', 'Back'); ?></p>
