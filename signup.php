<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>

<head>
    <title> SignUp - Techno Smarter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <img src="img/register-button-png-18457.png" alt="Techno Smarter" class="logo img-fluid">
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="row">
            <?php 
 if(isset($_POST['signup'])){
  extract($_POST);
  if(strlen($name)<3){ // Minimum 
      $error[] = 'Please enter First Name using 3 charaters atleast.';
        }
if(strlen($name)>20){  // Max 
      $error[] = 'First Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $name)){
            $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
        }        
if(strlen($email)>50){  // Max 
            $error[] = 'Email: Max length 50 Characters Not allowed';
        }
     if(strlen($mobile)>10){  // Max 
      $error[] = 'Mobile: Max length 10 No. Not allowed';
        }
if(!preg_match("/^[0-9]*$/", $mobile)){
            $error[] = 'Invalid Entry Mobile. Please Enter mobile correctly';
              }  
          if(strlen($department)>300){  // Max 
      $error[] = 'department: Max length 10 No. Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $department)){
            $error[] = 'Invalid department. Please Enter department correctly';
              }  
      if(strlen($designation)>300){  // Max 
      $error[] = 'designation: Max length 10 No. Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $designation)){
            $error[] = 'Invalid designation. Please Enter designation correctly';
              }  
   if($passwordConfirm ==''){
            $error[] = 'Please confirm the password.';
        }
        if($password != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
        
         if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
     
     include('config.php');

	 $sql1 = "select * from users where (email='".$email."' or mobile='".$mobile."')";
//     echo $sql1;exit();
	 $res = mysqli_query($con,$sql1);
	 
           if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

       if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
        if($mobile==$row['mobile'])
     {
           $error[] ='Mobile No alredy Exists.';
          } 
      }
     
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
    $password =$password;
           $result = mysqli_query($con,"INSERT into users values('','$name','$mobile','$department','$email','$designation','$date','$password')");

           if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>

            <div class="col-sm-4">

                <?php 
  if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
            </div>
            <div class="col-sm-4">
                <?php if(isset($done)) 
      { ?>
                <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
                <?php } else { ?>
                <div class="signup_form">
                    <form action="" method="POST">
                        <div class="form-group">

                            <label class="label_txt">Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?php if(isset($error)){ echo $_POST['name'];}?>" required="">
                        </div>

                        <div class="form-group">
                            <label class="label_txt">Email </label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="label_txt">Mobile No. </label>
                            <input type="number" class="form-control" name="mobile" value="<?php if(isset($error)){ echo $_POST['mob'];}?>" required="">
                        </div>
                        <div>
                            <label for="cars">Choose a department:</label>
                            <select id="department" name="department">
                                <option value="IT Analyst">IT Analyst</option>
                                <option value="IT Coordinator">IT Coordinator</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Computer Systems Manager">Computer Systems Manager</option>
                            </select>
                        </div>
                        <div>
                            <label for="cars">Choose a designation:</label>
                            <select id="designation" name="designation">
                                <option value="Trainee Engineer">Trainee Engineer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="System Analyst">System Analyst</option>
                                <option value="Programmer Analyst">Programmer Analyst</option>
                            </select>
                        </div>
                        <div class="form-group">
<!--                            <label class="label_txt">Password </label>-->
                            <input type="hidden" name="password" class="form-control" required="" value="12345">
                        </div>
                        <div class="form-group">
<!--                            <label class="label_txt">Confirm Password </label>-->
                            <input type="hidden" name="passwordConfirm" class="form-control" required="" value="12345">
                        </div>
                        <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
                        <p>Login Admin <a href="login.php">Log in</a> </p>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4">
            </div>

        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
