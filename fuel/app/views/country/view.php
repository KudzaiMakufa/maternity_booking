<h2>Viewing #<?php echo $country->id; ?></h2>

<p>
	<strong>Country code:</strong>
	<?php echo $country->country_code; ?></p>
<p>
	<strong>Country name:</strong>
	<?php echo $country->country_name; ?></p>

<?php echo Html::anchor('country/edit/'.$country->id, 'Edit'); ?> |
<?php echo Html::anchor('country', 'Back'); ?>