<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>PHP Simple capthca - RollCode.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	</head>

	<body>
		<div>
			<header>
				<h1>PHP Simple capthca - RollCode.com</h1>
			</header>
			
			<div>
				<img src="captcha.php" /> 
				<form action="captcha-validate.php" method="post">
					<input type="text" name="answer" placeholder="Enter captcha here" />
					<input type="submit" value="CHECK" />
					<input type="button" onclick="window.location.href = window.location.href" value="Reload" />					
				</form>

			</div>

			<footer>
				<p>
					<a href="http://rollcode.com">RollCode</a>
				</p>
			</footer>
		</div>
	</body>
</html>
