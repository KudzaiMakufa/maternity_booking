<h2>Listing Messages</h2>
<br>
<?php if ($messages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Patient</th>
			<th>Message</th>
			<th>Viewed ?</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($messages as $item): ?>		<tr>

			<td><?php echo $item->patient; ?></td>
			<td><?php echo $item->message; ?></td>
			<td><?php 
				if($item->isread == 0){
					echo "Unread"; 
				}
				else{
					echo "Opened";
				}
			
			?></td>
			<td>
				<?php echo Html::anchor('message/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('message/edit/'.$item->id, 'mark as read',array('onclick' => "return confirm('mark as read ?')")); ?> |
				<?php echo Html::anchor('message/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?><p>


</p>
