<h2>Editing Visit</h2>
<br>

<?php echo render('visit/_form'); ?>
<p>
	<?php echo Html::anchor('visit/view/'.$visit->id, 'View'); ?> |
	<?php echo Html::anchor('visit', 'Back'); ?></p>
