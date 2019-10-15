<h2>Listing Visits</h2>
<br>
<?php if ($visits): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Patient</th>
			<th>Weight</th>
			<th>Blood pressure</th>
			<th>Temperature</th>
			<th>Foetus position</th>
			<th>Brief notes</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($visits as $item): ?>		<tr>

			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->patient; ?></td>
			<td><?php echo $item->weight; ?></td>
			<td><?php echo $item->blood_pressure; ?></td>
			<td><?php echo $item->temperature; ?></td>
			<td><?php echo $item->foetus_position; ?></td>
			<td><?php echo $item->brief_notes; ?></td>
			<td>
				<?php echo Html::anchor('visit/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('visit/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('visit/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Visits.</p>

<?php endif; ?><p>


</p>
