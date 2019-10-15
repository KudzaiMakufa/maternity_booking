
<style>
		body { margin: 40px; }
		.libspicker {
			cursor: pointer;
			background: #c200ff;
			color: #fff;
			border-radius: 15px;
			width: 15%;
			height: 34px;
			float: left
		}
	</style>

<?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
		<?php echo Asset::js(array(
			'bootstrap-datepicker.js',
		)); ?>
<h2> Visit</h2>
<br>

<?php echo render('visit/_form'); ?>


<p><?php echo Html::anchor('visit', 'Back'); ?></p>
