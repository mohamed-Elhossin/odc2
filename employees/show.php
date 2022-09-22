<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `joindata`  where empId =$id";
    $s = mysqli_query($connication,  $select);
    $row = mysqli_fetch_assoc($s);
}
auth();
?>
<h1 class="text-center"> Employees : <?= $row['empId'] ?></h1>
<div class="container col-md-3 mt-5">
    <div class="card">
        <img src="/odc2/employees/upload/<?= $row['image'] ?>" class="img-card-top" alt="">
        <div class="card-body">
            <h6>Name :<?= $row['empName'] ?></h6>
            <h6>salary :<?= $row['salary'] ?></h6>
            <h6>phone :<?= $row['phone'] ?></h6>

            <h6>department :<?= $row['depName'] ?></h6>

        </div>
    </div>

</div>


<?php

include '../shared/footer.php'
?>