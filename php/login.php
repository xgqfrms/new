<?php 
//

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

echo "succeed!";//





?>