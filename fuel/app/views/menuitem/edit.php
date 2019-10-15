<h2>Editing Menuitem</h2>
<br>

<?php echo render('menuitem/_form'); ?>
<p>
	<?php echo Html::anchor('menuitem/view/'.$menuitem->id, 'View'); ?> |
	<?php echo Html::anchor('menuitem', 'Back'); ?></p>
