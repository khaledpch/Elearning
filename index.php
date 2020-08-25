<?php
	
	
	require("admin/conx.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM admins
								WHERE pseudo='$uname' AND pass='$pwd'") or die(mysql_error());
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login Fail!.....";	
					else
						header("location: admin/index.php");
						
					session_start();
	
		$_SESSION['pseudo'] = $_POST['unametxt'];
			}
			
			else
					echo "<script>alert('pseudo or password is incorrect!')</script>";
}

?>
<?php
	
	
	require("admin/conx.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM `tuteurs`
								WHERE pseudo='$uname' AND pass='$pwd'") or die(mysql_error());
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login Fail!.....";	
					else
						header("location: tuteur/Home-01.php");
						
					session_start();
	
		$_SESSION['pseudo'] = $_POST['unametxt'];
			}
			
			else
					echo "<script>alert('pseudo or password is incorrect!')</script>";
}

?>
<?php
	
	
	require("admin/conx.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM ` apprenants`
								WHERE pseudo='$uname' AND password='$pwd'") or die(mysql_error());
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login Fail!.....";	
					else
						header("location: apprenant/Home-01.php");
						
					session_start();
	
		$_SESSION['pseudo'] = $_POST['unametxt'];
			}
			
			else
					echo "<script>alert('pseudo or password is incorrect!')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Karmanta - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Karmanta, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login </title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="post" action="index.php"  >        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="unametxt" placeholder="pseudo" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="pwdtxt" placeholder="Mot de passe">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Mot de passe oublié ?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_log" >Connexion</button>
           
        </div>
      </form>

    </div>


  </body>
</html>

