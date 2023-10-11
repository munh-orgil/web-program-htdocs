<?php
    $sessionString = $_COOKIE["sessions"];
    $sessions = explode("___", $sessionString);

    foreach ($sessions as $key) {
        $sessions[$key] = 1;
    }
    print_r($sessions)
?>