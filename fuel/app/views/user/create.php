<style>
#nationality_code {
			width :75% ;
		}

.hero .hero-content {
	padding-top: 15%;
}

.hero h1 {
	font-size: 40px;
}

.control-label {
	color: #fff;
}
.libspicker {
	cursor: pointer;
	background: #c200ff;
    color: #fff;
    border-radius: 15px;
	width: 25%;
	height: 50px;
    float: left
}
#branch_code,#payment_term {
	width: 75%;
    float: left;
}
</style>


<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div class="hero-content text-center">
				<h1 class="landing-h1" style="">Maternity User Sign Up</h1>
			</div>
		</div>
	</div>

	<!-- alerts -->

	<style>
		div.alert p {
			padding: 0;
			line-height: 1;
		}
	</style>
	<div class="row">
		<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error(s) encountered:</strong>
				<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<!-- /alerts -->

	<form class="form-horizontal" method="post">
		<div class="row landing-wrapper" style="min-height: 300px; padding: 20px 0 5px 0;">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">First name</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php
								
								?>
							<?php echo Form::input('first_name', Input::post('first_name', isset($maternity) ? $maternity->first_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'First name')); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Last name</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo Form::input('surname', Input::post('surname', isset($maternity) ? $maternity->surname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Surname')); ?>
						</div>
					</div>
						
				</div>
			</div>
					
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Email address </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo Form::input('occupation', Input::post('occupation', isset($maternity) ? $maternity->occupation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email Address')); ?>
						</div>
					</div>
							
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Mobile number </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo Form::input('phone_number', Input::post('phone_number', isset($maternity) ? $maternity->phone_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone number')); ?>
						</div>
					</div>
				</div>
						
			</div>
			<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12">Address </label>
								<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::textarea('address', Input::post('address', isset($maternity) ? $maternity->address : ''), array('class' => ' form-control input-sm2 btn-block', 'rows' =>2, 'placeholder'=>'Address')); ?>
									
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12">Nationality </label>
								<div class="col-md-7 col-sm-7 col-xs-12">
									

										<?php echo Form::input('nationality', Input::post('nationality', isset($maternity) ? $maternity->nationality : ''), array('class' => 'col-md-4 form-control', 'id'=>'nationality', 'type'=>'hidden')); ?>
										<?php echo Form::input('nationality_code', Input::post('nationality_code', isset($maternity) ? $maternity->nationality : ''), array('class' => 'col-md-4 form-control', 'id'=>'nationality_code', 'disabled'=>'disabled')); ?>
										<span class="input-group-addon libspicker" onclick="viewBranches()">Pick</span>
										
								</div>
							</div>
							
					  </div>
						
			</div>
	
			<div class="row">
			<div class="col-md-6">
						<div class="form-group">
						<?php echo Form::label('Date of birth', 'date_of_birth', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>


						

						
							<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($maternity) ? $maternity->date_of_birth : ''), array('class' => 'col-md-4 form-control datepicker', 'id'=>'datepicker-input')); ?>
							</div>
						</div>
					</div>

				
				<div class="col-md-6">
					<div class="form-group">

					<?php echo Form::label('National ID Number', 'national_id', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

				
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo Form::input('national_id', Input::post('national_id', isset($maternity) ? $maternity->national_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'National id')); ?>
						</div>
					</div>
				</div>
						
			</div>
					
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">

					<?php echo Form::label('Next of kin', 'next_of_kin', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

					
						
						<div class="col-md-7 col-sm-7 col-xs-12">

								
						<?php echo Form::input('next_of_kin', Input::post('next_of_kin', isset($maternity) ? $maternity->next_of_kin : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Next of kin')); ?>
						</div>

					
					</div>
							
				</div>
				<div class="col-md-6">
					<div class="form-group">

					<?php echo Form::label('Confirm Password ', 'confirm', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

						<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::input('confirm', Input::post('confirm'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Confirm Password','type'=>'password')); ?>
						</div>
					</div>
							
				</div>
						
			</div>
			<div class="row">
				
			<div class="col-md-6">
					<div class="form-group">

					<?php echo Form::label('Next of Kin Phone no', 'phone_no', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

				
					
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo Form::input('phone_no', Input::post('phone_no', isset($maternity) ? $maternity->phone_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Next of Kin Phone no')); ?>
						</div>
					</div>
				</div>
				
					<div class="col-md-6">
						<div class="form-group">

						<?php echo Form::label('Choose a password ', 'password', array('class'=>'control-label col-md-4 col-sm-4 col-xs-12')); ?>

				
							
							<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('password', Input::post('password'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enter Prefered Password','type'=>'password')); ?>
							</div>
					</div>
					</div>
						
			</div>	
			
						
			
				
								
	
								
			</div>
			<div class="row form-actions text-center landing-text-center" style="margin-top: 20px;">
					<button type="submit" class="btn btn-primary btn-lg btn-cta">Signup</button>
					<a href="<?php echo Uri::create('/'); ?>">
						<button type="button" class="btn btn-fill btn-lg btn-cta">Cancel</button>
					</a>
			</div>
		</div>
	</form>
	
</div>
<!-- Modal -->
 <?php //echo render('user/_pickBranch'); ?>
 <?php //echo render('user/_pickPaymentTerm'); ?>
<?php //echo Asset::js('country.js'); ?>

<?php echo render('maternity/_pickCountry'); ?>
	<script>
	function viewBranches()
 		{
			$('#viewBranches').modal();
		}
	</script>
<script>
	populateCountries("country", "state","district");
	populateStates("country", "state","district");

	

</script>
<script>
	
	
	function check()
	{
		var nat_id = document.getElementById('nat_id').value;
		
		if(nat_id.length==2||nat_id.length==9||nat_id.length==11)
		{
			document.getElementById('nat_id').value+='-';
		}
		
	}
	
 		function viewBranches()
 		{
			$('#viewBranches').modal();
		}
		function viewPayments()
 		{
			$('#viewPayments').modal();
		}
		
		
</script>