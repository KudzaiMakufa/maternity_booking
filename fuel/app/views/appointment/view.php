<h2>Viewing #<?php echo $appointment->id; ?></h2>

<p>
	<strong>Date:</strong>
	<?php echo $appointment->date; ?></p>
<p>
	<strong>Time:</strong>
	<?php echo $appointment->time; ?></p>

	<strong>Doctor:</strong>
	<?php echo $appointment->doctor; ?></p>
<p>
	<strong>Read:</strong>
	<?php echo $appointment->isread; ?></p>

<?php echo Html::anchor('appointment/edit/'.$appointment->id, 'Edit'); ?> |
<?php echo Html::anchor('appointment', 'Back'); ?>