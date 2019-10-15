
<style>
#patient_code{
	width : 85% ;
}
</style>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($visit) ? $visit->date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Date')); ?>

		</div>
		<?php echo Form::label('Patient First Name', 'patient', array('class'=>'control-label')); ?>
		<div class="form-group">
			

		<?php echo Form::input('patient', Input::post('patient', isset($visit) ? $visit->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'patient','type'=>'hidden')); ?>
				<?php echo Form::input('patient_code', Input::post('patient_code', isset($visit) ? $visit->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'patient_code','disabled'=>'disabled')); ?>
				<span class="input-group-addon libspicker" onclick="viewPatients()">Pick</span>

		</div>
		
		<div class="form-group">
		<?php echo Form::label('Patient Surname', 'patient', array('class'=>'control-label')); ?>
				<?php echo Form::input('surname', Input::post('patient_code', isset($visit) ? $visit->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'surname','disabled'=>'disabled')); ?>
			

		</div>

		<div class="form-group">
		<?php echo Form::label('Patient Phone Number', 'patient', array('class'=>'control-label')); ?>
				<?php echo Form::input('surname', Input::post('patient_code', isset($visit) ? $visit->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'phone_no','disabled'=>'disabled')); ?>
			
		</div>
		<div class="form-group">
		<?php echo Form::label('Patient Id Number', 'patient', array('class'=>'control-label')); ?>
				<?php echo Form::input('surname', Input::post('patient_code', isset($visit) ? $visit->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'id_no','disabled'=>'disabled')); ?>
			

		</div>
		<div class="form-group">
			<?php echo Form::label('Weight', 'weight', array('class'=>'control-label')); ?>

				<?php echo Form::input('weight', Input::post('weight', isset($visit) ? $visit->weight : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Weight')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Blood pressure', 'blood_pressure', array('class'=>'control-label')); ?>

				<?php echo Form::input('blood_pressure', Input::post('blood_pressure', isset($visit) ? $visit->blood_pressure : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Blood pressure')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Temperature', 'temperature', array('class'=>'control-label')); ?>

				<?php echo Form::input('temperature', Input::post('temperature', isset($visit) ? $visit->temperature : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Temperature')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Foetus position', 'foetus_position', array('class'=>'control-label')); ?>

				<?php echo Form::input('foetus_position', Input::post('foetus_position', isset($visit) ? $visit->foetus_position : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Foetus position')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Brief notes', 'brief_notes', array('class'=>'control-label')); ?>

				<?php echo Form::input('brief_notes', Input::post('brief_notes', isset($visit) ? $visit->brief_notes : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Brief notes')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
	<?php echo render('visit/_pickPatient'); ?>
	<script>
	function viewPatients()
 		{
			$('#viewBranches').modal();
		}
	</script>
	
<?php echo Form::close(); ?>