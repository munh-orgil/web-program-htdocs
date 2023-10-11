<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    if ($_POST["username"] == "munhorgil" && $_POST["password"] == "se21d03") {
        $_SESSION["loginSession"] = "1";
        header("location:product.php");
    } else {
        header("location:login.html");
    }
}
?>