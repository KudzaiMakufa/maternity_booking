<h2>Listing Health_infromations</h2>
<br>
<?php if ($health_infromations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Patient</th>
			<th>Message</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($health_infromations as $item): ?>		<tr>

			<td><?php echo $item->patient; ?></td>
			<td><?php echo $item->message; ?></td>
			<td>
				<?php echo Html::anchor('health/infromation/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('health/infromation/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('health/infromation/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Health_infromations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('health/infromation/create', 'Add new Health infromation', array('class' => 'btn btn-success')); ?>

</p>
