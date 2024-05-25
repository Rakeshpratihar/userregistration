<?php 
session_start();
?>
<html>
<head>
    <title>DISPLAY</title>
    <style>
        body{
            background:#D071f9;
        }
        table{
            background-color:white;
        }
        .update{
            background-color:green;
            color:white;
            cursor:pointer;
        }
        .delete{
            background-color:red;
            color:white;
            cursor:pointer;
        }
   </style>
</head>
</html>
<?php
include("connection.php");
//error_reporting(0);
$userdata=$_SESSION['user_name'];
if($userdata==true){

}
else{
    header('location:login.php');
}
$query="select * from form";
$data=mysqli_query($a,$query);
$total=mysqli_num_rows($data);
//echo $total;  //op=no of rows
if($total!=0){
     //echo "table has record"; 
    ?>
      <h1 align="center">Display All Record</h1>
    <table border="3" width="90%" align="center">
        <tr>
        <th width="5%">Id</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="10%">Gender</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="15%">Address</th>
        <th width="10%">Operatons</th>
        </tr>
   
    <?php
    while($result=mysqli_fetch_assoc($data)){
       echo  "<tr>
                 <td>".$result['ID']."</td>
                 <td>".$result['FNAME']."</td>
                 <td>".$result['LNAME']."</td>
                 <td>".$result['GENDER']."</td>
                 <td>".$result['EMAIL']."</td>
                 <td>".$result['PHONE']."</td>
                 <td>".$result['ADDRESS']."</td>
                 <td><a href='update_design.php?id=$result[ID]'><input type='submit' value='Update' class='update'></a>
                 <a href='delete.php?id=$result[ID]'><input type='submit' value='Delete' class='delete'
                  onclick='return chekdelete()'></a></td>
                 </tr>
            ";
    }
}
else{
    echo "no record found";
}
?>
</table>
<a href="logout.php"><input type='submit' value='logout' style="color:blue; margin:20% 50%;font-size:20px;"></a>
<script>
    function chekdelete(){
        return confirm('are you sure you want to delete this record?');
    }
</script>