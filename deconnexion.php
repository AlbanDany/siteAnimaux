<?php
session_start();
unset ($_SESSION['User']);
unset ($_SESSION['erreur']);
session_destroy();
header("Location: index.php");
?>