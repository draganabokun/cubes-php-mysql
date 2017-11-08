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
				<!--Portfolio feature item-->
				<div class="row">
					<div class="col-md-12">
						<h2>
							CRUD Category - List
							<a href="/crud-category-insert.php" class="pull-right btn btn-success">
								<i class="fa fa-plus-circle"></i>
								New category
							</a>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">		
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Group</th>
									<th class="actions text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($categories as $category) {?>
								<tr>
									<td>
										#<?php echo htmlspecialchars($category['id']);?>
									</td>
									<td>
										<?php echo htmlspecialchars($category['title']);?>
									</td>
									<td>
										<?php echo htmlspecialchars($category['group_title']);?>
									</td>
									<td class="text-center">
										<div class="btn-group">
											<a href="/crud-category-edit.php?id=<?php echo htmlspecialchars($category['id']);?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
											<a href="/crud-category-delete.php?id=<?php echo htmlspecialchars($category['id']);?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
										</div>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>