<div class="">
	<div class="project">
		<a class="lnk-polaroid" href="/product.php?id=<?php echo $product['id'];?>">
			<img 
				class="img-polaroid img-responsive"
				src="/uploads/products/<?php echo htmlspecialchars($product['photo_filename']);?>" 
				alt="<?php echo htmlspecialchars($product['title']);?>"
			>
		</a>
		<h3 class="title">
			<a href="/product.php?id=<?php echo $product['id'];?>">
				<?php echo htmlspecialchars($product['brand_title']);?> 
				- 
				<?php echo htmlspecialchars($product['title']);?>
			</a>
		</h3>
		<div class="row">
			<h4 class="col-xs-5">
				<small>
					<a href="/category.php?id=<?php echo $product['category_id'];?>">
						<?php echo htmlspecialchars($product['category_title']);?>
					</a>
				</small>
			</h4>
			<h4 class="col-xs-7 text-right">
				<?php echo htmlspecialchars($product['price']);?> din
			</h4>
		</div>
	</div>
</div>