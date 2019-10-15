<h2>Viewing #<?php echo $booking->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $booking->name; ?></p>
<p>
	<strong>Pregnancy number:</strong>
	<?php echo $booking->pregnancy_number; ?></p>
<p>
	<strong>Conception date:</strong>
	<?php echo $booking->conception_date; ?></p>
<p>
	<strong>Child birth date:</strong>
	<?php echo $booking->child_birth_date; ?></p>
<p>
	<strong>Brief medical history:</strong>
	<?php echo $booking->brief_medical_history; ?></p>

<?php echo Html::anchor('booking/edit/'.$booking->id, 'Edit'); ?> |
<?php echo Html::anchor('booking', 'Back'); ?>