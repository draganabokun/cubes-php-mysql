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
							CRUD Brand - Delete category #<?php echo htmlspecialchars($category['id']);?>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" class="form-horizontal">
							<input type="hidden" name="task" value="delete">
							
							<fieldset>
								<legend>Are you sure you want to delete category?</legend>
								
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3 jumbotron">
										<strong>
											#<?php echo htmlspecialchars($category['id']);?> - 
											<?php echo htmlspecialchars($category['title']);?>
										</strong>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend></legend>
								<div class="form-group text-right">
									<a href="/crud-category-list.php" class="btn btn-default">Cancel</a>
									<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>