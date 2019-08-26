<!DOCTYPE html>
<html>
<head>
	<title>Try</title>
	<Style>
		.alert{
			display: none;
		}
	</Style>
	<script type="text/javascript" src="<?php echo base_url('assets/bs/jquery-3.min.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bs/css/bootstrap.min.css');?>">
	<script type="text/javascript" src="<?php echo base_url('assets/bs/js/bootstrap.min.js');?>"></script>
</head>
<body>
	<div class="container">
		<center><h2>CODEIGNITER</h2></center>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-xs-12"></div>
				<div class="col-md-4 col-xs-4 col-xs-12">
					<div class="alert alert-primary" role="alert">
  						Data Inserted Successfully
					</div>
					<form method="post" id="form_data">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
							<?php
								echo form_error('username');
							?>
							<label>Email</label>
							<input type="text" name="email" id="email" class="form-control" placeholder="Email">
							<?php
								echo form_error('email');
							?>
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							<?php
								echo form_error('password');
							?>
							<label>User Type</label>
							<select class="form-control" name="utype" id="utype">
								<option value="">--select--</option>
								<option value="0">Users</option>
								<option value="1">Animals</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-ms btn-success" id="btn-log">Save</button>
							<a href="<?php echo base_url('login')?>" id="signup">Login?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('submit','#form_data',function(e){
				e.preventDefault();
				var username = $('#username').val();
				var email = $('#email').val();
				var password = $('#password').val();
				var type = $('#utype').val();
				$.ajax({
					url: "<?php echo base_url() . 'Mj/insert'?>",
					method: 'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(response){
						$('#form_data')[0].reset();
						$('.alert').fadeIn('slow');
						$('.alert').fadeOut('3000');
					}
				});
			});
		});
	</script>
</html>