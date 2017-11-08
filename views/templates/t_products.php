<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>Svi proizvodi</span> 
						<small>12 proizvoda</small>
					</h2>
				</div>
			</div>
		</div>

		<!-- ======== @Region: #content ======== -->
		<div id="content">
			<div class="container portfolio">
				<ul class="thumbnails row block projects" id="quicksand">
					<?php for($i = 1; $i <= 14; $i ++) {?>
					<li class="col-md-3">
						<?php include __DIR__ . '/t_product_preview.php';?>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="text-center">
				<ul class="pagination pagination-centered">
					<li><a href="#">1</a></li>
					<li class="active"><span>2</span></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
				</ul>
			</div>
		</div>