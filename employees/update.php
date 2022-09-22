<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectEmployee = "SELECT * FROM `joindata` where empId =$id ";
    $employee =   mysqli_query($connication, $selectEmployee);
    $row = mysqli_fetch_assoc($employee);
    if (isset($_POST['update'])) {
        $name = $_POST["empName"];
        $salary = $_POST["empSalary"];
        $phone = $_POST["empPhone"];
        $depId = $_POST["depId"];
        // Image code
        if (empty($_FILES['image']['name'])) {
            $image_name = $row['image'];
        } else {
            $image_name = time()  . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "./upload/$image_name";
            move_uploaded_file($tmp_name, $location);
        }


        $update = "UPDATE employees SET name ='$name' ,salary=$salary , phone='$phone' , `image` = '$image_name',departmentId=$depId where id =$id";
        mysqli_query($connication, $update);
        path("employees/list.php");
    }
}

$selectDep = "SELECT * FROM department";
$departments = mysqli_query($connication,  $selectDep);
auth();
?>

<h1 class="text-center"> Update Employees </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input class="form-control" value="<?= $row['empName'] ?>" type="text" name="empName">
                </div>
                <div class="form-group">
                    <label for="">Employee salary</label>
                    <input class="form-control" value="<?= $row['salary'] ?>" type="text" name="empSalary">
                </div>
                <div class="form-group">
                    <label for="">Employee phone</label>
                    <input class="form-control" value="<?= $row['phone'] ?>" type="text" name="empPhone">
                </div>
                <div class="form-group">
                    <label for="">Employee Profile : <img width="30" src="/odc2/employees/upload/<?= $row['image'] ?>"></label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="">Employee Department : </label>
                    <select class="form-control" type="text" name="depId">
                        <option selected value="<?= $row['depid'] ?> "> <?= $row['depName'] ?> </option>
                        <?php foreach ($departments as $data) { ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                        <?php  } ?>
                    </select>
                </div>

                <button name="update" class="btn btn-info"> update </button>

            </form>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php';
?>