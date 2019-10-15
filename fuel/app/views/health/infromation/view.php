<h2>Viewing #<?php echo $health_infromation->id; ?></h2>

<p>
	<strong>Patient:</strong>
	<?php echo $health_infromation->patient; ?></p>
<p>
	<strong>Message:</strong>
	<?php echo $health_infromation->message; ?></p>

<?php echo Html::anchor('health/infromation/edit/'.$health_infromation->id, 'Edit'); ?> |
<?php echo Html::anchor('health/infromation', 'Back'); ?>