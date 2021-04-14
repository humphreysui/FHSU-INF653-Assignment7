<?php 
  session_start();

  require('../model/database.php');
  require('../model/vehicle_db.php');
  require('../model/make_db.php');
  require('../model/type_db.php');
  require('../model/class_db.php');
  require('../model/admin_db.php');

  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT); 
  $model = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING);
  $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
  
  $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
  if(!$makeID){
    $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
  }
  $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
  if(!$typeID){
    $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
  }
  $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
  if(!$classID){
    $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
  }
  
  /*vehicleID parameters*/
  $vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);
  if(!$vehicleID){
    $vehicleID = filter_input(INPUT_GET, 'vehicleID', FILTER_VALIDATE_INT);
  }
  /*makeName parameters*/
  $makeName = filter_input(INPUT_GET, 'makeName', FILTER_SANITIZE_STRING);
  /*typeName parameters*/
  $typeName = filter_input(INPUT_GET, 'typeName', FILTER_SANITIZE_STRING);
  /*className parameters*/
  $className = filter_input(INPUT_GET, 'className', FILTER_SANITIZE_STRING);

  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
  if($username){
    $_SESSION['username'] = $username;
  }
  
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
      $action = 'list_vehicles';
    }
  }

  if ($action == "list_vehicles"){
    $makes = MakeDB::get_makes();
    $types = TypeDB::get_types();
    $classes = ClassDB::get_classes();
    $vehicles = VehicleDB::get_vehicles_filtered($makeID, $typeID, $classID, $sort);
    include('./view/vehicle_list.php');

  }else if($action == "delete_vehicle"||$action == 'show_vehicle_form' || $action == "add_vehicle"){
    include('controllers/vehicle_controller.php'); 
  }else if($action == "show_make_form" || $action == "add_make" || $action == "delete_make"){
    include('controllers/make_controller.php');
  }else if($action == "show_type_form" || $action == "add_type" || $action == "delete_type"){
    include('controllers/type_controller.php');
  }else if($action == "show_class_form" || $action == "add_class" || $action == "delete_class"){
    include('controllers/class_controller.php');
  }else if($action == "login" || $action == "show_login" || $action == "register" || $action == "show_register" || $action == "logout"){
    include('controllers/admin_controller.php');
  }else{
    $makes = MakeDB::get_makes();
    $types = TypeDB::get_types();
    $classes = ClassDB::get_classes();
    $vehicles = VehicleDB::get_vehicles();
    include('./view/vehicle_list.php');
  }
