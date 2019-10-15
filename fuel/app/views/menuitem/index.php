<h2>Listing Menuitems</h2>
<br>
<?php if ($menuitems): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Url</th>
			<th>Role</th>
			<th>Class</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($menuitems as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->url; ?></td>
			<td><?php echo $item->role; ?></td>
			<td><?php echo $item->class; ?></td>
			<td>
				<?php echo Html::anchor('menuitem/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('menuitem/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('menuitem/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Menuitems.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('menuitem/create', 'Add new Menuitem', array('class' => 'btn btn-success')); ?>

</p>
