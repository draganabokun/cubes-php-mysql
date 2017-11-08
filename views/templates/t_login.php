<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>Login</span>
			</h2>
		</div>
	</div>
</div>
<div id="content" class="demos">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form class="form-horizontal" action="" method="post">

					<input type="hidden" name="task" value="login">

					<fieldset>

						<!-- Form Name -->
						<legend>Please log in!</legend>

						<div class="form-group">
							<label class="col-md-3 control-label">Username</label>  
							<div class="col-md-5">
								<input type="text" name="username" placeholder="Enter your username" class="form-control">
							</div>
							<div class="col-md-4">
								<?php if (!empty($formErrors["username"])) { ?>
									<ul style="color: red">
										<?php foreach ($formErrors["username"] as $errorMessage) { ?>
											<li class="error"><?php echo $errorMessage; ?></li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>  
							<div class="col-md-5">
								<input type="password" name="password" placeholder="Enter your password" class="form-control">
							</div>
							<div class="col-md-4">
								<?php if (!empty($formErrors["password"])) { ?>
									<ul style="color: red">
										<?php foreach ($formErrors["password"] as $errorMessage) { ?>
											<li class="error"><?php echo $errorMessage; ?></li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
						</div>

					</fieldset>
					<fieldset>
						<legend></legend>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Login</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>

	</div>
</div>