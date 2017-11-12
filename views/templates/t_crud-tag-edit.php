<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>CRUD - Tags</span>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    CRUD Tags - Edit tag #<?php echo htmlspecialchars($tag['id']); ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" class="form-horizontal">
                    <input type="hidden" name="task" value="save">

                    <fieldset>
                        <legend></legend>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>  
                            <div class="col-md-5">
                                <input type="text" name="title" value="<?php echo isset($formData["title"]) ? htmlspecialchars($formData["title"]) : ""; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["title"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["title"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <legend></legend>
                        <div class="form-group text-right">
                            <a href="/crud-tag-list.php" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>