<?php
session_destroy();
setcookie ("User", '');
header("Location: index.php");
?>