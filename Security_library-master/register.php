<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management System </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>Wendy & David Library</h1>

	<div class="">



		<div class="register">
			<h2>Register</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Username" placeholder="Username" required>
				<input type="email" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
				 required>




				<select name="Role" id="Role">
					<option value="Student">Student</option>
					<option value="Staff and Faculty">Staff and Faculty</option>
					<option value="Librarian">Librarian</option>

				</select>
				<br>


			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up">
			    </form>
			</div>
			<p>Already have an account?  <a class="underline" href="index.php">Log in</a></p>

			<div class="clear"></div>
		</div>


		<div class="clear"></div>

	</div>



<?php
if(isset($_POST['signin']))
{$u=$_POST['Email'];
 $p=$_POST['Password'];
 $c=$_POST['Role'];
 $p=md5($p);

 $sql="select * from lms.user where Email='$u' AND Password='$p'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Role'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['Email']=$u;


  if($y=='Admin')
   header('location:admin/index.php');
  elseif($y=='Librarian')
  	header('location:librarian/index.php');
  elseif($y=='Staff and Faculty')
  	header('location:faculty/index.php');
  	else
  	header('location:student/index.php');

  }
else
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Email or Password')</script>";
}


}

if(isset($_POST['signup']))
{
	$username=$_POST['Username'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$password=md5($password);

	$role=$_POST['Role'];


	$sql="insert into lms.user (Username,Role,Email,Password) values ('$username','$role','$email','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->

</html>
