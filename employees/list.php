<?php
include '../genral/functions.php';
include '../genral/env.php';
include '../shared/header.php';
include '../shared/nav.php';
$select = "SELECT * FROM `joindata` ORDER BY empId  ASC";
$s = mysqli_query($connication,  $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectOne = "SELECT * FROM employees where id =$id";
    $ss = mysqli_query($connication, $selectOne);
    $row = mysqli_fetch_assoc($ss);
    $image =   $row['image'];
    unlink("$image");
    $delete = "DELETE FROM employees WHERE id =$id ";
    mysqli_query($connication, $delete);
    path('employees/list.php#return');
}
auth();
?>
<h1 class="text-center"> list Employees</h1>



<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th> id </th>
                    <th> Name </th>
                    <TH> action</TH>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr id="return">
                        <td><?= $data['empId'] ?> </td>
                        <td><?= $data['empName'] ?> </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn text-light " type="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-info" href="/odc2/employees/update.php?edit=<?= $data['empId'] ?>"> <i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a class="dropdown-item text-danger" onclick="return confirm('are u sure !!')" href="/odc2/employees/list.php?delete=<?= $data['empId'] ?>"> <i class="fa-solid fa-trash-can"></i> </a>
                                    <a class="dropdown-item text-dark" href="/odc2/employees/show.php?show=<?= $data['empId'] ?>"> <i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </td>


                    </tr>
                <?php  } ?>
            </table>
        </div>
    </div>

</div>


<?php

include '../shared/footer.php'
?>