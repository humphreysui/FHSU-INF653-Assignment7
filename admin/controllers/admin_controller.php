<?php 
  switch($action){

  case "logout":
    $_SESSION = array(); 
    session_destroy(); 
    $login_message = 'You have been logged out.'; 
    include('view/login.php'); 
    break;
    
  case "show_register":
    include('view/register.php');
    break;

  case "show_login":
		include ('view/login.php');
    break;

  case "login":
    if (AdminDB::is_valid_admin_login($username, $password)){
      $_SESSION['is_valid_admin'] = true; 
      header('location: .?action=list_vehicles');
    } else {
      $login_message = 'Incorrect Login / Login Required.'; 
      include('view/login.php');
    } 
    break; 
 
  case "register":
    include('util/valid_register.php');
    $errors = ValidRegister::valid_registration($username, $password, $confirm_password);
    if (AdminDB::username_exists($username)) {
      array_push($errors, "The username you entered is already taken.");
    }
    if($errors){
      include('view/register.php');
    }else{
      AdminDB::add_admin($username, $password);
      $_SESSION['is_valid_admin'] = true;
      header('location: .?action=list_vehicles');
    }
    break;
   
}