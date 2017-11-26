
<div class="col-sm-3">
    <a class="media-photo" href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>">
        <img src="/uploads/news/<?php echo htmlspecialchars($oneNews['photo_filename']); ?>" alt="<?php echo htmlspecialchars($oneNews['title']); ?> " class="media-object img-polaroid" />
    </a>
</div>
<div class="col-sm-9">
    <div class="media-body">
        <!-- Meta details -->
        <ul class="list-inline meta text-muted">
            <li><i class="glyphicon glyphicon-calendar"></i> <span class="visible-md-inline visible-lg-inline">Created:</span> <?php echo htmlspecialchars($oneNews['created_at']); ?></li>
            <li>
                <i class="glyphicon glyphicon-tags"></i> <span class="visible-md-inline visible-lg-inline">Section:</span> 
                <a href="/news-section.php?id=<?php echo htmlspecialchars($oneNews['section_id']); ?>"><?php echo htmlspecialchars($oneNews['section_title']); ?></a>
            </li>
        </ul>
        <h4 class="title media-heading">
            <a href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>"><?php echo htmlspecialchars($oneNews['title']); ?></a>
        </h4>
        <p><?php echo htmlspecialchars($oneNews['description']); ?></p>
        <ul class="list-inline links">
            <li>
                <a href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>" class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    Procitaj
                </a>
            </li>
        </ul>
    </div>
</div>

