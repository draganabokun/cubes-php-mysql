		<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>CRUD - Groups</span>
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
							CRUD Group - List
							<a href="#" class="pull-right btn btn-success">
								<i class="fa fa-plus-circle"></i>
								New group
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
									<th class="actions text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 1; $i <= 10; $i ++) {?>
								<tr>
									<td>
										#<?php echo $i;?>
									</td>
									<td>
										Title <?php echo $i;?>
									</td>
									<td class="text-center">
										<div class="btn-group">
											<a href="#" class="btn btn-default"><i class="fa fa-pencil"></i></a>
											<a href="#" class="btn btn-default"><i class="fa fa-trash"></i></a>
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