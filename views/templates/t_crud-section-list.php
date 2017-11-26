<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>CRUD - Sections</span>
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
                    CRUD Section - List
                    <a href="/crud-section-insert.php" class="pull-right btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                        New section
                    </a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($systemMessage)) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo htmlspecialchars($systemMessage); ?>
                    </div>
                <?php } ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th class="actions text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section) { ?>
                            <tr>
                                <td>
                                    #<?php echo htmlspecialchars($section['id']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($section['title']); ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/crud-section-edit.php?id=<?php echo htmlspecialchars($section['id']); ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="/crud-section-delete.php?id=<?php echo htmlspecialchars($section['id']); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>