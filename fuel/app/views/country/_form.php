<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Country code', 'country_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('country_code', Input::post('country_code', isset($country) ? $country->country_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Country code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Country name', 'country_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('country_name', Input::post('country_name', isset($country) ? $country->country_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Country name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>