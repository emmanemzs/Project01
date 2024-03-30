<?php

session_start();

include("includes/OpenDbConn.php");

$sql = "DELETE FROM P1Books WHERE BookID=7";

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header("Location: select.php")


?>