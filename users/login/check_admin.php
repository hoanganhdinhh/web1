<?php
session_start();
if ($_SESSION["Authorised"] != "Y" || $_SESSION["Admin"] != "Y") {
    header("Location: Notauthorised.php");
    exit;
}
?>
