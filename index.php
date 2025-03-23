<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://kit.fontawesome.com/beb9a053e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: #f2f7ff;">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <form autocomplete="off" action="login/login.php" method="post" class="p-3 rounded-2 bg-white shadow-lg">
            <div class="mb-3">
                <label for="login_InputUserName1" class="form-label">Username</label>
                <input type="text" name="user_name" class="form-control" id="login_InputUserName1"
                    aria-describedby="userNameHelp" required>
            </div>
            <div class="mb-3">
                <label for="login_InputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="login_InputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <div id="accountHelp" class="form-text">Don't have account? <a href="signup.php" class="text-primary"
                    style="text-decoration: none;">Sign Up</a></div>
            <div id="wrongHelp" class="form-text text-danger text-center">
                <?php
                if (isset($_GET["error"])){
                    echo $_GET["error"];
                }
                ?>
                </div>
            </form>
        </div>
    </body>

    </html>