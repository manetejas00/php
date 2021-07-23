<?php  
/** 
 * Created by PhpStorm. 
 * User: Ehtesham Mehmood 
 * Date: 11/21/2014 
 * Time: 2:46 AM 
 */  
  
session_start();
session_destroy();

header("Location: login.php");//use for the redirection to some page  
?> 
