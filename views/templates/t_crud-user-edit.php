		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Users</span>
					</h2>
				</div>
			</div>
		</div>

		<!-- ======== @Region: #content ======== -->
		<div id="content">
			<div class="container portfolio">
				<div class="row">
					<div class="col-md-12">
						<h2>
							CRUD User - Edit user #<?php echo htmlspecialchars($user['id']);?>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" class="form-horizontal">
							<input type="hidden" name="task" value="save">
							
							<fieldset>
								<legend>Credentials</legend>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Username</label>  
									<div class="col-md-5">
										<input value="<?php echo isset($formData["username"]) ? htmlspecialchars($formData["username"]) : "";?>" type="text" name="username" class="form-control">
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
							</fieldset>
							<fieldset>
								<legend>Personal data</legend>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Email</label>  
									<div class="col-md-5">
										<input value="<?php echo isset($formData["email"]) ? htmlspecialchars($formData["email"]) : "";?>" type="email" name="email" class="form-control">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["email"])) { ?>
										<ul style="color: red">
											<?php foreach ($formErrors["email"] as $errorMessage) { ?>
											<li class="error"><?php echo $errorMessage; ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">First name</label>  
									<div class="col-md-5">
										<input value="<?php echo isset($formData["first_name"]) ? htmlspecialchars($formData["first_name"]) : "";?>" type="text" name="first_name" class="form-control">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["first_name"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["first_name"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Last name</label>  
									<div class="col-md-5">
										<input value="<?php echo isset($formData["last_name"]) ? htmlspecialchars($formData["last_name"]) : "";?>" type="text" name="last_name" class="form-control">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["last_name"])) { ?>
										<ul style="color: red">
											<?php foreach ($formErrors["last_name"] as $errorMessage) { ?>
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
									<a href="/crud-user-list.php" class="btn btn-default">Cancel</a>
									<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>