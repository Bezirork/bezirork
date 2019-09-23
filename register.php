<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.html">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

                            <div class="card-body">
                                <form method="POST" action="./includes/store_reg.php">

                                    <div class="form-group row">
                                        <label for="register_name" class="col-md-4 col-form-label text-md-right">Name</label>

                                        <div class="col-md-6">
                                            <input id="register_name" type="text" class="form-control" name="register_name" autofocus>
                                                <?php
                                                    if(isset($_SESSION['no_names'])) {
                                                        $no_name = $_SESSION['no_names']['no_name'];
                                                        echo "<span class=\"feedback\" role=\"alert\"><strong>$no_name</strong></span>";
                                                        unset($_SESSION['no_names']);
                                                    };
                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="register_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="register_email" type="email" class="form-control" name="register_email" >
                                                 <?php
                                                    if(isset($_SESSION['no_emails'])) {
                                                        $no_email = $_SESSION['no_emails']['no_email'];
                                                        echo "<span class=\"feedback\" role=\"alert\"><strong>$no_email</strong></span>";
                                                        unset($_SESSION['no_emails']);
                                                    };
                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="register_password" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input id="register_password" type="password" class="form-control" name="register_password"  autocomplete="new-password">
                                                <?php
                                                    if(isset($_SESSION['no_passwords'])) {
                                                        $no_password = $_SESSION['no_passwords']['no_password'];
                                                        echo "<span class=\"feedback\" role=\"alert\"><strong>$no_password</strong></span>";
                                                        unset($_SESSION['no_passwords']);
                                                    };
                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                <?php
                                                    if(isset($_SESSION['no_pass_conf_s'])) {
                                                        $no_pass_conf = $_SESSION['no_pass_conf_s']['no_pass_conf'];
                                                        echo "<span class=\"feedback\" role=\"alert\"><strong>$no_pass_conf</strong></span>";
                                                        unset($_SESSION['no_pass_conf_s']);
                                                    };
                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" name="do_register" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
