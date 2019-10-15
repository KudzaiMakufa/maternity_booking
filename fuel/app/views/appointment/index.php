<h2>Listing Appointments</h2>
<br>
<?php if ($appointments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Doctor</th>
			<th>Viewed</th>
			
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($appointments as $item): ?>		<tr>

			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->time; ?></td>
			<td><?php echo $item->doctor; ?></td>
			<td><?php
			if($item->isread == 1){
				echo "Opened" ; 
			} 
			else
			{
				echo "Unread" ; 
			}
			 ?></td>
			
			
			
			<td>
				<?php echo Html::anchor('appointment/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('appointment/edit/'.$item->id, 'mark as read', array('onclick' => "return confirm('Mark as read ??')")); ?> |
				<?php echo Html::anchor('appointment/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Appointments.</p>

<?php endif; ?><p>
	

</p>
