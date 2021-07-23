<?php
    require_once "config.php";

   
$json = array();
    $username = isset($_POST['login_var']) ? $_POST['login_var'] : "";

    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    $sqlQuery = "SELECT * FROM `admin_user` where `name`= '". $username. "' and  `pass`='". $password. "'";
    $result = mysqli_query($con, $sqlQuery);

   
   $rows= array();
    while($res = mysqli_fetch_assoc($result)){
        $rows[] = $res;
    }
    
    print_r($_SESSION);
    if(!empty($rows)){
        session_start();
        $_SESSION["user_data"] = $username;
        $_SESSION["id"] = $rows[0]['id'];
        $_SESSION["login_status"] = '1';
        $json['status'] = 1;
         header("location: index1.php");
    }else{
        $json['status'] = 0;
        header("location: login.php");
    }

    echo json_encode($json);
   
?>