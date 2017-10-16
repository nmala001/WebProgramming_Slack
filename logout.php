<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: http://localhost/slack/index.php");
exit;
?>