<h2>Editing Booking</h2>
<br>

<?php echo render('booking/_form'); ?>
<p>
	<?php echo Html::anchor('booking/view/'.$booking->id, 'View'); ?> |
	<?php echo Html::anchor('booking', 'Back'); ?></p>
