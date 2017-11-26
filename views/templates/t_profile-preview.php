<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Profile</span>
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
                    Profile Preview

                    <div class="btn-group pull-right">

                        <a href="/profile-edit.php" class="btn btn-success">
                            <i class="fa fa-pencil"></i>
                            Edit profile
                        </a>
                        <a href="/profile-change-password.php" class="btn btn-warning">
                            <i class="fa fa-key"></i>
                            Change password
                        </a>
                    </div>
                </h2>
            </div>
        </div>

        <div class="row">
            <div>
                <?php if (!empty($systemMessage)) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo htmlspecialchars($systemMessage); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-5 text-center">
                <i class="fa fa-user" style="font-size: 120px;"></i>
                <h1 class="text-primary"><?php echo htmlspecialchars($user['username']); ?></h1>
            </div>
            <div class="col-md-7">		
                <table class="table table-striped table-hover">
                    <body>
                    <tr>
                        <th>ID</th>
                        <td>#<?php echo htmlspecialchars($user['id']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($user['email']); ?> </td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>