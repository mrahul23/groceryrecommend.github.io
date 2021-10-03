
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
</head>
<body>
	
				
	<div class="bgimg">
		<h1>Easy Shopping</h1>
		<div class="leftside">
		<h2>Create a new account</h2>
		
			
		</div>
		
	</div>
</div>
</body>
</html>

<?php
require_once('C:\xampp\htdocs\pro\blockchain.php');
session_start();
$con=mysqli_connect('localhost:3306','root','');
if($con)
{
	echo "<h1>You are done with blockchin</h1>\n";
}
else
{
	//echo "no..\n";
}



mysqli_select_db($con,'es');
$email=$_POST['E-mail'];
$user=$_POST['username'];
$pass=$_POST['password'];
//echo "<h1>$email</h1>\n";
$testCoin = new BlockChain();

//echo "mining block 1...\n";
 $testCoin->push(new Block(1, strtotime("now"), "$email"));
//echo "mining block 2...\n";
$testCoin->push(new Block(2, strtotime("now"), "$user"));
//echo "mining block 3...\n";
$testCoin->push(new Block(3, strtotime("now"), "$pass"));
//print_r($testCoin);
//var_dump($testCoin);
$val1=json_encode($testCoin);
file_put_contents('mf.json', $val1);
echo "<h1>$val1</h1>\n";
 //json_encode($testCoin, JSON_PRETTY_PRINT);
$val=json_decode($val1,true);
$l=array();
$l1=array();
foreach ($val['chain'] as $element) {

array_push($l,$element['hash']);
array_push($l1,$element['data']);
    
}
//print_r($l);
$a=md5($l1[2]);
$b=md5($l1[3]);
mysqli_select_db($con,'es');
$qy="insert into hackchain (username,password) values ('$l1[1]','$l1[2]','$l1[3]')";
	mysqli_query($con, $qy);
$qy="insert into user1(username,password) values ('$a','$b')";
	mysqli_query($con, $qy);
$qy="insert into user(email,username,password) values ('$l[1]','$l[2]','$l[3]')";
	mysqli_query($con, $qy);
	

?>
