<style>
		#nationality_code {
			width : 85% ;
		}
</style>
<?php echo Form::open(array("class"=>"form-horizontal" , "autocomplete"=>"off" )); ?>

	<fieldset>
		<div class="form-group" >
			<?php echo Form::label('First name', 'first_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('first_name', Input::post('first_name', isset($maternity) ? $maternity->first_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'First name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Surname', 'surname', array('class'=>'control-label')); ?>

				<?php echo Form::input('surname', Input::post('surname', isset($maternity) ? $maternity->surname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Surname')); ?>

		</div>
		<div class="form-group" >
			<?php echo Form::label('Date of birth', 'date_of_birth', array('class'=>'control-label')); ?>

				<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($maternity) ? $maternity->date_of_birth : ''), array('class' => 'col-md-4 form-control datepicker', 'id'=>'datepicker-input')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone number', 'phone_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone_number', Input::post('phone_number', isset($maternity) ? $maternity->phone_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password ', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enter Preffered Password','type'=>'password')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Confirm Password ', 'confirm', array('class'=>'control-label')); ?>

				<?php echo Form::input('confirm', Input::post('confirm'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Confirm Password','type'=>'password')); ?>

		</div>
		<?php echo Form::label('Nationality', 'nationality', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('nationality', Input::post('nationality', isset($maternity) ? $maternity->nationality : ''), array('class' => 'col-md-4 form-control', 'id'=>'nationality', 'type'=>'hidden')); ?>
				<?php echo Form::input('nationality_code', Input::post('nationality_code', isset($maternity) ? $maternity->nationality : ''), array('class' => 'col-md-4 form-control', 'id'=>'nationality_code', 'disabled'=>'disabled')); ?>
				<span class="input-group-addon libspicker" onclick="viewBranches()">Pick</span>
		</div>
		<div class="form-group">
			<?php echo Form::label('Email Address', 'email_address', array('class'=>'control-label')); ?>

				<?php echo Form::input('occupation', Input::post('occupation', isset($maternity) ? $maternity->occupation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Occupation')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pregrancy number', 'pregrancy_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('pregrancy_number', Input::post('pregrancy_number', isset($maternity) ? $maternity->pregrancy_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pregrancy number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Conception date', 'conception_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('conception_date', Input::post('conception_date', isset($maternity) ? $maternity->conception_date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Conception date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Child birth date', 'child_birth_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('child_birth_date', Input::post('child_birth_date', isset($maternity) ? $maternity->child_birth_date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Child birth date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('National id', 'national_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('national_id', Input::post('national_id', isset($maternity) ? $maternity->national_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'National id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

				<?php echo Form::input('address', Input::post('address', isset($maternity) ? $maternity->address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Next of kin', 'next_of_kin', array('class'=>'control-label')); ?>

				<?php echo Form::input('next_of_kin', Input::post('next_of_kin', isset($maternity) ? $maternity->next_of_kin : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Next of kin')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone no', 'phone_no', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone_no', Input::post('phone_no', isset($maternity) ? $maternity->phone_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone no')); ?>

		</div>
		<div class="form-group" align="center">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Submit Booking Request', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
	<?php echo render('maternity/_pickCountry'); ?>
	<script>
	function viewBranches()
 		{
			$('#viewBranches').modal();
		}
	</script>
<?php echo Form::close(); ?>