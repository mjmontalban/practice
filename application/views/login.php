<!DOCTYPE html>
<html>
<head>
	<title>Try</title>
	<script type="text/javascript" src="<?php echo base_url('assets/bs/jquery-3.min.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bs/css/bootstrap.min.css');?>">
	<script type="text/javascript" src="<?php echo base_url('assets/bs/js/bootstrap.min.js');?>"></script>
</head>
<body>
	<center><h4>CODEIGNITER</h4></center>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-xs-12"></div>
				<div class="col-md-4 col-xs-4 col-xs-12">
					<form method="post" action="#" id="form-data">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-success" id="btn-log">Sign In</button>
							<a href="<?php echo base_url('')?>register" id="signup">Create account?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>