<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

auth();
if (isset($_GET['search'])) {
    $name = $_GET['name'];
    $select = "SELECT * FROM `joindata` where empName like '%$name%' ";
    $s = mysqli_query($connication,  $select);
}
?>
<h1 class="text-center"> list Employees</h1>

<label> Search</label>
<form action="./search.php">
    <div class="col-2 form-group">
        <input type="text" name="name" class="form-control">
    </div>
    <button class="btn btn-info"> Search </button>
</form>


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
                    </tr>
                <?php  } ?>
            </table>
        </div>
    </div>

</div>


<?php

include '../shared/footer.php'
?>