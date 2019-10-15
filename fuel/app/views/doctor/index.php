<h2>Listing Doctors</h2>
<br>
<?php if ($doctors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($doctors as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				<?php echo Html::anchor('doctor/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('doctor/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('doctor/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Doctors.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('doctor/create', 'Add new Doctor', array('class' => 'btn btn-success')); ?>

</p>
