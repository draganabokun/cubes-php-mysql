<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>CRUD - News</span>
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
                    CRUD News - Edit news #<?php echo htmlspecialchars($oneNews['id']); ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="task" value="save">                                
                    <fieldset>
                        <legend>General Data</legend>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Section</label>  
                            <div class="col-md-5">
                                <select name="section_id" class="form-control">
                                    <option value="">--- Select Section ---</option>
                                    <?php foreach ($sectionList as $sectionId => $sectionTitle) { ?>
                                        <option 
                                            value="<?php echo htmlspecialchars($sectionId); ?>"

                                            <?php if ($sectionId == $formData['section_id']) { ?>
                                                selected="selected"
                                            <?php } ?>

                                            ><?php echo htmlspecialchars($sectionTitle); ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["section_id"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["section_id"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

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

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>  
                            <div class="col-md-5">
                                <textarea name="description" class="form-control" rows="5"><?php echo isset($formData["description"]) ? htmlspecialchars($formData["description"]) : ""; ?></textarea>
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["description"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["description"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Photo</legend>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">              
                                <img src="/uploads/news/<?php echo htmlspecialchars($oneNews['photo_filename']); ?>" class="img-responsive">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Change Photo</label>  
                            <div class="col-md-5">
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["photo"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["photo"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Content</legend>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <textarea name="content" class="form-control" rows="30"><?php echo isset($formData["content"]) ? htmlspecialchars($formData["content"]) : ""; ?></textarea>
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["content"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["content"] as $errorMessage) { ?>
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
                            <a href="/crud-news-list.php" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>