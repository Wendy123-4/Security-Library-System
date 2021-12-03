<?php
require('dbconn.php');

$bookid=$_GET['id1'];
if(isset($_GET['Email'])){
      $email = $_GET['Email'];
 }else{
      $email = "Name not set in GET Method";
 }

$dues=$_GET['id3'];

$sql="select Role from lms.user where Email='$email'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$role=$row['Role'];




$sql1="update lms.record set Date_of_Return=curdate(),Dues='$dues' where BookId='$bookid' and Email='$email'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update lms.book set Availability=Availability+1 where BookId='$bookid'";
 $result=$conn->query($sql3);
 $sql4="delete from lms.return where BookId='$bookid' and Email='$email'";
 $result=$conn->query($sql4);


echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=return_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=return_requests.php", true, 303);

}





?>