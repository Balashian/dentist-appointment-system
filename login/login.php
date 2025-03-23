<?php
session_start();
include("../config.php");
if (isset($_POST["user_name"]) && isset($_POST["password"])) {
    $user_name = $_POST["user_name"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["user_name"] === $user_name && $row["password"] === $password) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["user_name"] = $row["user_name"];
            $_SESSION["tc"] = $row["tc"];
            $_SESSION["s_name_surname"] = $row["name_surname"];
            if ($user_name === "admin" && $password === "a986f1f418819a9514ed0d759299c402") {
                header("Location: ../admin/index.php");
                exit();
            }
            header("Location: ../user/index.php");
            exit();
        } else {
            header("Location: ../index.php?error=Incorrect username or password");
            exit();
        }
    } else {
        header("Location: ../index.php?error=Incorrect username or password");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>