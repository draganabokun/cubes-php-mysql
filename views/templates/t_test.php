		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Brand</span>
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
							CRUD Brand - List
							<a href="/crud-brand-insert.php" class="pull-right btn btn-success">
								<i class="fa fa-plus-circle"></i>
								Novi brend
							</a>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">		
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Website url</th>
									<th class="actions text-center">Website url</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 1; $i <= 10; $i ++) {?>
								<tr>
									<td>
										#1
									</td>
									<td>
										title
									</td>
									<td>
										website url
									</td>
									<td class="text-center">
										<div class="btn-group">
											<a href="/crud-brand-edit.php" class="btn btn-default"><i class="fa fa-pencil"></i></a>
											<a href="/crud-brand-delete.php" class="btn btn-default"><i class="fa fa-trash"></i></a>
										</div>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="pagination pagination-centered">
							<li><a href="#">1</a></li>
							<li class="active"><span>2</span></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>