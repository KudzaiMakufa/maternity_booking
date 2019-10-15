
<style>
#patient_code{
	width : 85% ;
}
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



<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
	<?php echo Form::label('Patient', 'Patient', array('class'=>'control-label')); ?>
	
	<div class="form-group">
			

			<?php echo Form::input('patient', Input::post('patient', isset($message) ? $message->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'patient','type'=>'hidden')); ?>
					<?php echo Form::input('patient_code', Input::post('patient_code', isset($message) ? $message->patient : ''), array('class' => 'col-md-4 form-control', 'id'=>'patient_code','disabled'=>'disabled')); ?>
					<span class="input-group-addon libspicker" onclick="viewPatients()">Pick</span>
	
			</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($message) ? $message->message : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
	<?php echo render('message/_pickPatient'); ?>
	<script>
	function viewPatients()
 		{
			$('#viewBranches').modal();
		}
	</script>
<?php echo Form::close(); ?>