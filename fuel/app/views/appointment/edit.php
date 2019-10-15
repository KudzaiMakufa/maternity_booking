<h2>Editing Appointment</h2>
<br>

<?php echo render('appointment/_form'); ?>
<p>
	<?php echo Html::anchor('appointment/view/'.$appointment->id, 'View'); ?> |
	<?php echo Html::anchor('appointment', 'Back'); ?></p>
