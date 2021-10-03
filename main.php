<?php
//Licence-This Code only for Learning Purposs. Do not use this code in Real Applications, I am Not responsible for anything.
?>
<!DOCTYPE html>
<html>
<title>Easy shopping</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
<body>


<div class="bgimg">
    <h1 style="   font-family: 'Flamenco', cursive;
    font-size: 42px;
    color: orange;
    padding: 4px;
    background: black;
    border-bottom: 2px solid #ccc;
    text-align: center;">Easy Shopping</h1>
    <div class="leftside">
      <h2 style="  font-family: 'Flamenco', cursive;
    font-size: 24px;
    color: orange;
    padding: 4px;
    border-bottom: 2px solid #ccc;
    text-align: center;
    ">Search with Best !!!</h2>
      <form action="main.php" method="post" style="width: 60%;
  height:180px;
  float: right;">
      <input type="text" name="search"  placeholder="Enter Product" style="width: 30%;
  height:40px; font-family: 'Flamenco', cursive; 

    border: none;
    border-bottom: 3px solid orange;
    background: transparent;
    outline: none;
    
    color: black;
    font-size: 20px;">
      <input type="submit" name="submit"  value="Search">
      </form>
      
    </div>
    
  </div>
</div>
<div class="w3-row-padding w3-margin-top">

<?php
//Get web page data by using URL ie web page link
session_start();
$con=mysqli_connect('localhost:3312','root','');
if($con)
{   $search_value=$_POST["search"];
    #echo " yes..\n";
    $search_value1=$search_value;
    #var_dump($search_value);
    mysqli_select_db($con,'es');
        $sql="SELECT * FROM `tab` WHERE prod LIKE '%{$search_value1}%'";
        $res=$con->query($sql);
        #var_dump($res);

        while($row=$res->fetch_assoc()){
            echo 'Product:  <br>'.$row['prod'];
            echo "<br>
             ".$row['price'];

            }       
      
}
else
{
    echo " No..\n";

    
}
?>

</body>
</html>
