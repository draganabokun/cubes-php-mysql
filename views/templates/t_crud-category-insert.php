		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Categories</span>
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
							CRUD Category - Insert new category
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
									<label class="col-md-3 control-label">Group</label>  
									<div class="col-md-5">
										<select name="group_id" class="form-control">
											<option value="">--- Select Group ---</option>
											<option value="1">Group 1</option>
											<option value="2">Group 3</option>
											<option value="3">Group 4</option>
										</select>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["group_id"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["group_id"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Description</label>  
									<div class="col-md-5">
										<textarea name="description" class="form-control"><?php echo isset($formData["description"]) ? htmlspecialchars($formData["description"]) : "";?></textarea>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["description"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["description"] as $errorMessage) { ?>
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
									<a href="/crud-category-list.php" class="btn btn-default">Cancel</a>
									<button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Insert</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>