<h2>Viewing #<?php echo $doctor->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $doctor->name; ?></p>

<?php echo Html::anchor('doctor/edit/'.$doctor->id, 'Edit'); ?> |
<?php echo Html::anchor('doctor', 'Back'); ?>