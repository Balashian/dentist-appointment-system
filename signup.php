<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/beb9a053e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/signup.js"></script>
</head>

<body style="background-color: #f2f7ff;">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <form autocomplete="off" method="post" class="p-3 rounded-2 bg-white shadow-lg">
            <div class="mb-3">
                <label for="signup_InputTc1" class="form-label">TCKN</label>
                <input type="text" name="tc" class="form-control" id="signup_InputTc1" aria-describedby="tcHelp"
                    required minlength="11" maxlength="11">
                <div id="tcHelp" class="form-text">Enter your identity number registered in the system</div>
            </div>
            <div class="mb-3">
                <label for="signup_InputUserName1" class="form-label">Username</label>
                <input type="text" name="user_name" class="form-control" id="signup_InputUserName1"
                    aria-describedby="userNameHelp" required>
            </div>
            <div class="mb-3">
                <label for="signup_InputPassword1" class="form-label">Password</label>
                <input type="password" name="password" minlength="6" class="form-control" id="signup_InputPassword1"
                    required>
            </div>
            <button type="submit" name="signUpSubmit" class="btn btn-primary">Sign Up</button>
            <div id="accountHelp" class="form-text">Already have account? <a href="index.php" class="text-primary"
                    style="text-decoration: none;">Sign In</a></div>
        </form>
        <?php
        if (isset($_POST["signUpSubmit"])) {
            $tc = $_POST["tc"];
            $user_name = $_POST["user_name"];
            $password = md5($_POST["password"]);
            $sql = "SELECT user_name FROM users WHERE user_name='$user_name'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                echo '<script type="text/javascript">'
                    , 'userNameTaken();'
                    , '</script>';
            } else {
                $sql = "SELECT * FROM patients WHERE tckn='$tc'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $s_name_surname = $row["name_surname"];
                    $sql = "INSERT INTO `users`(`user_name`, `password`, `tc`, `name_surname`) VALUES ('$user_name','$password','$tc', '$s_name_surname')";
                    if (mysqli_query($conn, $sql) === TRUE) {
                        echo '<script type="text/javascript">'
                            , 'signUpSuccessful();'
                            , '</script>';
                    } else {
                        echo '<script type="text/javascript">'
                            , 'signUpFailed();'
                            , '</script>';
                    }
                }
                else{
                    echo '<script type="text/javascript">'
                            , 'signUpWrongTC();'
                            , '</script>';
                }
            }
        }
        ?>
    </div>
</body>

</html>