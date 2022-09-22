<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/odc2/auth/login.php');
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['admin'])) : ?>

                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Employees
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/odc2/employees/list.php">List All</a>
                        <a class="dropdown-item" href="/odc2/employees/create.php">Create New</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        admins
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="/odc2/admin/create.php">Create admin</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['admin'])) : ?>
            <form action="">
                <button name="logout" class="btn btn-danger"> Logout </button>
            </form>
        <?php else : ?>
            <a href="/odc2/auth/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>
        <?php endif; ?>
    </div>
</nav>