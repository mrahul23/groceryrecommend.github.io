<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
      table {
        border-collapse: collapse;
        width: 100%;
        color:#d96459;
        text-align: center;
        font-size: 20px;
        font-family: 'Flamenco', cursive;

      }
      th {
        height:50px;
        background-color:#d96459;
        color:white;
      }
      td {
        height: 50px;
      }
      tr:nth-child(even) {background-color: #f2f2f2;

      }
  </style>  
</head>
<body>
<table>
    <tr>
        <th>Website</th>
        <th>Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>Link</th>
    </tr>
<?php
session_start();
$con=mysqli_connect('localhost:3306','root','');
if($con)
{       $search_value=$_POST["search"];
        echo " yes..\n";
        $search_value1=$search_value;
        #var_dump($search_value);
        mysqli_select_db($con,'es');
        $sql="SELECT * FROM `am` WHERE prod LIKE '%{$search_value1}%'";
        $res=$con->query($sql);
        #var_dump($res);

        while($row=$res->fetch_assoc()){
            echo "<tr><td>Amazon"."</td><td><img src=".$row['img'].">"."</td><td>".$row['prod']."</td><td>".$row['price']."</td><td>"."<a href=".$row['link'].">Buy Now</a>"."</td></tr>";
    
            }     
             $sql1="SELECT * FROM `bb` WHERE prod LIKE '%{$search_value1}%'";
        $res1=$con->query($sql1);
        #var_dump($res);

        while($row=$res1->fetch_assoc()){
            echo "<tr><td>Big Basket"."</td><td><img src=".$row['img'].">"."</td><td>".$row['prod']."</td><td>".$row['price']."</td><td>"."<a href=".$row['link'].">Buy Now</a>"."</td></tr>";
        }
        $sql2="SELECT * FROM `11` WHERE prod LIKE '%{$search_value1}%'";
        $res2=$con->query($sql2);
       
      
}
else
{
        echo " No..\n";

        
}    
?>
</table>
</body>
</html>
