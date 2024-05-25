<?php include("connection.php"); ?>
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
      <div class="title"> REGISTRATION FORM</div>

     <div class="form">
        <div class="input_field">
          <label>First Name</label>
        <input type="text" class="input" name="fname" >  <!--required can be use for not keep the field empty-->
       </div>
        <div class="input_field">
          <label>Last Name</label>
          <input type="text" class="input" name="lname" >
        </div>
         <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="password">
          </div>
         <div class="input_field">
              <label>Confirm Password</label>
              <input type="password" class="input" name="conpassword">
         </div>
         <div class="input_field">
              <label>Gender</label>
               <select class="selectbox" name="gender">
                <option value="not selected">select</option>
                 <option value="male">male</option>
                 <option value="female">female</option>
               </select>
          </div>
         <div class="input_field">
           <label>Email</label>
           <input type="text" class="input" name="email">
         </div>
         <div class="input_field">
            <label>Phone</label>
            <input type="text" class="input" name="phone">
          </div>
           <div class="input_field">
                 <label>Address</label>
                 <textarea class="textarea" name="address"></textarea>
            </div>
           <div class="input_field terms">
               <label class="check">
                  <input type="checkbox" required>
                </label>
               <p>agree to term and condition</p>
            </div>
          <div class="input_field">
             <input type="submit" value="register" class="btn" name="register">
           </div>
</div>
</form>
</div>
</body>
</html>
<?php
  if($_POST["register"]){
       $firstname=$_POST['fname'];
       $lastname=$_POST['lname'];
       $pass=$_POST['password'];
       $conpass=$_POST['conpassword'];
       $gender=$_POST['gender'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $add=$_POST['address']; 

       if($firstname!="" && $lastname!="" && $pass!="" && $conpass!="" && $gender!="" &&
        $email!="" && $phone!="" && $add!="")
 {
       $s="insert into form(FNAME,LNAME,PASSWORD,CONPASSWORD,GENDER,EMAIL,PHONE,ADDRESS)
        values('$firstname','$lastname','$pass','$conpass','$gender','$email','$phone','$add')";
       $data=mysqli_query($a,$s);
       if($data){
        echo "data inserted";
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