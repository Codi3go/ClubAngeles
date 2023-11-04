<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../styles/register_student.css" type="text/css" />
    <link rel="stylesheet" href="../styles/background_style.css" type="text/css" />
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <div class="container mt-3 text-center">
        <div class="row justify-content-center">
            <?php if (isset($_SESSION["register_success"])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["register_success"]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION["register_success"]);
            } ?>
            <?php if (!isset($_SESSION["username"])) {
                header("Location: ../pages/welcome.php");
            } ?>
            <div class="register-student-form col">
                <h3 class="mb-4">Register Student</h3>
                <form method="post" action="../tasks/do_register.php">
                    <div class="row">
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="Last name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" placeholder="Movil" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <select class="form-select" required>
                            <option selected disabled value="">Document</option>
                            <option value="ti">TI</option>
                            <option value="cc">CC</option>
                        </select>
                        <div class="valid-feedback">You selected a position!</div>
                        <div class="invalid-feedback">Please select a position!</div>
                    </div>
                    <div class="input-group date mb-2" data-provider="datepicker">
                        <input placeholder="Birth date" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" placeholder="Address" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="EPS" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="Allergic" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <h3 class="mt-3">Attendant</h3>
                    <div class="row">
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="Name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col mb-2">
                            <input type="email" class="form-control" placeholder="Movil" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary" name="do_register" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/register.js" type="text/javascript"></script>
</body>

</html>