<?php 
  
  switch ($action){

    case "delete_vehicle":
      // #TODO: try-catch error 
      if($vehicleID){
        VehicleDB::delete_vehicle($vehicleID);
        header('location:.');
      }else{
        $errorMessage='incorrect vehicleID';
        include('../view/error.php');
        exit();
      } 
      break;
    
    case "add_vehicle":
    
      if($year && $model && $price && $typeID && $makeID && $classID){
        VehicleDB::add_vehicle($makeID, $typeID, $classID, $year, $model, $price);
        header('location:.');
      }else{
        $errorMessage='incorrect vehicle data';
        include('../view/error.php');
        exit();
      } 
      break;
    
    case 'show_vehicle_form':
      $makes = MakeDB::get_makes();
      $types = TypeDB::get_types();
      $classes = ClassDB::get_classes();
      include('./view/add_vehicle.php');  
      break;
    
  }