<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="chrome=1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
		<!--favicon.icon-->
		<link href="../images/favicon.jpg" rel="shortcut icon" type="image/x-icon">
		<!--media query-->
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
		<link rel="stylesheet" href="../css/style.css">
		<title>HTMLSpecialChars PHP</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
	</head>
</head>
<body>
<?php
$str = "John & 'Adams'";
echo htmlspecialchars($str, ENT_COMPAT);
echo "<br/>";
echo htmlspecialchars($str, ENT_QUOTES);
echo "<br/>";
echo htmlspecialchars($str, ENT_NOQUOTES);
echo "<br/>";
// annotation
echo "
ENT_COMPAT - (默认)仅编码 双引号。<br/>　　
ENT_QUOTES - 编码 双引号和单引号。<br/>　
ENT_NOQUOTES - 不编码 任何引号。<br/>
";
?>
</body>
</html>