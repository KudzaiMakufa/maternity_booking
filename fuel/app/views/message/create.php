
<?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
		<?php echo Asset::js(array(
			'bootstrap-datepicker.js',
		)); ?>
<h2>New Message</h2>
<br>

<?php echo render('message/_form'); ?>


<p><?php echo Html::anchor('message', 'Back'); ?></p>
