<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<?php echo Asset::css('bootstrap.css'); ?>
		<!-- lets attach css files -->
		<?php echo Asset::css(array(
			'bootstrap.min.css',
			'font-awesome/css/font-awesome.min.css',
			//'custom/custom.min.css',
			//'custom/libs-patch.css'
		)); ?>
		<?php  echo Asset::js('jquery.min.js'); ?>
		<?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
		<?php echo Asset::js(array(
			'bootstrap-datepicker.js',
		)); ?>
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


	</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
		
<?php echo $content; ?>
		</div>
		<footer>
			<p class="pull-right">Add Company motto</p>
			<p>
				<a href="#">Belvedere Maternity Hospital</a> is released under the MIT license.<br>
				
			</p>
		</footer>
	</div>
	<!-- lets attach some javascript -->
    <?php echo Asset::js(array(
    	'bootstrap.min.js',
    	'fastclick.js',
    	'nprogress.js',
    	'custom.min.js'
    )); ?>

<script>
	$(function(){
		$(".datepicker").datepicker(
		{ 
			format: 'yyyy-mm-dd',
			autoclose: true,
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: 15, // Creates a dropdown of 15 years to control year
		
		}
		
		);
		
	});
</script>
</body>
</html>
