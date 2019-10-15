<h2>Viewing #<?php echo $message->id; ?></h2>

<p>
	<strong>Patient:</strong>
	<?php echo $message->patient; ?></p>
<p>
	<strong>Message:</strong>
	<?php echo $message->message; ?></p>

<?php echo Html::anchor('message/edit/'.$message->id, 'Edit'); ?> |
<?php echo Html::anchor('message', 'Back'); ?>