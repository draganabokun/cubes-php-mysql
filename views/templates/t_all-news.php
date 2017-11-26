<!-- ======== @Region: #highlighted ======== -->
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>Sve vesti</span>
                                                <small><?php echo $totalRows; ?> vest&#40i&#41</small>
					</h2>
				</div>
			</div>
		</div>
		<div id="content" class="demos">
			<div class="container">
				<div class="row">
					<!--Blog Roll Content-->
					<div class="col-md-8 blog-list">
						<!-- Blog post -->
                                          
                              
						<?php foreach ($news as $oneNews) {?>
						<div class="media row">
							<?php include __DIR__ . '/t_one-news-preview.php'; ?>
                                                </div>
						<?php }?>
						
						
						<div class="text-center">
                                                    <ul class="pagination pagination-centered">
                                                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                                            <?php if ($page != $i) { ?>
                                                                <li><a href="/all-news.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php } else { ?>
                                                                <li class="active"><span><?php echo $i; ?></span></li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                    </ul>
						</div>
					</div>
					<!--Sidebar-->
					<div class="col-md-4 sidebar sidebar-right">
						<div class="inner">
							<div class="block">
								<span class="btn btn-block btn-info"><i class="fa fa-download"></i> Download Our Press Kit</span>
								<span class="btn btn-block btn-success"><i class="fa fa-envelope-o"></i> Get In Touch</span>
								<span class="btn btn-block btn-warning"><i class="fa fa-rss"></i> Subscribe via RSS feed</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>