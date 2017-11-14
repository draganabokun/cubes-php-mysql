		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Products</span>
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
							CRUD Product - Insert new product
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
							<input type="hidden" name="task" value="insert">
							
							<fieldset>
								<legend>General Data</legend>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Category</label>  
									<div class="col-md-5">
										<select name="category_id" class="form-control">
											<option value="">--- Select Category ---</option>
											<?php foreach ($categoryList as $categoryId => $categoryLabel) {?>
											<option 
												value="<?php echo htmlspecialchars($categoryId);?>"
												
												<?php if($categoryId == $formData['category_id']) {?>
												selected="selected"
												<?php }?>
												
												><?php echo htmlspecialchars($categoryLabel);?></option>
											<?php }?>
										</select>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["category_id"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["category_id"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Brand</label>  
									<div class="col-md-5">
										<select name="brand_id" class="form-control">
											<option value="">--- Select Brand ---</option>
											<?php foreach ($brandList as $brandId => $brandTitle) {?>
											<option 
												value="<?php echo htmlspecialchars($brandId);?>"
												
												<?php if($brandId == $formData['brand_id']) {?>
												selected="selected"
												<?php }?>
												
												><?php echo htmlspecialchars($brandTitle);?></option>
											<?php }?>
										</select>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["brand_id"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["brand_id"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
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
							</fieldset>
							<fieldset>
								<legend>Pricing</legend>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Price</label>  
									<div class="col-md-5">
										<div class="input-group">
											<input value="<?php echo isset($formData["price"]) ? htmlspecialchars($formData["price"]) : "";?>" type="text" name="price" class="form-control">
											<div class="input-group-addon"> din.</div>
										</div>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["price"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["price"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">On Sale</label>  
									<div class="col-md-5">
										<label><input name="on_sale" type="radio" value="1" <?php if (isset($formData['on_sale']) && $formData['on_sale'] == 1) {echo "checked";} ?> > Yes</label>
										<label><input name="on_sale" type="radio" value="0" <?php if (isset($formData['on_sale']) && $formData['on_sale'] == 0) {echo "checked";} ?> > No</label>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["on_sale"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["on_sale"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Discount</label>  
									<div class="col-md-5">
										<div class="input-group">
											<input value="<?php echo isset($formData["discount"]) ? htmlspecialchars($formData["discount"]) : "";?>" type="text" name="discount" class="form-control">
											<div class="input-group-addon">%</div>
										</div>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["discount"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["discount"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Photo</legend>
								<div class="form-group">
									<label class="col-md-3 control-label">Photo</label>  
									<div class="col-md-5">
										<input type="file" name="photo" class="form-control">
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["photo"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["photo"] as $errorMessage) { ?>
													<li class="error"><?php echo $errorMessage; ?></li>
												<?php } ?>
											</ul>
										<?php } ?>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Details</legend>
								<div class="form-group">
									<label class="col-md-3 control-label">Description</label>  
									<div class="col-md-5">
										<textarea name="description" class="form-control" rows="5"><?php echo isset($formData["description"]) ? htmlspecialchars($formData["description"]) : "";?></textarea>
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
								<div class="form-group">
									<label class="col-md-3 control-label">Specification</label>  
									<div class="col-md-5">
										<textarea name="specification" class="form-control" rows="5"><?php echo isset($formData["specification"]) ? htmlspecialchars($formData["specification"]) : "";?></textarea>
									</div>
									<div class="col-md-4">
										<?php if (!empty($formErrors["specification"])) { ?>
											<ul style="color: red">
												<?php foreach ($formErrors["specification"] as $errorMessage) { ?>
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
									<a href="/crud-product-list.php" class="btn btn-default">Cancel</a>
									<button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Insert</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>