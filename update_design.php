<?php 
session_start();
$userd=$_SESSION['user_name'];
if($userd==true){

}
else{
    header('location:login.php');
} 
include("connection.php");
$q= $_GET['id'];
$s="select * from form where ID='$q'";
$da=mysqli_query($a,$s);
$ar=mysqli_fetch_assoc($da);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>php curd operation</title>
</head>
<body>
    <div class="container">
      <form action="" method="POST">
      <div class="title"> Update Student Details</div>

     <div class="form">
        <div class="input_field">
          <label>First Name</label>
        <input type="text" class="input" name="fname" value="<?php echo $ar['FNAME'];?>" >
       </div>
        <div class="input_field">
          <label>Last Name</label>
          <input type="text" class="input" name="lname" value="<?php echo $ar['LNAME'] ?>">
        </div>
         <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="password" value="<?php echo $ar['PASSWORD'] ?>">
          </div>
         <div class="input_field">
              <label>Confirm Password</label>
              <input type="password" class="input" name="conpassword" value="<?php echo $ar['CONPASSWORD'] ?>">
         </div>
         <div class="input_field">
              <label>Gender</label>
               <select class="selectbox" name="gender">
                 <option value="not selected">select</option>
                 <option value="male"
                 <?php 
                 if($ar['GENDER']=='male')
                 {
                  echo "selected";    //you must write selected
                 }
                 ?>
                 >male</option>
                 <option value="female"
                 <?php 
                 if($ar['GENDER']=='female')
                 {
                  echo "selected";    //you must write selected
                 }
                 ?>>female</option>
               </select>
          </div>
         <div class="input_field">
           <label>Email</label>
           <input type="text" class="input" name="email" value="<?php echo $ar['EMAIL'] ?>">
         </div>
         <div class="input_field">
            <label>Phone</label>
            <input type="text" class="input" name="phone" value="<?php echo $ar['PHONE'] ?>">
          </div>
           <div class="input_field">
                 <label>Address</label>
                 <textarea class="textarea" name="address" ><?php echo $ar['ADDRESS'] ?></textarea>
            </div>
           <div class="input_field terms">
               <label class="check">
                  <input type="checkbox" required>
                </label>
               <p>agree to term and condition</p>
            </div>
          <div class="input_field">
             <input type="submit" value="update details" class="btn" name="update">
           </div>
     </div>
</form>
</div>
</body>
</html>
<?php
  if($_POST["update"]){
       $firstname=$_POST['fname'];
       $lastname=$_POST['lname'];
       $pass=$_POST['password'];
       $conpass=$_POST['conpassword'];
       $gender=$_POST['gender'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $add=$_POST['address']; 

       if($firstname!="" && $lastname!="" && $pass!="" && $conpass!="" && $gender!="" && $email!="" && $phone!="" && $add!="")
 {
       
       $s="update form set FNAME='$firstname',LNAME='$lastname',PASSWORD='$pass',
       CONPASSWORD='$conpass',GENDER='$gender',EMAIL='$email',PHONE='$phone',ADDRESS='$add' where ID='$q'" ;
       $data=mysqli_query($a,$s);
       if($data){
        echo "<script>alert('record updated')</script>";
        ?>
        <meta http-equiv="refresh" 
        content="0; url = http://localhost/curd/display.php" />
        <?php
       }
       else{
        echo "failed";
       }
  }
  else{
    echo "please give all data";
    //echo "<script>alert('fill the form')</script>";
  }
}
?>