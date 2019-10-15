<h2>Listing Bookings</h2>
<br>
<?php if ($bookings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Pregnancy number</th>
			<th>Conception date</th>
			<th>Child birth date</th>
			<th>Brief medical history</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bookings as $item): ?>		<tr>

			
			<td><?php echo $item->pregnancy_number; ?></td>
			<td><?php echo $item->conception_date; ?></td>
			<td><?php echo $item->child_birth_date; ?></td>
			<td><?php echo $item->brief_medical_history; ?></td>
			<td>
				<?php echo Html::anchor('booking/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('booking/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('booking/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bookings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('booking/create', 'Add new Booking', array('class' => 'btn btn-success')); ?>

</p>
