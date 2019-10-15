<h2>Listing Countries</h2>
<br>
<?php if ($countries): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Country code</th>
			<th>Country name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($countries as $item): ?>		<tr>

			<td><?php echo $item->country_code; ?></td>
			<td><?php echo $item->country_name; ?></td>
			<td>
				<?php echo Html::anchor('country/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('country/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('country/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Countries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('country/create', 'Add new Country', array('class' => 'btn btn-success')); ?>

</p>
