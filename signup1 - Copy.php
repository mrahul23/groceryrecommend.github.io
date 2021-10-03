<?php
require_once('C:\xampp\htdocs\pro\blockchain.php');
session_start();
$con=mysqli_connect('localhost:3312','root','');
if($con)
{
	echo " yes..\n";
}
else
{
	echo "no..\n";
}

mysqli_select_db($con,'es');
$email=$_POST['E-mail'];
$user=$_POST['username'];
$pass=$_POST['password'];

$testCoin = new BlockChain();

echo "mining block 1...\n";
echo $testCoin->push(new Block(1, strtotime("now"), "$email"));
echo "mining block 2...\n";
$testCoin->push(new Block(2, strtotime("now"), "$user"));
echo "mining block 3...\n";
$testCoin->push(new Block(3, strtotime("now"), "$pass"));
//print_r($testCoin);
//var_dump($testCoin);
$val1=json_encode($testCoin);
file_put_contents('mf.json', $val1);

echo json_encode($testCoin, JSON_PRETTY_PRINT);
$val=json_decode($val1,true);
$l=array();
foreach ($val['chain'] as $element) {

array_push($l,$element['hash']);
    
}
print_r($l);
mysqli_select_db($con,'es');
$qy="insert into user(email,username,password) values ('$l[1]','$l[2]','$l[3]')";
	mysqli_query($con, $qy);
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
</head>
<body>
	<img src="lock.png" class="avatar">
				
	<div class="bgimg">
		<h1><?php echo "hello"; ?></h1>
		<div class="leftside">
			<h2></h2>
			<form action="login.php" method="post" >
			<p>E-mail</p>
			<input type="text" name="E-mail" placeholder="Enter E-mail">	
			<p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password"><br></br>
            <input type="submit" name="submit" value="Accept and continue">
			</form>
			
		</div>
		
	</div>
</div>
</body>
</html>
