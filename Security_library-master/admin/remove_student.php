<?php
ob_start();
require('dbconn.php');
?>

<?php
if ($_SESSION['Email']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wendy & David Library</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
 <?php
if(isset($_GET['Email']))
{
    $email = $_GET['Email'];

$sql1="DELETE FROM lms.user WHERE Email='$email'";



if($conn->query($sql1) === TRUE){
 echo "<script type='text/javascript'>alert('User Successfully Deleted')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{
echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>

    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>