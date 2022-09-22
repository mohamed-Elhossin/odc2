<?php


$connication = mysqli_connect("localhost", 'root', '', 'odc2');
// Insert;


// 
$select = "SELECT * FROM `joindata`";
$s = mysqli_query($connication,  $select);

$selectDep = "SELECT * FROM department";
$departments = mysqli_query($connication,  $selectDep);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM employees WHERE id =$id ";
    mysqli_query($connication, $delete);
    header("location: index.php");
}
$name = "";
$salary = "";
$phone = "";
$depid = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $selectEmployee = "SELECT * FROM employees where id =$id ";
    $employee =   mysqli_query($connication, $selectEmployee);
    $row = mysqli_fetch_assoc($employee);
    $name = $row['name'];
    $salary = $row['salary'];
    $phone = $row['phone'];
    $depid = $row['departmentId'];

    if (isset($_POST['update'])) {
        $name = $_POST["empName"];
        $salary = $_POST["empSalary"];
        $phone = $_POST["empPhone"];
        $depId = $_POST["depId"];
        $update = "UPDATE employees SET name ='$name' ,salary=$salary , phone='$phone',departmentId=$depId where id =$id";
        mysqli_query($connication, $update);
        header("location: index.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Employee Name</label>
                        <input class="form-control" value="<?= $name ?>" type="text" name="empName">
                    </div>
                    <div class="form-group">
                        <label for="">Employee salary</label>
                        <input class="form-control" value="<?= $salary ?>" type="text" name="empSalary">
                    </div>
                    <div class="form-group">
                        <label for="">Employee phone</label>
                        <input class="form-control" value="<?= $phone ?>" type="text" name="empPhone">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Department : <?= $depid ?> </label>
                        <select class="form-control" type="text" name="depId">
                            <?php foreach ($departments as $data) { ?>

                                <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <?php if ($update) : ?>
                        <button name="update" class="btn btn-primary"> Update </button>
                    <?php else : ?>
                        <button name="send" class="btn btn-info"> Send </button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th> id </th>
                        <th> Name </th>
                        <th> Salary </th>
                        <th> Phone </th>
                        <th> Dempartment </th>
                        <TH> action</TH>
                    </tr>
                    <?php foreach ($s as $data) { ?>
                        <tr>
                            <td><?= $data['empId'] ?> </td>
                            <td><?= $data['empName'] ?> </td>
                            <td><?= $data['salary'] ?> </td>
                            <td><?= $data['phone'] ?> </td>
                            <td><?= $data['depName'] ?> </td>
                            <td> <a class="btn btn-info" href="index.php?edit=<?= $data['empId'] ?>"> Update </a> </td>
                            <td> <a class="btn btn-danger" href="index.php?delete=<?= $data['empId'] ?>"> Delete </a> </td>
                        </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>

    </div>


</body>

</html>