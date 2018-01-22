<?php
session_start();
$_SESSION['loggued_on_user'] = "";
session_destroy();
include('message.html');
echo "Au revoir !";
 ?>
