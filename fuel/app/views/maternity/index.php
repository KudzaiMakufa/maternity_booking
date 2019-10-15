<h2>Listing Maternities</h2>
<br>
<?php if ($maternities): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>First name</th>
			<th>Surname</th>
			
			<th>Phone number</th>
			<th>Nationality</th>
			
			<th>National id</th>
			
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($maternities as $item): ?>		<tr>

			<td><?php echo $item->first_name; ?></td>
			<td><?php echo $item->surname; ?></td>
		
			<td><?php echo $item->phone_number; ?></td>
			<td><?php echo $item->nationality; ?></td>
			
			
			<td><?php echo $item->national_id; ?></td>
			
			<td>
				<?php echo Html::anchor('maternity/view/'.$item->id, 'View More'); ?> |
				<?php echo Html::anchor('maternity/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('maternity/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Maternities.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('maternity/create', 'Add new Maternity', array('class' => 'btn btn-success')); ?>

</p>
