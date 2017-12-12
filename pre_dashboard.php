<?php
session_start();
echo "In pre_dash page";

$_SESSION['userId'] = $user_id;
$_SESSION['userName'] = $username;


?> 