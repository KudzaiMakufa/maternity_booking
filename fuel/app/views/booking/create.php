<head>


	 <?php  echo Asset::js('jquery.min.js'); ?>
	 <?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
 	<?php echo Asset::js(array(
    	'bootstrap-datepicker.js',
    )); ?>

<h2>New Booking</h2>
<br>

<?php echo render('booking/_form'); ?>


<p><?php echo Html::anchor('booking', 'Back'); ?></p>
