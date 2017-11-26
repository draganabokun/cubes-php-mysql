<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span><?php echo htmlspecialchars($oneNews['title']); ?></span>
					</h2>
				</div>
			</div>
		</div>
		<div id="content" class="demos">
			<div class="container">
				<div class="row">
					<!--Blog Roll Content-->
					
					<div class="col-md-8 blog-post">
						<!--Main blog post-->
						<div class="media">
							<img src="/uploads/news/<?php echo htmlspecialchars($oneNews['photo_filename']); ?>" alt="<?php echo htmlspecialchars($oneNews['title']); ?>" class="media-object" />
							<div class="media-body">
								<h1><?php echo htmlspecialchars($oneNews['title']); ?></h1>
								<!-- Meta details -->
								<ul class="list-inline meta text-muted">
									<li>
										<i class="glyphicon glyphicon-calendar"></i>
										<span class="visible-desktop">Created:</span>
										<?php echo htmlspecialchars($oneNews['created_at']); ?>
									</li>
									<li>
										<i class="glyphicon glyphicon-tags"></i> <span class="visible-md-inline visible-lg-inline">Section:</span> 
										<a href="/section.php?id=<?php echo htmlspecialchars($oneNews[section_id]);?>"><?php echo htmlspecialchars($oneNews['section_title']); ?></a>
									</li>
								</ul>
								<p class="lead"><?php echo htmlspecialchars($oneNews['description']); ?></p>
							</div>
						</div>
						<div class="media">
							<?php echo htmlspecialchars($oneNews['content']); ?>
						</div>
					</div>
					<!--Sidebar-->
					<div class="col-md-4 sidebar sidebar-right">
						<div class="inner">
							<div class="block">
								<a href="#" class="btn btn-block btn-info"><i class="fa fa-download"></i> Download Our Press Kit</a>
								<a href="#" class="btn btn-block btn-success"><i class="fa fa-envelope-o"></i> Get In Touch</a>
								<a href="#" class="btn btn-block btn-warning"><i class="fa fa-rss"></i> Subscribe via RSS feed</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>