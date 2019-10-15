<h2>Editing Health_infromation</h2>
<br>

<?php echo render('health/infromation/_form'); ?>
<p>
	<?php echo Html::anchor('health/infromation/view/'.$health_infromation->id, 'View'); ?> |
	<?php echo Html::anchor('health/infromation', 'Back'); ?></p>
