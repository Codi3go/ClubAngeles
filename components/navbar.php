<nav class="navbar  bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand">Club Angeles</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "Admin") {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='../pages/register_student.php'>Register</a>
                    </li>
                    ";
                } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Student
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../Angeles/pages/register_student.php">Register Student</a></li>
                        <li><a class="dropdown-item" href="../../Angeles/pages/membership.php">Membership Status</a></li>
                        <li><a class="dropdown-item" href="../../Angeles/pages/sanctions.php">Sanctions</a></li>
                        <li><a class="dropdown-item" href="#">Cancel Registration</a></li>
                        <li><a class="dropdown-item" href="#">Student Progress</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Teacher
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Register Student</a></li>
                        <li><a class="dropdown-item" href="#">Membership Status</a></li>
                        <li><a class="dropdown-item" href="#">Sanctions</a></li>
                        <li><a class="dropdown-item" href="#">Cancel Registration</a></li>
                        <li><a class="dropdown-item" href="#">Student Progress</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Search</a>
                </li>
            </ul>
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                </button>
                <ul class="dropdown-menu  dropdown-menu-lg-end">
                    <li><a class="dropdown-item" href="#">Edit profile</a></li>
                    <li><a class="dropdown-item" href="#">About</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../Angeles/tasks/do_logout.php">Log out</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>