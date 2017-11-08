		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Brands</span>
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
							CRUD Brand - Insert new brand
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" class="form-horizontal">
							<input type="hidden" name="task" value="insert">
							
							<fieldset>
								<legend></legend>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Title</label>  
									<div class="col-md-5">
										<input value="<?php echo isset($formData["title"]) ? htmlspecialchars($formData["title"]) : "";?>" type="text" name="title" class="form-control">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["title"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["title"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Website Url</label>  
									<div class="col-md-5">
										<input type="url" name="website_url" class="form-control" value="<?php echo isset($formData["website_url"]) ? htmlspecialchars($formData["website_url"]) : "";?>">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["website_url"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["website_url"] as $errorMessage) { ?>
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
									<a href="/crud-brand-list.php" class="btn btn-default">Cancel</a>
									<button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Insert</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>