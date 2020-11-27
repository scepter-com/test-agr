<?php

use app\DataBase;
require_once 'app/DataBase.php';
$data_base = new DataBase();
$query = "SELECT * FROM users";
$statement = $data_base->getPDO()->query($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create user</title>

    <link rel="stylesheet" href="resources/styles/app.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/ajax.js"></script>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-create">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input-group">
                                        <input type="text" class="form-control" id="usernameInput" placeholder="Username" aria-label="Username" maxlength="255">
                                    </div>
                                    <div class="form-input-group">
                                        <input type="text" class="form-control" id="displayNameInput" placeholder="Display name" aria-label="DisplayName" maxlength="255">
                                    </div>
                                    <div class="status-group">
                                        <button type="submit" class="btn btn-primary" onclick="createUser()">Create
                                            user
                                        </button>
                                        <div class="status" id="status">status</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input-group">
                                        <textarea class="form-control" aria-label="With textarea" id="descriptionInput" rows="10" placeholder="Description" maxlength="1000"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--users table-->

                    <div class="users-table">
                        <div class="container">
                            <?php
                            while ($row = $statement->fetch())
                            {

                                ?>

                                <div class="row user-row">
                                    <div class="col-3"><?php echo $row['username']; ?></div>
                                    <div class="col-3"><?php echo $row['display_name']; ?></div>
                                    <div class="col-6"><?php echo substr($row['description'], 0, 100); ?> ... </div>
                                </div>

                                <?php

                            }
                            ?>
                        </div>
                    </div>

                    <!--users table-->

                </div>
            </div>
        </div>
    </div>
</body>
</html>
