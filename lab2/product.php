<?php

session_start();

if (!isset($_SESSION["loginSession"])) {
    header("location:login.html");
    // exit();
}

$productFile = fopen("product.txt", "r") or die("file not found");
if ($productFile) {
    while (($line = fgets($productFile))) {
        echo $line."<br>";
    }
    fclose($productFile);
}
?>

<form action="logout.php" action="get">
    <input type="submit" value="logout">
</form>