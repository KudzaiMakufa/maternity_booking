<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

	<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>
	<div align="center">
		<div class="form-group">
			

				<?php echo Form::input('username', Input::post('username', isset($login) ? $login->username : ''), array('class' => 'col-md-6 form-control', 'id'=>'username')); ?>

		</div>
		</div>
		<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('password', Input::post('password', isset($login) ? $login->password : ''), array('class' => 'col-md-4 form-control', 'id'=>'password')); ?>

		</div>
		<div class="form-group" align="center">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Login', array('class' => 'btn btn-primary')); ?>	
			<?php echo Html::anchor('user/register', 'Register', array('class' => 'btn btn-success')); ?>
				</div>
	</fieldset>
<?php echo Form::close(); ?>