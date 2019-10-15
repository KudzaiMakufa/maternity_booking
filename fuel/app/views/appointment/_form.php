

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<?php echo Form::label('Patient Name', 'user_id', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('user_id', Input::post('user_id', isset($appointment) ? $appointment->user_id : ''), array('class' => 'col-md-4 form-control', 'id'=>'user_id','type'=>'hidden')); ?>

				<?php echo Form::input('user_id_code', Input::post('user_id_code', isset($appointment) ? $appointment->user_id : ''), array('class' => 'col-md-4 form-control', 'id'=>'user_id_code','disabled'=>'disabled')); ?>

				<span class="input-group-addon libspicker" onclick="viewPatients2()">Pick</span>

		</div>

		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($appointment) ? $appointment->date : ''), array('class' => 'col-md-4 form-control datepicker', 'placeholder'=>'Date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Time', 'time', array('class'=>'control-label')); ?>

				<?php echo Form::input('time', Input::post('time', isset($appointment) ? $appointment->time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Time')); ?>

		</div>


		<?php echo Form::label('Doctor', 'doctor', array('class'=>'control-label')); ?>
		
		<div class="form-group">

			

			<?php echo Form::input('doctor', Input::post('doctor', isset($appointment) ? $appointment->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'doctor','type'=>'hidden')); ?>
				<?php echo Form::input('doctor_code', Input::post('doctor_code', isset($appointment) ? $appointment->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'doctor_code','disabled'=>'disabled')); ?>
				<span class="input-group-addon libspicker" onclick="viewPatients()">Pick</span>


			

				

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
	<?php echo render('appointment/_pickDoctor'); ?>
	<?php echo render('appointment/_pickPatient'); ?>
	<script>
	function viewPatients()
 		{
			$('#viewDoctors').modal();
		}
	function viewPatients2()
 		{
			$('#viewBranches').modal();
		}
	</script>


<?php echo Form::close(); ?>