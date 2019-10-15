<h2>Viewing #<?php echo $maternity->id; ?></h2>

<p>
	<strong>First name:</strong>
	<?php echo $maternity->first_name; ?></p>
<p>
	<strong>Surname:</strong>
	<?php echo $maternity->surname; ?></p>
<p>
	<strong>Date of birth:</strong>
	<?php echo $maternity->date_of_birth; ?></p>
<p>
	<strong>Phone number:</strong>
	<?php echo $maternity->phone_number; ?></p>
<p>
	<strong>Nationality:</strong>
	<?php echo $maternity->nationality; ?></p>
<p>
	<strong>Occupation:</strong>
	<?php echo $maternity->occupation; ?></p>

	<strong>National id:</strong>
	<?php echo $maternity->national_id; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $maternity->address; ?></p>
<p>
	<strong>Next of kin:</strong>
	<?php echo $maternity->next_of_kin; ?></p>
<p>
	<strong>Phone no:</strong>
	<?php echo $maternity->phone_no; ?></p>

<?php echo Html::anchor('maternity/edit/'.$maternity->id, 'Edit'); ?> |
<?php echo Html::anchor('maternity', 'Back'); ?>