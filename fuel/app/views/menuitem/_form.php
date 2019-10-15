<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($menuitem) ? $menuitem->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Url', 'url', array('class'=>'control-label')); ?>

				<?php echo Form::input('url', Input::post('url', isset($menuitem) ? $menuitem->url : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Url')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Role', 'role', array('class'=>'control-label')); ?>

				<?php echo Form::input('role', Input::post('role', isset($menuitem) ? $menuitem->role : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Role')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Class', 'class', array('class'=>'control-label')); ?>

				<?php echo Form::input('class', Input::post('class', isset($menuitem) ? $menuitem->class : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Class')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>