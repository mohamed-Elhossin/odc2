<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

if (isset($_POST['add'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $newpassword = sha1($password);
    $insert = "INSERT INTO admins value(null , '$name' , '$newpassword' ,$role)";
    $p = mysqli_query($connication, $insert);
    testMessage($p, "insert Admin");
}

if ($_SESSION['admin']['role'] != 0) {
    path('404.php');
}
?>
<!-- 
 -->

<h1 class="text-center">Add admin </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Admin Name </label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Admin Password </label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="">Admin Role </label>
                    <select name="role" id="" class="form-control">
                        <option value="0">All access</option>
                        <option value="1">semi access</option>

                    </select>
                </div>
                <button name="add" class="btn btn-info"> Add Admin </button>

            </form>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php';
?>