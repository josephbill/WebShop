<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>


	<p>Logged in
      <?php
          if (isset($_GET['logged'])) {
          	# code...
          	if (isset($_SESSION['activeuser'])) {
          		# code...
          		echo $_SESSION['activeuser'];
          		session_unset();
          		session_destroy();
          } else {
          	echo $_SESSION['activeuser'];
          }

        }

      ?>

	</p>
	<form action="../authentication/logout.php" method="post">
		<input type="submit" name="logout" id="logout" value="logout">
	</form>

</body>
</html>