<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';
$error = "";
$errorColor = "";
if (isset($_POST['login'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $newPassword = sha1($password);
    $select = "SELECT * FROM admins where name ='$name' and password = '$newPassword'";
    $s  = mysqli_query($connication, $select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if ($numRows == 1) {
        echo "True admin";
        $_SESSION['admin'] = [
            'adminName' => $name,
            'role'=>$row['role'],
        ];
    } else {
        $error =  "Wrong Data";
        $errorColor = "red";
    }
}



// if (isset($_SESSION['admin'])) {
//     path('/');
// }

print_r($_SESSION);
?>
<!-- 
 -->

<h1 class="text-center">Login </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Admin Name : <span class="text-danger"><?= $error ?></span></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Admin Password <span class="text-danger"><?= $error ?></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="text" name="password">
                </div>

                <button name="login" class="btn btn-info"> login </button>

            </form>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php';
?>