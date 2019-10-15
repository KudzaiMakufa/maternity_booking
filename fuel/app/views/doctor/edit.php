<h2>Editing Doctor</h2>
<br>

<?php echo render('doctor/_form'); ?>
<p>
	<?php echo Html::anchor('doctor/view/'.$doctor->id, 'View'); ?> |
	<?php echo Html::anchor('doctor', 'Back'); ?></p>
