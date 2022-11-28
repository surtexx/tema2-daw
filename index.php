<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
	</head>

	<body>

        <form action="login.php" method="post">

        <h2>Login to your account</h2>
	<?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <input type="text" name="user" placeholder="User"><br>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

        </form>

	</body>
</html>
