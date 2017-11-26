<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>CRUD - Users</span>
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
                    CRUD User - List
                    <a href="/crud-user-insert.php" class="pull-right btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                        New user
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Created At</th>
                            <th class="actions text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td>
                                    #<?php echo htmlspecialchars($user['id']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($user['username']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($user['email']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($user['first_name']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($user['last_name']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($user['created_at']); ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/crud-user-edit.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="/crud-user-delete.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
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