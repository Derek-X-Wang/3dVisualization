<?php

//Start the session:
session_start();

unset($_SESSION['username']); // Delete the username key

//session_destory(): // Delete all the keys

header('Location: login.php');


?>