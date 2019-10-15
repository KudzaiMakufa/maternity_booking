<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		
		<div class="form-group">
			<?php echo Form::label('Pregnancy number', 'pregnancy_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('pregnancy_number', Input::post('pregnancy_number', isset($booking) ? $booking->pregnancy_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pregnancy number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Conception date', 'conception_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('conception_date', Input::post('conception_date', isset($booking) ? $booking->conception_date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Conception date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Child birth date', 'child_birth_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('child_birth_date', Input::post('child_birth_date', isset($booking) ? $booking->child_birth_date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Child birth date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Brief medical history', 'brief_medical_history', array('class'=>'control-label')); ?>

				<?php echo Form::input('brief_medical_history', Input::post('brief_medical_history', isset($booking) ? $booking->brief_medical_history : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Brief medical history')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>