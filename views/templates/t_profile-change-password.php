<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Profile - Change Password</span>
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
                    Change Password
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
                            <label class="col-md-3 control-label">New Password</label>  
                            <div class="col-md-5">
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["password"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["password"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm new Password</label>  
                            <div class="col-md-5">
                                <input type="password" name="confirm_password" value="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <?php if (!empty($formErrors["confirm_password"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["confirm_password"] as $errorMessage) { ?>
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
                            <a href="/profile-preview.php" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-warning"><i class="fa fa-key"></i> Change Password</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>