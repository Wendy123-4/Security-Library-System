<?php
require('dbconn.php');

$id=$_GET['id'];

$email=$_SESSION['Email'];

$sql="insert into lms.record (Email,BookId,Time) values ('$email','$id', curtime())";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);

}

?>