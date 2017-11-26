<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Svi proizvodi brenda <?php echo htmlspecialchars($brand['title']); ?></span> 
                <small><?php echo $totalRows; ?> proizvoda</small>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <ul class="thumbnails row block projects" id="quicksand">
            <?php foreach ($products as $product) { ?>
                <li class="col-md-3">
                    <?php include __DIR__ . '/t_product_preview.php'; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="text-center">
        <ul class="pagination pagination-centered">
            <?php for ($i = 1; $i <= $totalPages; $i ++) { ?>
                <?php
                $paginationQueryString = http_build_query(array(
                    'id' => $brand['id'],
                    'page' => $i
                ));
                ?>

                <?php if ($page != $i) { ?>
                    <li>
                        <a 
                            href="/brand.php?<?php echo $paginationQueryString; ?>"
                            >
                                <?php echo $i; ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="active"><span><?php echo $i; ?></span></li>
                        <?php } ?>
                    <?php } ?>
        </ul>
    </div>
</div>