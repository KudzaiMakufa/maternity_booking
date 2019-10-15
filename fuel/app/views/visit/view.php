<h2>Viewing #<?php echo $visit->id; ?></h2>

<p>
	<strong>Date:</strong>
	<?php echo $visit->date; ?></p>
<p>
	<strong>Patient:</strong>
	<?php echo $visit->patient; ?></p>
<p>
	<strong>Weight:</strong>
	<?php echo $visit->weight; ?></p>
<p>
	<strong>Blood pressure:</strong>
	<?php echo $visit->blood_pressure; ?></p>
<p>
	<strong>Temperature:</strong>
	<?php echo $visit->temperature; ?></p>
<p>
	<strong>Foetus position:</strong>
	<?php echo $visit->foetus_position; ?></p>
<p>
	<strong>Brief notes:</strong>
	<?php echo $visit->brief_notes; ?></p>

<?php echo Html::anchor('visit/edit/'.$visit->id, 'Edit'); ?> |
<?php echo Html::anchor('visit', 'Back'); ?>