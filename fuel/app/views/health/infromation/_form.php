<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Patient', 'patient', array('class'=>'control-label')); ?>

				<?php echo Form::input('patient', Input::post('patient', isset($health_infromation) ? $health_infromation->patient : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Patient')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::input('message', Input::post('message', isset($health_infromation) ? $health_infromation->message : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>