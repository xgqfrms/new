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
	<title>Login Page</title>
	<script src="../js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<div class="container_login" id="container_login">
		<label for="">login</label>
		<div class="login_form" id="login_form">
			<form id="l_form" class="l_form" action="../php/login.php" method="post">
			    <label for="">identity:</label>
			    <select name="identity" id="identity">
			    	<option value="student" selected="">student</option>
			    	<option value="teacher">teacher</option>
			    	<option value="admin">administrator</option>
			    </select><br>
				<label for="">username:</label>
				<input type="text" id="username" name="username"><br>
				<label for="">password:</label>
				<input type="password" id="password" name="password">
				<a href="../php/rest_pwd.php">forget password</a><br>
				<!-- 验证码 -->
				<label for="textcode">captchar:</label> 
			    <input type="text" name="textcode" id="textcode" /> 
			    <img id="imgcode" src="../php/verifycode.php" alt="验证码" /> 
			    <a href="javascript:refresh_code()">看不清？换一个</a><br>
			    <input type="reset" value="reset">
			    <!-- <input type="submit" name="submit" id="submit" value="提交" />  -->
				<input type="submit" value="login" name="submit" id="submit">
			</form>
			<!-- button -->
			<button class="login_button" id="login_button">
				hello button!
			</button>
		</div>
	</div>
<?php 
	// echo $_POST["username"];
	//生成随机数！
	echo rand();

	if(isset($_REQUEST['authcode'])){
	  session_start();
	  if(strtilower($_REQUEST['authcode'])==$_SESSION['authcode']){
	     echo'<font color="#0000CC">输入正确！</font>';
	  }else{
	      echo'<font color="#0000CC">输入error！</font>';
	  }
	  exit();
	}

	echo "succeed!";
?>
	<div class="javascript_container">
		<script > 
		 function refresh_code() 
		 { 
		  l_form.imgcode.src="../php/verifycode.php?a="+Math.random(); 
		 } 
		</script>
	</div>
</body>
</html>