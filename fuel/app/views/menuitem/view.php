<h2>Viewing #<?php echo $menuitem->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $menuitem->name; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $menuitem->url; ?></p>
<p>
	<strong>Role:</strong>
	<?php echo $menuitem->role; ?></p>
<p>
	<strong>Class:</strong>
	<?php echo $menuitem->class; ?></p>

<?php echo Html::anchor('menuitem/edit/'.$menuitem->id, 'Edit'); ?> |
<?php echo Html::anchor('menuitem', 'Back'); ?>