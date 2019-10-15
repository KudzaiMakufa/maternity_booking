<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group" align="center">

			<?php echo Form::label('Name', 'name', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

				<div class="col-md-7 col-sm-9 col-xs-12" >

				<?php echo Form::input('name', Input::post('name', isset($doctor) ? $doctor->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>