<?php
session_start();
$con=mysqli_connect('localhost:3306','root');
if($con)
{
	echo " yes";
}
else
{
	echo "no";
}
$str = file_get_contents('C:\xampp\htdocs\pro\mf.json');
$json = json_decode($str, true);

$l=array();
foreach ($json['chain'] as $element) {

array_push($l,$element['hash']);
    
}
echo $l[2];
echo $l[3];
mysqli_select_db($con,'es');
$user=$_POST['username'];
$pass=$_POST['password'];
$a=md5($user);
$b=md5($pass);
echo $a;
echo $b;
$qy="insert into user(email,username,password) values ('$l[1]','$l[2]','$l[3]')";
	mysqli_query($con, $qy);
$q="select * from user where username='$a' && password='$b'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num ==1)
{
	echo "Hello Ranger";
	header("Location:http://localhost:8081/pro/papers.html"); 
  
exit; 
}else
{
	echo "invalid user ";
}
?>