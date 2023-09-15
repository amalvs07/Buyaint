<?php

SESSION_START();

if(isset($_SESSION['auth']))
{
	session_destroy();
	echo '<script>alert("LOGOUT SUCCESFULLY");</script>';
	echo '<script>window.location.href = "index.php";</script>';
}
else
{	session_destroy();
	echo '<script>alert("LOGOUT SUCCESFULLY");</script>';
	echo '<script>window.location.href = "index.php";</script>';
}


?>